<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemsModel extends Model
{

    protected $DBGroup          = 'default';
    protected $table            = 'rawproducttable';
    protected $primaryKey       = 'rawID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'stocks', 'barcode', 'item_categ'];
    
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

    public function equipments($categ)
    {
        return $this->where('item_categ', $categ)->findAll();
    }

    public function rawmats($categ)
    {
        return $this->where('item_categ', $categ)->findAll();
    }

    public function supplies($categ)
    {
        return $this->where('item_categ', $categ)->findAll();
    }
}