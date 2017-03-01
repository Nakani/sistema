<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct() {
		parent::__construct();
		//model
		$this->load->model('usuario_model');
	}

	public function listar(){
		if(!$this->session->userdata("usuario")) {
			redirect(base_url().'login/index', 'refresh');
		}else{
			$data['users'] = $this->usuario_model->get_all();

			$this->load->view('default/header');
			$this->load->view('usuario/listar',$data);
			$this->load->view('default/footer');
		}
	}

	public function adicionar(){
		if(!$this->session->userdata("usuario")) {
			redirect(base_url().'login/index', 'refresh');
		}else{
			$this->load->view('default/header');
			$this->load->view('usuario/adicionar');
			$this->load->view('default/footer');
		}	
	}

	public function save(){

	    $this->form_validation->set_rules('nome', 'Nome', 'required');
	    $this->form_validation->set_rules('senha', 'Senha', 'required',
	            array('required' => 'Você deve fornecer um %s.')
	    );
	    $this->form_validation->set_rules('email', 'Email', 'required');

	    if ($this->form_validation->run() == FALSE)
	    {
			$this->session->set_flashdata('message_fail','Erro ao salvar, verifique campos vazios!');
			redirect(base_url().'usuario/listar', 'refresh');
	    }
	    else{ 
			if(!$this->session->userdata("usuario")) {
				redirect(base_url().'login/index', 'refresh');
			}else{
				$data['id']    = $this->uri->segment(3);
				$data['nome']  = $this->input->post('nome');	
				$data['email'] = $this->input->post('email');
				$data['senha'] = md5($this->input->post('senha'));	
				$data['nivel'] = $this->input->post('nivel');
				$resp = $this->usuario_model->save($data);

				if($resp==TRUE){
					$this->session->set_flashdata('message_ok','Salvo com sucesso');
					redirect(base_url().'usuario/listar', 'refresh');
				}
				else{
					$this->session->set_flashdata('message_fail','Erro ao salvar');
					redirect(base_url().'usuario/listar', 'refresh');

				}
			}	
		   }

	}

	public function editar(){
		if(!$this->session->userdata("usuario")) {
			redirect(base_url().'login/index', 'refresh');
		}else{
			$id = $this->uri->segment(3);
			$data['user'] = $this->usuario_model->get_usuario($id);

			$this->load->view('default/header');
			$this->load->view('usuario/editar', $data);
			$this->load->view('default/footer');
		}	
	}

	public function update(){
		$data['id']    = $this->uri->segment(3);
		$data['nome']  = $this->input->post('nome');	
		$data['email'] = $this->input->post('email');
		if($this->input->post('senha')!=''){
			$data['senha'] = $this->input->post('senha');	
		}
		$data['nivel'] = $this->input->post('nivel');
		$resp = $this->usuario_model->update($data);
		if($resp==TRUE){
			$this->session->set_flashdata('save_ok','Atualizado com sucesso');
			redirect(base_url().'usuario/editar/'.$data['id'], 'refresh');
		}
		else{
			$this->session->set_flashdata('save_fail','Erro ao atualizar');
			redirect(base_url().'usuario/editar', 'refresh');

		}
	}

	public function apagar(){
		$resp = $this->usuario_model->delete($this->uri->segment(3));
		if($resp==TRUE){
			$this->session->set_flashdata('message_ok','Apagado com sucesso');
			redirect(base_url().'usuario/listar', 'refresh');
		}
		else{
			$this->session->set_flashdata('message_fail','Erro ao apagar');
			redirect(base_url().'usuario/listar', 'refresh');

		}
	}


}