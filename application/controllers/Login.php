<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		//model
		$this->load->model('login_model');
	}


	public function index(){
		$this->load->view('login');
	}

	public function autenticar(){
		$data['email'] = 	$this->input->post('email');
		$data['senha'] = 	md5($this->input->post('pass'));
		$result = $this->login_model->confirmar($data);
		if($result!=NULL){
			$this->session->set_userdata("usuario", $result);
			redirect(base_url().'dashboard/index', 'refresh');
		}else{
	            $msg = array("mensagem" => "Email ou senha incorreto!");
	            $this->load->view('login',$msg);
		}
	}

	public function logout(){
		unset($_SESSION['usuario']);
		redirect(base_url().'Login/index', 'refresh');
	}


}
