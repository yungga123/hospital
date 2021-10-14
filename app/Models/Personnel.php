<?php

namespace App\Models;

use CodeIgniter\Model;

class Personnel extends Model {

    protected $table = 'personnel';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    
    protected $allowedFields = ['id','firstname','middlename','lastname','gender','position'];
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    
    protected $validationRules = [
        'personnel id' => 'required|integer|max_length[11]',
        'username' => 'required|alpha_numeric|max_length[200]|is_unique[accounts.username]',
        'password' => 'required|alpha_numeric|max_length[200]',
        'class' => 'required|integer|max_length[5]'
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function findUser($id) {
        return $this->find($id);
    }
}