<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class LoginService{


    function validateSession(){
        $CI =& get_instance();
        $CI->load->library('session');
        $user = $CI->session->userdata('user_info');
        return isset($user);
    }

    function getSession(){
        $CI =& get_instance();
        $CI->load->library('session');
        $user = $CI->session->userdata('user_info');
        return $user;
    }

    function logout(){
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->session->unset_userdata("user_info");
    }

    function saveLogin($user){
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->session->set_userdata("user_info",$user);
    }

}
?>