<?php
class User extends CI_Model {

    var $username   = '';
    var $password = '';

    function __construct()
    {
        parent::__construct();
    }

    function validate(){

         $user = $this->input->post('user');
         $pass = $this->input->post('password');
         $sql = "select password from user where username = ?";
         $row = $this->db->query($sql, array($user))->row();

         if(is_null($row)){
           $response['errorMsg'] = "BAD_USER";
           $response['validation'] = false;
         }else{
            if($pass == $row->password){
                $response['validation'] = true;
            }else{
                $response['validation'] = false;
                $response['errorMsg'] = "BAD_PASS";

            }
         }
         return $response;
    }


    function getUserInfo(){
        $user = $this->input->post('user');
        $pass = $this->input->post('password');
        $sql = "select * from user where username = ?";
        $row = $this->db->query($sql, array($user))->row();
        return $row;

    }

    function getHistoryInfo($id){
        $sql = "select * from pacient_history where pacient_id = ? order by date desc";
        $history = $this->db->query($sql, array($id))->result();
        return $history;
    }

    function getDescription($id){
        $sql = "select descripcion from pacient where id = ?";
        $row = $this->db->query($sql, array($id))->row();
        if(is_null($row)){
            return "EMPTY";
        }else{
            return $row->descripcion;
        }
    }

}
?>