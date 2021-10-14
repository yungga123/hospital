<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientsModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    
    protected $allowedFields = [
        "id",
        "firstname",
        "middlename",
        "lastname",
        "contact_no",
        "address",
        "date_of_admission",
        "sickness"
    ];
    
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    
    protected $validationRules = [
        "firstname" => 'required|max_length[500]|alpha_numeric_space',
        "middlename" => 'max_length[500]|alpha_numeric_space',
        "lastname" => 'required|max_length[500]|alpha_numeric_space',
        "contact_no" => 'max_length[20]|alpha_numeric',
        "address" => 'required',
        "date_of_admission" => 'required',
        "sickness" => 'required'
    ];
    protected $validationMessages = [
        "firstname" => [
            "required" => "First Name is required.",
            "max_length" => "Max length is 500.",
            "alpha_numeric_space" => "First Name must only contain alpha-numeric characters."
        ],
        "middlename" => [
            "required" => "Middle Name is required.",
            "max_length" => "Max length is 500.",
            "alpha_numeric_space" => "Middle Name must only contain alpha-numeric characters."
        ],
        "lastname" => [
            "required" => "Last Name is required.",
            "max_length" => "Max length is 500.",
            "alpha_numeric_space" => "Last Name must only contain alpha-numeric characters."
        ],
        "contact_no" => [
            "max_length" => "Contact Number max length is 20.",
            "alpha_numeric" => "Contact Number must contain alpha numeric characters."
        ],
        "date_of_admission" => [
            "required" => "Date of admission is required."
        ],
        "sickness" => [
            "required" => "Sickness is required."
        ]

    ];
    protected $skipValidation = false;

    public function insertData($data){
        return $this->insert($data);
    }
}