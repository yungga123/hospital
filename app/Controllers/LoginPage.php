<?php

namespace App\Controllers;

use App\Models\Accounts;


class LoginPage extends BaseController
{

    public function __construct()
    {
        
    }
    
    public function index()
    {
        
        $data['title'] = 'Hospital';

        echo view('loginpage/loginpage', $data);
    }

    public function validate_user() {

        $validate = [
            'success' => false,
            'messages' => ''
        ];

        if (! $this->validate([
            'username' => "required",
            'password'  => 'required'
        ])) {
                $validate['messages'] = $this->validator->getErrors();
        } else {
            $validate['success'] = true;
        }

        echo json_encode($validate);

    }
}
