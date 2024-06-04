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
            $query = $builder->select("SUM(total_amount) as total_sales, MONTH(order_date) as month")
                                ->where('MONTH(order_date)', $month)
                                ->where('YEAR(order_date)', $year)
                                ->groupBy('MONTH(order_date)')
                                ->orderBy('month','ASC')
                                ->get();
        $ByMonth = $query->getResult();

        usort($ByMonth, function($a, $b) {
            return $a->month - $b->month;
        });
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
            'byMonth'   => $ByMonth,
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

//     public function salesReportPerDay($month, $year)
//     {
       
//         $data = [];

//         $months=  date('F', mktime(0, 0, 0, $month, 1));
//         $filename = 'Daily Reports In Month Of '. $months .'.xlsx';

//         $spreadsheet = new Spreadsheet();

//         $query = $this->vis->select("SUM(total_amount) as count, SUM(total_amount) as s, DAY(order_date) as day")
//         ->where('MONTH(order_date)', $month)
//         ->where('YEAR(order_date)', $year)
//         ->groupBy('DAY(order_date)')
//         ->orderBy('day', 'ASC')
//         ->get();
//         $record = $query->getResult();
//         $products = [];
//         foreach ($record as $row) {
//             $products[] = array(
//                 'day'   => $row->day,
//                 'sell' => floatval($row->s),
//                 'count' => floatval($row->count)
//             );
//         }

//         $queries = $this->vis->select("SUM(total_amount) as total_sales, MONTH(order_date) as month")
//                                 ->where('MONTH(order_date)', $month)
//                                 ->where('YEAR(order_date)', $year)
//                                 ->groupBy('MONTH(order_date)')
//                                 ->orderBy('month','ASC')
//                                 ->get();

//         $salesByMonth = $queries->getResult();

//         usort($salesByMonth, function($a, $b) {
//             return $a->month - $b->month;
//         });


//         $month=  date('F', mktime(0, 0, 0, $month, 1));

//         $sheet = $spreadsheet->getActiveSheet();

//         $sheet->setCellValue('A1', $month);
//         $sheet->setCellValue('B1', 'Sales');


//         $rows = 2;
//         foreach($salesByMonth as $val)
//         {
           
//             $sheet->setCellValue('D'. $rows, $val->total_sales);
//             $rows++;
//         }
       

//         foreach($products as $val)
//         {
           
//             $sheet->setCellValue('A'. $rows, $val['day']);
//             $sheet->setCellValue('B'. $rows, $val['sell']);
//             $rows++;
//         }
//         $writer = new Xlsx($spreadsheet);
//         $writer->save($filename);
    
//         header("Content-Type: application/vnd.ms-excel");
//         header('Content-Disposition: attachment; filename="'. basename($filename).'"');
//         header('Expires: 0');
    
//         header('Cache-Control: must-revalidate');
//         header('Pragma: public');
//         header('Content-Length' . filesize($filename));
    
//         flush();
    
//         readfile($filename);
    
//         exit;
//    }      
public function salesReportPerDay()
{
    // Retrieve all necessary POST data
    $expenses = $this->request->getPost('expenses');
    $cost = $this->request->getPost('cost');
    $monthly = $this->request->getPost('monthly');
    $days = $this->request->getPost('day');
    $daysales = $this->request->getPost('dailysales');
    $month = $this->request->getPost('month');
    $year = $this->request->getPost('year');
    $total = $this->request->getPost('total');

    // Create a new Spreadsheet object
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set the title for the report
    $sheet->setCellValue('A1', 'Daily Sales for the Month of ' . $month . ', ' . $year);
    $sheet->mergeCells('A1:E1');
    $sheet->getStyle('A1')->getFont()->setBold(true);

    // Set headers for the table
    $sheet->setCellValue('A3', 'Day');
    $sheet->setCellValue('B3', 'Sales');
    $sheet->getStyle('A3:B3')->getFont()->setBold(true);
    $sheet->getStyle('A3:B3')->getFont()->getColor()->setRGB('FFFFFF');
    $sheet->getStyle('A3:B3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
    $sheet->getStyle('A3:B3')->getFill()->getStartColor()->setRGB('4F81BD');

    // Populate the table with daily sales data
    $row = 4;
    foreach ($days as $index => $day) {
        $sheet->setCellValue('A' . $row, $day);
        $sheet->setCellValue('B' . $row, number_format($daysales[$index], 2));
        $row++;
    }

    // Add expenses, cost, monthly sales, and total profit/loss to the report
    $row += 2; // Adding some space
    $sheet->setCellValue('A' . $row, 'Expenses');
    $sheet->setCellValue('B' . $row, number_format($expenses, 2));
    $row++;
    $sheet->setCellValue('A' . $row, 'Cost');
    $sheet->setCellValue('B' . $row, number_format($cost, 2));
    $row++;
    $sheet->setCellValue('A' . $row, 'Monthly Sales');
    $sheet->setCellValue('B' . $row, number_format($monthly, 2));
    $row++;
    if($monthly >=1)
    {
    $sheet->setCellValue('A' . $row, 'Total Profit');
    $sheet->setCellValue('B' . $row, number_format($total, 2));
}
elseif($monthly < 0)
{
    $sheet->setCellValue('A' . $row, 'Total Lost');
    $sheet->setCellValue('B' . $row, number_format($total, 2));
}
    // Prepare the filename for the Excel file
    $filename = 'Daily_Reports_In_Month_Of_' . $month . '.xlsx';

    // Write the spreadsheet to a file
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save($filename);

    // Send the file to the browser for download
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filename));
    flush();
    readfile($filename);

    // Delete the file after download
    unlink($filename);

    exit;
}

