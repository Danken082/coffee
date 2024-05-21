<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistoryModel;
use Mpdf\Mpdf;
use App\Models\ItemsModel;

use CodeIgniter\API\ResponseTrait;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class VisualizationController extends BaseController
{

    private $vis;
    private $mpdf;
    private $raw;
    use ResponseTrait;

    public function __construct()
    {
        $this->vis = new HistoryModel();
        $this->mpdf = new Mpdf();
        $this->raw = new ItemsModel();

    }
    
    public function thisAllChart() {
  
     $db = \Config\Database::connect();
          $requestData = $this->request->getJSON();
 
     $month = $this->request->getVar('month');
     $year = $this->request->getVar('year');
   
     $builder = $db->table('tbl_orders');

     if($month == null || $year == null )
     {
         $month = date('n');
         $year = date('Y');
     }
     $data = [
        'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
        'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(),
        'month' => $month,
        'year' => $year
        ];
 
     $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year); // Get the total number of days in the month

     $query = $builder->select("SUM(total_amount) as count, SUM(total_amount) as s, DAY(order_date) as day")
     ->where('MONTH(order_date)', $month)
     ->where( 'YEAR(order_date)', $year)                
                     ->groupBy('DAY(order_date)')
                     ->orderBy('day', 'ASC')
                     ->get();
     $record = $query->getResult();
     $products = [];
     if (empty($record)) {
         for ($day = 1; $day <= $daysInMonth; $day++) {
             $products[] = array(
                 'day'   => $day,
                 'sell' => 0.0 // You can set any default value here
             );
         }
     } else {
         // If records are returned, populate $products array from the result
         foreach ($record as $row) {
             $products[] = array(
                 'day'   => $row->day,
                 'sell' => floatval($row->s)
             );
             
         }
         
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
 
     return view('admin/visualization', $data);

 }
    
    public function allChart() {
           $data = [
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(),
       
            ];
     
        $db = \Config\Database::connect();
             $requestData = $this->request->getJSON();
    
        $month = $this->request->getVar('month');
        $year = $this->request->getVar('year');
        //MonthlyReports
        $monthlySalesReports = $this->request->getVar('monthlySalesReports');
      
        $builder = $db->table('tbl_orders');

        if($month == null || $year == null )
        {
            $month = date('n');
            $year = date('Y');
        }
     
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year); // Get the total number of days in the month

        $query = $builder->select("SUM(total_amount) as count, SUM(total_amount) as s, DAY(order_date) as day")
        ->where('MONTH(order_date)', $month)
        ->where( 'YEAR(order_date)', $year)                
                        ->groupBy('DAY(order_date)')
                        ->orderBy('day', 'ASC')
                        ->get();
        $record = $query->getResult();
        $products = [];
        if (empty($record)) {
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $products[] = array(
                    'day'   => $day,
                    'sell' => 0.0, // You can set any default value here
                    'count' => 0.0
                );
            }
        } else {
            // If records are returned, populate $products array from the result
            foreach ($record as $row) {
                $products[] = array(
                    'day'   => $row->day,
                    'sell' => floatval($row->s),

                );
                
            }
        }


        if($monthlySalesReports == null )
        {
            $monthlySalesReports = date('Y');
        }
     
            $query = $builder->select("SUM(total_amount) as total_sales, MONTH(order_date) as month")
                                ->where('YEAR(order_date)', $monthlySalesReports)
                                ->groupBy('MONTH(order_date)')
                                ->orderBy('month','ASC')
                                ->get();
        $salesByMonth = $query->getResult();

        usort($salesByMonth, function($a, $b) {
            return $a->month - $b->month;
        });
    
        $salesByYear = $this->vis
            ->select('YEAR(order_date) as year, SUM(total_amount) as total_amount')
            ->groupBy('YEAR(order_date)')
            ->findAll();


        $data = [
            'notif' => $this->raw->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->findAll(),
            'count' => $this->raw->select('Count(*) as notif')->where('stocks <=', '2')->where('stocks >=', '0')->where('item_categ', 'Raw Materials')->first(),
            'salesByMonth' => $salesByMonth,
            'salesByYear' => $salesByYear,
            'products'  => $products,
            'month' => $month,
            'year' => $year,
            'monthlySalesReports' => $monthlySalesReports
            ];
     
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

    public function salesReportPerDay($month, $year)
    {
       
        $data = [];

        $months=  date('F', mktime(0, 0, 0, $month, 1));
        $filename = 'Daily Reports In Month Of '. $months .'.xlsx';

        $spreadsheet = new Spreadsheet();

        $query = $this->vis->select("SUM(total_amount) as count, SUM(total_amount) as s, DAY(order_date) as day")
        ->where('MONTH(order_date)', $month)
        ->where('YEAR(order_date)', $year)
        ->groupBy('DAY(order_date)')
        ->orderBy('day', 'ASC')
        ->get();
        $record = $query->getResult();
        $products = [];
        foreach ($record as $row) {
            $products[] = array(
                'day'   => $row->day,
                'sell' => floatval($row->s),
                'count' => floatval($row->count)
            );
        }

        $month=  date('F', mktime(0, 0, 0, $month, 1));

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', $month);
        $sheet->setCellValue('B1', 'Sales');


        $rows = 2;

       

        foreach($products as $val)
        {
           
            $sheet->setCellValue('A'. $rows, $val['day']);
            $sheet->setCellValue('B'. $rows, $val['sell']);
            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
    
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="'. basename($filename).'"');
        header('Expires: 0');
    
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length' . filesize($filename));
    
        flush();
    
        readfile($filename);
    
        exit;
   }      
}