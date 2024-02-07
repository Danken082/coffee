<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'product_tbl';
    protected $primaryKey       = 'prod_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['prod_name', 'prod_quantity', 'prod_mprice', 'prod_lprice', 'prod_categ', 'prod_code'];


    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function hotcoffee($categ)
    {
        return $this->where('prod_categ', $categ)->findAll();
    }

    public function icedcoffee($categ)
    {
        return $this->where('prod_categ', $categ)->findAll();
    }

    public function flavoredcoffee($categ)
    {
        return $this->where('prod_categ', $categ)->findAll();
    }

    public function noncoffee($categ)
    {
        return $this->where('prod_categ', $categ)->findAll();
    }

    public function coffeefrappe($categ)
    {
        return $this->where('prod_categ', $categ)->findAll();
    }

    public function meal($categ)
    {
        return $this->where('prod_categ', $categ)->findAll();
    }

    public function pasta($categ)
    {
        return $this->where('prod_categ', $categ)->findAll();
    }

    public function appetizer($categ)
    {
        return $this->where('prod_categ', $categ)->findAll();
    }

    public function salad($categ)
    {
        return $this->where('prod_categ', $categ)->findAll();
    }

    public function soup($categ)
    {
        return $this->where('prod_categ', $categ)->findAll();
    }

    public function sandwich($categ)
    {
        return $this->where('prod_categ', $categ)->findAll();
    }

    public function products()
    {
        return $this->where('prod_name')->findAll();
    }    
}
