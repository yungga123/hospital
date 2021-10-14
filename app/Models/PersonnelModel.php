<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonnelModel extends Model {

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
        'firstname' => 'required|max_length[300]|alpha_numeric_spaces',
        'middlename' => 'required|max_length[300]|alpha_numeric_spaces',
        'lastname' => 'required|max_length[300]|alpha_numeric_spaces',
        'gender' => 'required|max_length[100]',
        'position' => 'required|max_length[100]',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function findUser($id) {
        return $this->find($id);
    }
}