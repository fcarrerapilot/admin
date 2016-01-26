<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Pacient extends CI_Controller {

    public function index(){
        redirect("../pacient/crud");
    }

    public function descriptionCallbackField(){
        return '<textarea id="field-descripcion" class="form-control" name="descripcion" type="text" value="" maxlength="500"></textarea>';
    }

    function saveHistory($post_array,$primary_key) {

        $currentDescription = $this->user->getDescription($primary_key);
 
        if($currentDescription != $post_array['descripcion']){
             $update_array = array (
                "description" => $currentDescription,
                "pacient_id" => $primary_key,
                "date" => date("Y-m-d H:i:s")
            );
            $this->db->insert('pacient_history',$update_array);
        }

       
        return true;
    } 

	public function crud(){
	    $this->load->helper('url');
        $this->load->model('user');

	    if (!$this->loginservice->validateSession()) {
            redirect(base_url('login/index'));
        }

        $consultationUrl = base_url("pacient/consultation/")."/";

	    $this->grocery_crud->set_table('pacient');
	    $this->grocery_crud->set_crud_url_path(base_url("pacient/crud"));
	    $this->grocery_crud->unset_fields('id');
        $this->grocery_crud->set_field_upload('body_img','assets/uploads/files/body_img');
        $this->grocery_crud->set_field_upload('carta_astral','assets/uploads/files/castas_astrales');
        $this->grocery_crud->set_field_upload('file1','assets/uploads/files/common');
        $this->grocery_crud->set_field_upload('file2','assets/uploads/files/common');
        $this->grocery_crud->set_field_upload('file3','assets/uploads/files/common');
        $this->grocery_crud->set_field_upload('file4','assets/uploads/files/common');        
        $this->grocery_crud->set_field_upload('file5','assets/uploads/files/common');
     
        $this->grocery_crud->callback_column('id', array($this, '_id_column'));

        $this->grocery_crud->field_type('descripcion', 'text');
        $this->grocery_crud->field_type('carpeta_fisica', 'true_false');
        
        $this->grocery_crud->set_language("spanish");
        $this->grocery_crud->callback_before_update(array($this,'saveHistory')); 
        $this->grocery_crud->columns('numero_paciente','nombre','apellido','telefono');
        $this->grocery_crud->order_by('numero_paciente','desc');
        $this->grocery_crud->unset_read();
        $state = $this->grocery_crud->getState();
        if($state == "edit"){
            $id = $this->grocery_crud->getStateInfo()->primary_key;
            $info = $this->getHistoryInfo($id);
            $d['historyInfo'] = $info;
        }
        $d['state'] = $state;
	    $output = $this->grocery_crud->render();
        $d['v'] = 'pacient_crud';
        $d['output'] = $output;
        
        $this->load->view('main', $d);
	}


	private function getHistoryInfo($id){
        $historyInfo =  $this->user->getHistoryInfo($id);
        return $historyInfo;

	}

    function _id_column($value, $row){
        return $value;
    }


}

?>