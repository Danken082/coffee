<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistoryModel;
use Mpdf\Mpdf;
use App\Models\ItemsModel;

class VisualizationController extends BaseController
{

    private $vis;
    private $mpdf;
    private $raw;

    public function __construct()
    {
        $this->vis = new HistoryModel();
        $this->mpdf = new Mpdf();
        $this->raw = new ItemsModel();

    }

    public function allChart() {
           $data = [
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(),
            'coffee' => $this->raw->where('rawID', '9')->first(),
            'milk' => $this->raw->where('rawID', '10')->first(),
            'smilk' => $this->raw->where('rawID', '11')->first(),
            'hcream' => $this->raw->where('rawID', '12')->first(),
            'wcream' => $this->raw->where('rawID', '13')->first(),
            'syrup' => $this->raw->where('rawID', '14')->first(),
            'sauce' => $this->raw->where('rawID', '15')->first(),
            'frPowder' => $this->raw->where('rawID', '16')->first(),
            'wsugar' => $this->raw->where('rawID', '17')->first(),
            'bsugar' => $this->raw->where('rawID', '18')->first(),
            'chicken' => $this->raw->where('rawID', '19')->first(),
            'pork' => $this->raw->where('rawID', '20')->first(),
            'beef' => $this->raw->where('rawID', '21')->first(),
            'tortillas' => $this->raw->where('rawID', '22')->first(),
            'echeese' => $this->raw->where('rawID', '23')->first(),
            'shrimp' => $this->raw->where('rawID', '24')->first(),
            'cfudge' => $this->raw->where('rawID', '43')->first(),
            'scheese' => $this->raw->where('rawID', '44')->first(),
            'qmelt' => $this->raw->where('rawID', '45')->first(),
            'egg' => $this->raw->where('rawID', '46')->first(),
            'lettuce' => $this->raw->where('rawID', '47')->first(),
            'tuna' => $this->raw->where('rawID', '48')->first(),
            'bacon' => $this->raw->where('rawID', '49')->first(),
            'ppork' => $this->raw->where('rawID', '50')->first(),
            'bratwurst' => $this->raw->where('rawID', '51')->first(),
            'smokedham' => $this->raw->where('rawID', '52')->first(),
            'porkRibs' => $this->raw->where('rawID', '53')->first(),
            'gbeef' => $this->raw->where('rawID', '54')->first(),
            'liempo' => $this->raw->where('rawID', '55')->first(),
            'tbeef' => $this->raw->where('rawID', '56')->first(),
            'tIslands' => $this->raw->where('rawID', '57')->first(),
            'cIslands' => $this->raw->where('rawID', '58')->first(),
            'mustart' => $this->raw->where('rawID', '59')->first(),
            'mupledsyrup' => $this->raw->where('rawID', '60')->first(),
            'mushroom' => $this->raw->where('rawID', '61')->first(),
            'onion' => $this->raw->where('rawID', '62')->first(),
            'garlic' => $this->raw->where('rawID', '63')->first(),
            'parsley' => $this->raw->where('rawID', '64')->first(),
            'spiringonion' => $this->raw->where('rawID', '65')->first(),
            'bellpepper' => $this->raw->where('rawID', '66')->first(),
            'oil' => $this->raw->where('rawID', '67')->first(),
            'soysouce' => $this->raw->where('rawID', '68')->first(),
            'vinigar' => $this->raw->where('rawID', '69')->first(),
            'knorseasoning' => $this->raw->where('rawID', '70')->first(),
            'KnorCube' => $this->raw->where('rawID', '71')->first(),
            'ketchup' => $this->raw->where('rawID', '72')->first(),
            'salt' => $this->raw->where('rawID', '73')->first(),
            'pepper' => $this->raw->where('rawID', '74')->first(),
            'butter' => $this->raw->where('rawID', '75')->first(),
            'mayonaise' => $this->raw->where('rawID', '76')->first(),
            'starmargarine' => $this->raw->where('rawID', '77')->first(),
            'icecream' => $this->raw->where('rawID', '78')->first(),
            'tomatosouce' => $this->raw->where('rawID', '79')->first(),
            'potato'    => $this->raw->where('rawID', '80')->first(),
            'pasta' => $this->raw->where('rawID', '81')->first(),
            'bfssandwich' => $this->raw->where('rawID', '82')->first(),
            'bfsoup' => $this->raw->where('rawID', '83')->first(),
            'coke1' => $this->raw->where('rawID', '84')->first(),
            ];
     
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

        usort($salesByMonth, function($a, $b) {
            return $a->month - $b->month;
        });
    
        $salesByYear = $this->vis
            ->select('YEAR(order_date) as year, SUM(total_amount) as total_amount')
            ->groupBy('YEAR(order_date)')
            ->findAll();

        $data['salesByMonth'] = $salesByMonth;
        $data['salesByYear'] = $salesByYear;
        $data['products'] = $products;

        //notif
        
    
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
    
    public function pdfReport()
    {
        $this->mpdf->WriteHTML('Hello World');
        
        return redirect()->to($this->mpdf->Output('filename.pdf', 'I'));

    }
    
}
