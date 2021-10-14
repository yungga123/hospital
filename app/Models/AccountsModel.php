<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountsModel extends Model
{
    protected $table = 'accounts';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    
    protected $allowedFields = ['id','personnel_id','username','password','class'];
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    
    protected $validationRules = [
        "personnel_id" => "required|integer|max_length[11]|is_unique[accounts.personnel_id]",
        "username" => "required|alpha_numeric|max_length[200]|is_unique[accounts.username]",
        "password" => "required|alpha_numeric|max_length[200]",
        "confirm_pw" => "required|matches[password]",
        "class" => "required|integer|max_length[5]"
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;


    public function findUser($user) {
        return $this->find($user);
    }

    public function findUsername($user) {
        return $this->where('username',$user)
                    ->findAll();
    }

    public function insertData($data) {
        return $this->insert($data);
    }
    
}