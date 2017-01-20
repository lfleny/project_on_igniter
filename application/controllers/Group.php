<?php

   class Group extends CI_Controller{ 

   		public function __construct() {
	        parent:: __construct();
	        $this->load->helper("url");
	        $this->load->library('table');
        	$this->load->library('pagination');
        	$this->load->model('Group_model');
	    }

        public function index()   
        {   
        	$groups = $this->Group_model->group_get_groups()->result();
        	$tmpl = array ( 'table_open'  => '<table class="table table-hover">' );
        	$this->table->set_template($tmpl);
        	$this->table->set_heading('Группа','Действие');
        	
        	//paginatio
			$config['base_url'] = 'http://host20.vps10.r70.ru/group';
			$config['total_rows'] = count($groups);
			$config['per_page'] = '10';

			$this->pagination->initialize($config);

			if ($this->uri->segment(2)>=10) {
				$res_arr = array_slice($groups, $this->uri->segment(2), $this->uri->segment(2) + 10);
				foreach ($res_arr as $key => $value) {
					$this->table->add_row($value->group_numb, 'Редактировать/удалить');
				}
			} else {
				$res_arr = array_slice($groups, 0, 10);
				foreach ($res_arr as $key => $value) {
					$this->table->add_row($value->group_numb, 'Редактировать/удалить');
				}
			}

			$data['table'] = $this->table->generate();
        	$data['pag'] = $this->pagination->create_links();
		    $this->load->view('group_view', $data);   
        }  

    }   
?>
