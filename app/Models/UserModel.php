<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    private $user;

    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'UserID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['LastName', 'is_active', 'FirstName', 'gender', 'UserRole', 'birthdate','Username', 'email', 'ContactNo', 'age', 'code', 'status', 'address', 'Password','token', 'profile_img',];

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
    
    public function updateUserProfile($userId, $data) {
            $builder = $this->db->table('user');
            $builder->where('UserID', $userId);
            $builder->update($data);
    }    
    public function isAlreadyRegistered($authid)
    {
        return $this->getWhere(['code' => $authid])->getRowArray() > 0 ? true : false;
    }
    public function updateUserData($authid, $userdata)
    {
       return $this->update( $userdata, ['code' => $authid],);
    }
    public function insertUserData($userdata)
    {
       $this->insert($userdata);
    }
}