<?php
class ValidateLogin extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }
    
    
    public function index() {
       
        $login = $this->input->post('login');
        $passowrd = $this->input->post('password');


       $resp =  $this->checkUser($login,$passowrd);

        if ($resp == FALSE) {
            $this->load->view('login_view');
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function checkUser($login,$password){
        $userObj = $this->User_model->getUserObject($login,$password);
            if(is_array($userObj[0])){
                $userSession['user_obj'] = $userObj[0];
                $userSession['user_obj']['is_logged_in'] = true;
                $this->session->set_userdata($userSession);
                return true;
            }else{
                return false;
            }
    }

}

