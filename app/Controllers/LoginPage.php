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

        $user = new Accounts();
        $request = $this->request;
        $username = $request->getPost('username');
        $user_data = $user->findUsername($username);
        
        $password = '';
        
        if ($user_data) {
            $username = $user_data[0]['username'];
            $password = $user_data[0]['password'];
        }

        if (! $this->validate([
            'username' => "required|is_not_unique[accounts.username]",
            'password'  => "required|in_list[$password]"
        ],[ // errors
            'username' => [
                "required" => "Please provide username.",
                "is_not_unique" => "Username does not exist"
            ],
            'password' => [
                "required" => "Please provide password.",
                "in_list" => "Wrong Password."
            ]
        ])) {
                $validate['messages'] = [
                    "username" => $this->validator->getError('username'),
                    "password" => (!$this->validator->hasError('username')) ? $this->validator->getError('password') : '',
                ];
        } else {
            $validate['success'] = true;

        }

        echo json_encode($validate);

    }

    public function password() {
        
    }
}
