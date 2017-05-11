<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {

        $currentUserInfo = $this->session->userdata('user_obj');

        if (!isset($currentUserInfo) || $currentUserInfo['is_logged_in'] != true) {
            redirect('login', 'refresh');
        }
        $result = array();
        if ($currentUserInfo['type'] == 'U') {

            // prepare home page data for User/Patient
            $result = $this->User_model->getPrescriptionsInofByUserId($currentUserInfo['id']);
            $data = ['result' => $result];
            $viewTemplate = 'home/index';
        }

        if ($currentUserInfo['type'] == 'P') {
            // prepare home page data for Pharmacist 
            $result = $this->User_model->getAllUsersAllPrescriptions($currentUserInfo['id']);
            $data = ['result' => $result];
            $viewTemplate = 'home/home_accessor';
        }

        if ($currentUserInfo['type'] == 'D') {
            // prepare home page data for Doctor 
            $result = $this->User_model->getAllUsersAllPrescriptions($currentUserInfo['id']);
            $data = ['result' => $result];
            $viewTemplate = 'home/home_accessor';
        }
        // Load views 
        $this->load->view('template/header_template');
        $this->load->view($viewTemplate, $data);
        $this->load->view('template/menu');
        $this->load->view('template/footer_template');

        // Get user infromation from session 
    }

    public function prescription_detail() {
        $prescriptionID = $this->input->get('pid');

        $currentUserInfo = $this->session->userdata('user_obj');
        if (!isset($currentUserInfo) || $currentUserInfo['is_logged_in'] != true) {
            redirect('login', 'refresh');
        }
        $result = $this->User_model->getPrescriptionDetail($prescriptionID);
        if($result){
            $data = ['result' => $result[0]];
            $viewTemplate = 'home/detail_view';
        }
        
        $this->load->view('template/header_template');
        $this->load->view($viewTemplate, $data);
        $this->load->view('template/menu');
        $this->load->view('template/footer_template');
    }
    

    public function request_access() {
        $prescriptionID = $this->input->get('pid');
        $currentUserInfo = $this->session->userdata('user_obj');
        $accessorID = $currentUserInfo['id'];
        $result = $this->User_model->createAccessRequest($prescriptionID, $accessorID);
        if ($result) {
            redirect('home', 'refresh');
        }
    }

}

?>