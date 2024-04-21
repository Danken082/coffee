<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistoryModel;

class VisualizationController extends BaseController
{

    private $vis;
    public function __construct()
    {
        $this->vis = new HistoryModel();
    }
    
    public function initDayChart() {
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_orders');
        $query = $builder->select("SUM(total_amount) as count, SUM(total_amount) as s, DAYNAME(order_date) as day")
                        ->groupBy('DAYNAME(order_date)')
                        ->get();
        $record = $query->getResult();
        $products = [];
        foreach($record as $row) {
            $products[] = array(
                'day'   => $row->day,
                'sell' => floatval($row->s)
            );
        }
    
        $builder = $db->table('tbl_orders');
        $query = $builder->select("SUM(total_amount) as total_sales, MONTH(order_date) as month")
                        ->groupBy('MONTH(order_date)')
                        ->get();
        $salesByMonth = $query->getResult();
    
        $data['salesByMonth'] = $salesByMonth;
       
        $data['products'] = $products;
        
        return view('admin/dashboard', $data);
    }
    
    
    
    
    public function initChart(){
        $sales = $this->vis->findAll();

        $totalsales = array_sum(array_column($sales, 'total_amount'));  

        echo 'Total Sales', $totalsales;
    }

    public function initYearChart(){
        $salesByYear = $this->vis
        ->select('YEAR(order_date) as year, SUM(total_amount) as total_amount')
        ->groupBy('YEAR(order_date)')
        ->findAll();

    // Output sales by year
    foreach ($salesByYear as $sale) {
        echo $sale['year'] . ': ' . $sale['total_amount'] . '<br>';
    }
    }
    public function xample(){
        
    }

    public function dailySales(){
        $sales = $this->vis->findAll();
    
        // Initialize an array to store daily sales
        $dailySales = [];
    
        foreach ($sales as $sale) {
            $date = date('Y-m-d', strtotime($sale['order_date'])); // Get the date from the sale_date
            $dailySales[$date] = isset($dailySales[$date]) ? $dailySales[$date] + $sale['total_amount'] : $sale['total_amount'];
        }
    
        // Output daily sales
        foreach ($dailySales as $date => $totalSales) {
            echo $date . ': ' . $totalSales . '<br>';
        }
    }

    public function monthlySales(){
        $salesByMonth = $this->vis
            ->select('YEAR(order_date) as year, MONTH(order_date) as month, SUM(total_amount) as total_sales')
            ->groupBy('YEAR(order_date), MONTH(order_date)')
            ->findAll();
    
        // Output sales by month
        foreach ($salesByMonth as $sale) {
            echo $sale['year'] . '-' . str_pad($sale['month'], 2, '0', STR_PAD_LEFT) . ': ' . $sale['total_sales'] . '<br>';
        }
    }
    
    // public function monthlySales(){
    //     $monthlySales = $this->vis
    //         ->select('DAYNAME(order_date) as month, SUM(total_amount) as total_sales')
    //         ->groupBy('DAYNAME(order_date)')
    //         ->findAll();
    
    //     // Output monthly sales
    //     foreach ($monthlySales as $sale) {
    //         echo $sale['month'] . ': ' . $sale['total_sales'] . '<br>';
    //     }
    // }
    
    
}
