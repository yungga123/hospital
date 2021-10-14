<?php

namespace App\Controllers;
use App\Models\AccountsModel;
use App\Models\PersonnelModel;

class LoginPageController extends BaseController
{
    
    public function index()
    {
        $session = session();

        if (!$session->has('logged_in')){
            $data['title'] = 'Hospital';
            echo view('loginpage/loginpage', $data);
        } else {
            return redirect()->to('dashboard');
        }
        
    }

    public function validate_user() {

        $validate = [
            'success' => false,
            'messages' => ''
        ];

        $userModel = new AccountsModel();
        $request = $this->request;
        $username = $request->getPost('username');
        $user_data = $userModel->findUsername($username);
        
        $password = '';
        
        if ($user_data) {
            $username = $user_data[0]['username'];
            $password = $user_data[0]['password'];
            $personnel_id = $user_data[0]['personnel_id'];
        }

        if (!$this->validate([
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

            $session = session();
            $personnelModel = new PersonnelModel();
            $personnelData = $personnelModel->findUser($personnel_id);

            $array = [
                'logged_in' => true,
                'username' => $username,
                'firstname' => $personnelData['firstname'],
                'middlename' => $personnelData['middlename'],
                'lastname' => $personnelData['lastname'],
                'gender' => $personnelData['gender'],
                'position' => $personnelData['position'],
            ];
            
            $session->set($array);

        }

        echo json_encode($validate);

    }

    public function register_user() {
        $accountsModel = new AccountsModel();

        $validate = [
            'success' => false,
            'messages' => ''
        ];

        $data = [
            "personnel_id" => $this->request->getPost('personnel_id'),
            "username" => $this->request->getPost('username'),
            "password" => $this->request->getPost('password'),
            "confirm_pw" => $this->request->getPost('confirm_pw'),
            "class" => $this->request->getPost('class')
        ];

        if (!$accountsModel->insertData($data)) {
            $validate['messages'] = $accountsModel->errors();
        } else {
            $validate['success'] = true;
        }

        echo json_encode($validate);
    }

    public function session_destroy() {
        $session = session();
        $session->destroy();

        return redirect()->to('');
    }
}
