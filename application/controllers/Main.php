<?php

    class Main extends CI_Controller {

    	public function __construct() {
	        parent:: __construct();
	        $this->load->helper("url");
	        $this->load->library('table');
        	$this->load->library('pagination');
        	$this->load->model('Student_model');
	    }

        public function index()   
        {   
        	//table
        	$query = $this->Student_model->student_get_students();
        	$result = $query->result();
        	$tmpl = array ( 'table_open'  => '<table class="table table-hover">' );
        	$this->table->set_template($tmpl);
			$this->table->set_heading('ФИО', 'Группа','Действие');

			

			//paginatio
			$config['base_url'] = 'http://host20.vps10.r70.ru/';
			$config['total_rows'] = count($result);
			$config['per_page'] = '10';

			$this->pagination->initialize($config);

			if ($this->uri->segment(1)>=10) {
				$res_arr = array_slice($result, $this->uri->segment(1), $this->uri->segment(1) + 10);
				foreach ($res_arr as $key => $value) {
					$res = $value->stud_name .' '. $value->stud_second_name .' '. $value->stud_middle_name;
					$this->table->add_row($res, $value->group_numb, 'Редактировать/удалить');
				}
			} else {
				$res_arr = array_slice($result, 0, 10);
				foreach ($res_arr as $key => $value) {
					$res = $value->stud_name .' '. $value->stud_second_name .' '. $value->stud_middle_name;
					$this->table->add_row($res, $value->group_numb, 'Редактировать/удалить');
				}
			}

			
			
        	$data['table'] = $this->table->generate();
        	$data['pag'] = $this->pagination->create_links();
		    $this->load->view('main_view', $data);   
        }   
    }  
