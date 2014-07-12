<?php

class Err404 extends CI_Controller {
    protected $header=array();
    
    function Err404() {
        parent::__construct();
        
        $this->load->helper('url');
        
        $this->header_data['url']=site_url();
        $this->header_data['base_url']=base_url();
        $this->header_data['title']='404 Student Not Found';
        $this->header_data['header']='IITK STUDENT SEARCH';
    }
    
    function index() {
        $this->load->view('templates/header', $this->header_data);
        $this->load->view('no_results');
        $this->load->view('templates/footer');
    }
}

?>