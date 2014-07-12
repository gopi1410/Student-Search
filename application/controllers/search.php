<?php

class Search extends CI_Controller {
    protected $header_data=array();
    protected $data=array();
    protected $form_data=array();
	protected $footer_data=array();
    
    function Search() {
        parent::__construct();
        $this->load->model('student_model');
        
        $this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('ip');
        
        //$this->output->enable_profiler(TRUE);
        
        $this->header_data['url']=site_url();
        $this->header_data['base_url']=base_url();
        $this->header_data['title']='IITK STUDENT SEARCH';
        $this->header_data['header']='IITK STUDENT SEARCH';
		$this->header_data['table_start']=TRUE;
        $this->data['base_url']=base_url();
        $this->form_data['base_url']=base_url();
		$this->footer_data['table_end']=TRUE;
		$this->footer_data['emails']="";
		if($this->ip->validate_IITK()===0)
		{
			$ip['ip']=$this->input->ip_address();
			$this->header_data['table_start']=FALSE;
			$this->footer_data['table_end']=FALSE;
			$this->load->view('templates/header', $this->header_data);
			$this->load->view('invalid', $ip);
			$this->load->view('templates/footer', $this->footer_data);
			echo $this->output->get_output();
			die();
		}
    }
    
    function index() {
		$this->header_data['table_start']=FALSE;
		$this->footer_data['table_end']=FALSE;
        $this->load->view('templates/header', $this->header_data);
        $this->load->view('search_form', $this->form_data);
        $this->load->view('templates/footer', $this->footer_data);
    }
    
    function searchByRoll($roll) {
        $query=$this->student_model->searchRoll($roll);
        
        $this->load->view('templates/header', $this->header_data);
        if($query->num_rows()===0) {
            $this->load->view('no_results', $this->data);
        }
        else {
            foreach($query->result() as $row) {
                $this->data['student']=$row;
                $this->load->view('search_view', $this->data);
				$this->footer_data['emails']=$this->footer_data['emails'].$row->email."@iitk.ac.in,";
            }
        }
		$this->footer_data['total']=$query->num_rows();
		$this->footer_data['emails']=substr($this->footer_data['emails'],0,strlen($this->footer_data['emails'])-1);
        $this->load->view('templates/footer', $this->footer_data);
    }
    
    function searchByMail($email) {
        $query=$this->student_model->searchMail($email);
        
        $this->load->view('templates/header', $this->header_data);
        if($query->num_rows()===0) {
            $this->load->view('no_results', $this->data);
        }
        else {
            foreach($query->result() as $row) {
                $this->data['student']=$row;
                $this->load->view('search_view', $this->data);
				$this->footer_data['emails']=$this->footer_data['emails'].$row->email."@iitk.ac.in,";
            }
        }
		$this->footer_data['total']=$query->num_rows();
		$this->footer_data['emails']=substr($this->footer_data['emails'],0,strlen($this->footer_data['emails'])-1);
        $this->load->view('templates/footer', $this->footer_data);
    }
	
	function multiSearch() {
		$this->form_data['prevVal']=$this->input->post('search');
		$query=$this->student_model->search();
		
		$this->load->view('templates/header', $this->header_data);
		if(!$query || $query->num_rows()===0) {
            $this->load->view('no_results', $this->data);
        }
        else {
			$this->load->view('search_form', $this->form_data);
            foreach($query->result() as $row) {
                $this->data['student']=$row;
                $this->load->view('search_view', $this->data);
				$this->footer_data['emails']=$this->footer_data['emails'].$row->email."@iitk.ac.in,";
            }
        }
		if($query) {
			$this->footer_data['total']=$query->num_rows();
		}
		$this->footer_data['emails']=substr($this->footer_data['emails'],0,strlen($this->footer_data['emails'])-1);
		$this->load->view('templates/footer', $this->footer_data);
	}
	
	function ajaxSearch() {
		$query=$this->student_model->search();
		$ajaxResult="";
		
		if(!$query || $query->num_rows()===0) {
            $ajaxResult="<br><h3>Hey stop abusing me! You are searching for a student that doesn't exit!</h3>";
            $ajaxResult.="<br><h3>Remember to search for emails or rolls via URLs as search/emailID or search/roll</h3>";
            $ajaxResult.="<br><br><h4>If you are sure its a valid student, mail me.</h4>";
        }
        else {
            foreach($query->result() as $row) {
                $this->data['student']=$row;
                $ajaxResult.=$this->load->view('search_view', $this->data,true);
				//$this->footer_data['emails']=$this->footer_data['emails'].$row->email."@iitk.ac.in,";
            }
        }
		if($query) {
			//$this->footer_data['total']=$query->num_rows();
		}
		//$this->footer_data['emails']=substr($this->footer_data['emails'],0,strlen($this->footer_data['emails'])-1);
		//$this->load->view('templates/footer', $this->footer_data);
		echo $ajaxResult;
	}
}

?>