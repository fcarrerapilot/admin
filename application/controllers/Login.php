<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index(){
	    $errorMsg = $this->input->get('errorMsg');
        if ($this->loginservice->validateSession()) {
            redirect("../pacient/index");
        } else {
            if(!is_null($errorMsg)){
                $d['errorMsg'] = $errorMsg;
            }
            $d['v'] = 'login';
            $this->load->view('main', $d);
        }
	}

	public function doLogin(){
	    if ($this->loginservice->validateSession()) {
            redirect("../pacient/index");
        } else {
            $this->load->model('user');
            $validateResponse = $this->user->validate();
            if($validateResponse['validation']){
                $this->loginservice->saveLogin($this->user->getUserInfo());
                redirect("../pacient/index");
            }else{
                redirect("../login/index?errorMsg=".$validateResponse['errorMsg']);
            }
        }
	}

	public function logout(){
        $this->loginservice->logout();
        redirect("../login/index");

	}

	public function user(){
        $d['v'] = 'user';
        $d['user'] = $this->loginservice->getSession();
        $this->load->view('main', $d);
	}

}

?>
