<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistoryModel;

class VisualizationController extends BaseController
{
    public function initDayChart() {
        
        $db = \Config\Database::connect();
        $builder = $db->table('tbl_orders');
        $query = $builder->select("COUNT(order_id) as count, total_amount as s, DAYNAME(order_date) as day");
        $query = $builder->where("DAY(order_date) GROUP BY DAYNAME(order_date), s")->get();
        $record = $query->getResult();
        $products = [];
        foreach($record as $row) {
            $products[] = array(
                'day'   => $row->day,
                'sell' => floatval($row->s)
            );
        }
        
        $data['products'] = ($products);    
        return view('admin/dashboard', $data);                
    }
}
