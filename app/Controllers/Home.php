<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function test() {

        $data['title'] = "Test Server";

        echo view('templates/header',$data);
        echo view('templates/navbar');
        echo view('templates/sidebar');
        echo view('start/start');
        echo view('templates/footer');
        echo view('templates/g-script');
        echo view('start/script');

    }

    public function test2() {
        $data['title'] = "Test Server 2";

        echo view('templates/header',$data);
        echo view('templates/navbar');
        echo view('templates/sidebar');
        echo view('start2/start2');
        echo view('templates/footer');
        echo view('templates/g-script');
        echo view('start2/script');
    }

    public function test3() {
        $data['title'] = "Test Server 3";

        echo view('templates/header',$data);
        echo view('templates/navbar');
        echo view('templates/sidebar');
        echo view('start3/start3');
        echo view('templates/footer');
        echo view('templates/g-script');
        echo view('start3/script');
    }
}
