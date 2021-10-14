<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function dashboard() {

        $session = session();

        if ($session->has('logged_in')) {
            $data['title'] = "Dashboard";
            echo view('templates/header',$data);
            echo view('templates/navbar');
            echo view('templates/sidebar');
            echo view('dashboard/dashboard');
            echo view('templates/footer');
            echo view('templates/g-script');
            echo view('dashboard/script');
        } else {
            return redirect()->to('');
        }

    }

}
