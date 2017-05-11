<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {

        if ($this->session->userdata('user_obj') && $this->session->userdata('user_obj')['is_logged_in']) {
            redirect('home');
        }
        if (null !== $this->input->post('login') && null !== $this->input->post('password')) {
            redirect('login');
        }
        $this->load->helper(array('form'));
        $this->load->view('login_view');
    }

    function logout() {
        $this->session->unset_userdata('user_obj');
        session_destroy();
        redirect('login', 'refresh');
    }

}

?>
