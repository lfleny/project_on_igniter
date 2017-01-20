<?php

    class Group_edit extends CI_Controller {

    	public function __construct() {
	        parent:: __construct();
        	$this->load->model('Student_model');
            $this->load->model('Group_model');
            $this->load->helper('form');
	    }

        public function index()   
        {   
           
		    $this->load->view('group_edit_view');   
        }

        public function group_edit() {
        	if ($this->input->post('action') == 'Сохранить') {
        		$this->Group_model->group_add($this->input->post('group_numb'));
        	} else {
        		$query = $this->Group_model->group_delete($this->input->post('group_numb'));
        		if ($query["state"]) {
        			echo "delete";
        		} else {
        			echo "isn't delete ";
        		}
        		
        	}	
        }
    }  
