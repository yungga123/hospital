<?php

namespace App\Controllers;
use App\Models\Patients;
use App\Models\PatientsModel;

class PatientsController extends BaseController {

    public function index() {
        $session = session();

        if ($session->get('logged_in')) {
            $data['title'] = 'Patients';
            echo view('templates/header',$data);
            echo view('templates/navbar');
            echo view('templates/sidebar');
            echo view('patients/patients');
            echo view('templates/footer');
            echo view('templates/g-script');
            echo view('patients/script');

        } else {
            redirect()->to('');
        }

    }

    public function patient_list() {
        $session = session();

        if ($session->get('logged_in')) {
            $data['title'] = 'List of Patients';
            echo view('templates/header',$data);
            echo view('templates/navbar');
            echo view('templates/sidebar');
            echo view('patients/patients_list');
            echo view('templates/footer');
            echo view('templates/g-script');
            echo view('patients/script');

        } else {
            redirect()->to('');
        }

    }

    public function addPatient() {
        $patientsModel = new PatientsModel();

        $validate = [
            "success" => false,
            "messages" => ''
        ];

        $data = [
            "firstname" => $this->request->getPost('firstname'),
            "middlename" => $this->request->getPost('middlename'),
            "lastname" => $this->request->getPost('lastname'),
            "contact_no" => $this->request->getPost('contact_no'),
            "address" => $this->request->getPost('address'),
            "date_of_admission" => $this->request->getPost('date_of_admission'),
            "sickness" => $this->request->getPost('sickness')
        ];

        if (!$patientsModel->insertData($data)) {
            $validate['messages'] = $patientsModel->errors();
        } else {
            $validate['success'] = true;
        }

        echo json_encode($validate);

    }
    
}