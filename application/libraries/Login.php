<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index(){
	    $errorMsg = $this->input->get('errorMsg');
	    $this->load->model('user');
	    $this->load->library('loginSerddvice');
        if ($this->loginService->validateSession()) {
            redirect("../login/user");
        } else {
            if(!is_null($errorMsg)){
                $d['errorMsg'] = $errorMsg;
            }
            $d['v'] = 'login';
            $this->load->view('main', $d);
        }
	}

	public function doLogin(){
	    $this->load->library('login');
	    $user = $this->login->getSession();
	    if ($user) {
            redirect("../login/user");
        } else {
            $this->load->model('user');
            $validateResponse = $this->user->validate();
            if($validateResponse['validation']){
                $this->load->helper('url');
                $this->login->saveLogin($this->user->getUserInfo());
                redirect("../login/user");
            }else{
                redirect("../login/index?errorMsg=".$validateResponse['errorMsg']);
            }
        }
	}

	public function logout(){
	    $this->load->library('login');
        $this->login->logout();
        redirect("../login/index");

	}

	public function user(){
	    $this->load->library('login');
	    $this->load->model('user');
        $d['v'] = 'user';
        $d['user'] = $this->login->getSession();
        $this->load->view('main', $d);
	}
}
