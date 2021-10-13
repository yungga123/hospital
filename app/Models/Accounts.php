<?php

namespace App\Models;

use CodeIgniter\Model;

class Accounts extends Model
{
    protected $table = 'accounts';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = ['id','personnel_id','username','password','class'];
    
    // protected $useTimestamps = true;
    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';
    // protected $useTimestamps = 'deleted_at';
    
    protected $validationRules = [
        'personnel id' => 'required|integer|max_length[11]',
        'username' => 'required|alpha_numeric|max_length[200]|is_unique[accounts.username]',
        'password' => 'required|alpha_numeric|max_length[200]',
        'class' => 'required|integer|max_length[5]'
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;


    public function findUser($user_id) {
        return $this->find($user_id);
    }


    
}