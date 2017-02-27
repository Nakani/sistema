<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sala extends CI_Controller {

	function __construct() {
		parent::__construct();
		//model
		$this->load->model('sala_model');
	}

	public function listar(){
		if(!$this->session->userdata("usuario")) {
			redirect(base_url().'login/index', 'refresh');
		}else{
			$data['salas'] = $this->sala_model->get_all();
			$this->load->view('default/header');
			$this->load->view('sala/listar',$data);
			$this->load->view('default/footer');
		}
	}

	public function adicionar(){
		if(!$this->session->userdata("usuario")) {
			redirect(base_url().'login/index', 'refresh');
		}else{
			
			$this->load->view('default/header');
			$this->load->view('sala/adicionar');
			$this->load->view('default/footer');
		}	
	}

	public function save(){

	    $this->form_validation->set_rules('nome', 'Nome', 'required');

	    if ($this->form_validation->run() == FALSE)
	    {
			$this->session->set_flashdata('message_fail','Erro ao salvar, verifique campos vazios!');
			redirect(base_url().'sala/listar', 'refresh');
	    }
	    else{ 
			if(!$this->session->userdata("usuario")) {
				redirect(base_url().'login/index', 'refresh');
			}else{
				$data['nome']  		  = $this->input->post('nome');	
				$data['observacao']  = $this->input->post('observacoes');	
				$resp = $this->sala_model->save($data);

				if($resp==TRUE){
					$this->session->set_flashdata('message_ok','Salvo com sucesso');
					redirect(base_url().'sala/listar', 'refresh');
				}
				else{
					$this->session->set_flashdata('message_fail','Erro ao salvar');
					redirect(base_url().'sala/listar', 'refresh');

				}
			}	
		   }

	}

	public function editar(){
		if(!$this->session->userdata("usuario")) {
			redirect(base_url().'login/index', 'refresh');
		}else{
			$id = $this->uri->segment(3);
			$data['sala'] = $this->sala_model->get_sala($id);
			$this->load->view('default/header');
			$this->load->view('sala/editar', $data);
			$this->load->view('default/footer');
		}	
	}

	public function update(){
		$data['id']    = $this->uri->segment(3);
		$data['nome']  = $this->input->post('nome');	
		if($this->input->post('observacoes')!=''){
			$data['observacao'] = $this->input->post('observacoes');	
		}
		$resp = $this->sala_model->update($data);
		if($resp==TRUE){
			$this->session->set_flashdata('save_ok','Atualizado com sucesso');
			redirect(base_url().'sala/editar/'.$data['id'], 'refresh');
		}
		else{
			$this->session->set_flashdata('save_fail','Erro ao atualizar');
			redirect(base_url().'sala/editar', 'refresh');

		}
	}

	public function apagar(){
		$resp = $this->sala_model->delete($this->uri->segment(3));
		if($resp==TRUE){
			$this->session->set_flashdata('message_ok','Apagado com sucesso');
			redirect(base_url().'sala/listar', 'refresh');
		}
		else{
			$this->session->set_flashdata('message_fail','Erro ao apagar');
			redirect(base_url().'sala/listar', 'refresh');
		}
	}


}