// viewing Report

public function viewReportDaily($month, $year)
{

    $data = [];


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

    $queries = $this->vis->select("SUM(total_amount) as total_sales, MONTH(order_date) as month")
                            ->where('MONTH(order_date)', $month)
                            ->where('YEAR(order_date)', $year)
                            ->groupBy('MONTH(order_date)')
                            ->orderBy('month','ASC')
                            ->get();

    $salesByMonth = $queries->getResult();

    usort($salesByMonth, function($a, $b) {
        return $a->month - $b->month;
    });

    $data = [
        'product'      => $products,
        'salesByMonth' => $salesByMonth,        
    ];


    $month=  date('F', mktime(0, 0, 0, $month, 1));
    return view('admin/viewreportPerday', $data);

}
//Exporting Report
   public function salesReportPerMonthInyear($monthlySalesReports)
    {
        $data = [];

        $filename = 'Daily Reports In Month Of '. $monthlySalesReports .'.xlsx';

        $spreadsheet = new Spreadsheet();

            $query = $this->vis->select("SUM(total_amount) as total_sales, MONTH(order_date) as month")
                                ->where('YEAR(order_date)', $monthlySalesReports)
                                ->groupBy('MONTH(order_date)')
                                ->orderBy('month','ASC')
                                ->get();

        $salesByMonth = $query->getResult();

        usort($salesByMonth, function($a, $b) {
            return $a->month - $b->month;
        });


        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', $monthlySalesReports);
        $sheet->setCellValue('B1', 'Sales');


        $rows = 2;

    

        foreach($salesByMonth as $val)
        {
            $monthName = date('F', mktime(0, 0, 0, $val->month, 1));
            $sheet->setCellValue('A' . $rows, $monthName);
            $sheet->setCellValue('B' . $rows, $val->total_sales);
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

    public function salesReportEveryYear()
    {
        $data = [];
    
        $salesByYear = $this->vis
            ->select('YEAR(order_date) as year, SUM(total_amount) as total_sales')
            ->groupBy('YEAR(order_date)')
            ->findAll();
    
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        $sheet->setCellValue('A1', 'Year');
        $sheet->setCellValue('B1', 'Sales');
    
        $rows = 2;
    
        foreach($salesByYear as $val)
        {
            $sheet->setCellValue('A' . $rows, $val['year']);
            $sheet->setCellValue('B' . $rows, $val['total_sales']);
            $rows++;
        }
    
        $filename = 'Sales_Report_Every_Year.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
    
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
    
        flush();
        readfile($filename);
    
        exit;
    }


    public function viewReport()
    {
        
        $expenses = $this->request->getPost('expense');
        $cost     = $this->request->getPost('cost');
        $monthly  = $this->request->getPost('monthly');
        $days     = $this->request->getPost('days');
        $daysales = $this->request->getPost('daysales');
        $month    = $this->request->getPost('month');
        $year = $this->request->getPost('year');

       $total = $monthly - $expenses - $cost;
       

       $data = [
            'expenses' => $expenses,
            'cost'     => $cost,
            'monthly'  => $monthly,
            'days'     => $days,
            'daysales' => $daysales,
            'total'    => $total,
            'month'    => $month,
            'year'     => $year

       ];

       return view('admin/viewReportPerday', $data);

    }
    public function InsertExpenses()
    {
        $Day = $this->request->getPost('days');
        $totalSalesByDay = $this->request->getPost('total_sales');
        $totalMonthly = $this->request->getPost('MonthlySales');
        $month = $this->request->getPost('month');
        $year = $this->request->getPost('year');

        $data = ['Day'            => $Day,
                 'totalSalesByDay'=> $totalSalesByDay,
                 'totalMonthly'   => $totalMonthly,
                 'month'          => $month,
                 'year'           => $year
                ];
                if(empty($Day) && empty($totalSalesByDay)){
                    return redirect()->to('admindash');
                }

                else{
                    return view('admin/GetMyExpensesAndCost', $data);
                }
    
    }


    public function weekly(){
            $db = \Config\Database::connect();
            $requestData = $this->request->getJSON();
            $query = $this->vis->select("SUM(total_amount) as total_sales, MONTH(order_date) as month")
            ->where('MONTH(order_date)', 1)
            ->where('YEAR(order_date)', 2024)
            ->groupBy('MONTH(order_date)')
            ->orderBy('month','ASC')
            ->get();
    $ByMonth = $query->getResult();

        usort($ByMonth, function($a, $b) {
        return $a->month - $b->month;
        });
                
            var_dump($ByMonth);
        }
        
    
}
