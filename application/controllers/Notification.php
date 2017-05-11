<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Notification_model');
    }

    public function index() {

        $currentUserInfo = $this->session->userdata('user_obj');

        if (!isset($currentUserInfo) || $currentUserInfo['is_logged_in'] != true) {
            redirect('login', 'refresh');
        }

        $result = array();
        if ($currentUserInfo['type'] == 'U') {

            // prepare home page data for User/Patient
            $result = $this->Notification_model->getAccessRequestByPatient($currentUserInfo['id']);
            $data = ['result' => $result];
            $viewTemplate = 'notification/index';
        }

        if ($currentUserInfo['type'] == 'P') {
            // prepare home page data for Pharmacist 
            $result = $this->Notification_model->getAccessRequestByPatient($currentUserInfo['id']);
            $data = ['result' => $result];
            $viewTemplate = 'home/home_accessor';
        }

        if ($currentUserInfo['type'] == 'D') {
            // prepare home page data for Doctor 
            $result = $this->Notification_model->getAccessRequestByPatient($currentUserInfo['id']);
            $data = ['result' => $result];
            $viewTemplate = 'home/home_accessor';
        }
        // Load views 
        $this->load->view('template/header_template');
        $this->load->view($viewTemplate, $data);
        $this->load->view('template/menu');
        $this->load->view('template/footer_template');
    }

    public function grant_access() {
        $paclID = $this->input->get('pacl_id');
        $status = $this->input->get('st');
        $currentUserInfo = $this->session->userdata('user_obj');

        if (!isset($currentUserInfo) || $currentUserInfo['is_logged_in'] != true) {
            redirect('login', 'refresh');
        }

        $result = $this->Notification_model->updatePcl($paclID, $status);
        if ($result == TRUE) {
            redirect('notification', 'refresh');
        }else{
            $errorMsg = "Can't update this record";
        }
    }

}
