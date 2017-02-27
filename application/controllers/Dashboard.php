<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		//model
		$this->load->model('dashboard_model');
	}

	public function index(){
		if(!$this->session->userdata("usuario")) {
			redirect(base_url().'login/index', 'refresh');
		}else{
			$this->load->view('default/header');
			$this->load->view('dashboard');
			$this->load->view('default/footer');
		}
	}
}