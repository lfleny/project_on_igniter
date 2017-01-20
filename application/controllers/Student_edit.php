<?php

    class Student_edit extends CI_Controller {

    	public function __construct() {
	        parent:: __construct();
        	$this->load->model('Student_model');
            $this->load->model('Group_model');
            $this->load->helper('form');
	    }

        public function index()   
        {   
            $option_list ='';
            $query = $this->Group_model->group_get_groups();
            $groups = $query->result();
            foreach ($groups as $key => $value) {
                $option_list .= '<option>'. $value->group_numb .'</option>';
            }
            $data['option_list'] = $option_list;
		    $this->load->view('student_edit_view',$data);   
        }

        public function student_edit ()
        {
            $user = array(
                'stud_name' =>  $this->input->post('name'), 
                'stud_second_name' => $this->input->post('second_name'),
                'stud_middle_name' => $this->input->post('middle_name'),
                'group_numb' => $this->input->post('group_numb')
                );
            if ($this->input->post('action') != 'add') {
                $this->Student_model->student_add($user);
            } else {
                $this->Student_model->student_edit($user);
            }
        }  
    }  
