<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

		function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        $this->load->model('agenda_model');

    }


	/*Home page Calendar view  */
	Public function index()
	{
		if(!$this->session->userdata("usuario")) {
			redirect(base_url().'login/index', 'refresh');
		}else{
			//$data['salas'] = $this->sala_model->get_all();
			$this->load->view('default/header');
			$this->load->view('agenda/agenda');
			$this->load->view('default/footer');
		}
	}

	/*Get all Events */

	public function listarEventos()
	{
		$results = $this->agenda_model->getEvents();
		foreach ($results as $event) {
			$result[] = array(
							'id'	=> $event->id,
							'title'	=> 'Sala '.$event->sala.' reservado para '.$event->nome,
							'start' => str_replace(' ','T',$event->data_ini),
							'end' 	=> str_replace(' ','T',$event->data_fim),
							'url'	=>base_url('agenda/visualizar').'/'.$event->id
							); 
		}
		echo json_encode($result);
	}

	public function visualizar(){
		if(!$this->session->userdata("usuario")) {
			redirect(base_url().'login/index', 'refresh');
		}else{
			$id = $this->uri->segment(3);
			$data['reserva'] = $this->agenda_model->get_reserva($id);
			$data['eventos'] = $this->agenda_model->getEvents();

			$this->load->view('default/header');
			$this->load->view('agenda/visualizar',$data);
			$this->load->view('default/footer');
		}

	}

	public function reserva()
	{
		if(!$this->session->userdata("usuario")) {
			redirect(base_url().'login/index', 'refresh');
		}else{
			$data['salas'] = $this->agenda_model->get_salas();

			$this->load->view('default/header');
			$this->load->view('sala/reserva',$data);
			$this->load->view('default/footer');
		}
	}
	public function save(){

	    $this->form_validation->set_rules('sala', 'Sala', 'required');
	    $this->form_validation->set_rules('data_ini', 'Data Inicio', 'required');
	    $this->form_validation->set_rules('hora_ini', 'Hora inicial', 'required');
	    $this->form_validation->set_rules('hora_fim', 'Hora Final', 'required');

	    if ($this->form_validation->run() == FALSE)
	    {
			$this->session->set_flashdata('message_fail','Erro ao salvar, verifique campos vazios!');
			redirect(base_url().'sala/listar', 'refresh');
	    }
	    else{ 
			if(!$this->session->userdata("usuario")) {
				redirect(base_url().'login/index', 'refresh');
			}else{

				$data['usuario']   = $this->session->usuario['id'];
				$data['sala']  	   = $this->input->post('sala');	
				$data['data_ini']  = date('Y-m-d',strtotime($this->input->post('data_ini'))).' '.$this->input->post('hora_ini');	
				$data['data_fim']  = date('Y-m-d',strtotime($this->input->post('data_ini'))).' '.$this->input->post('hora_fim');	

				$verifica = $this->agenda_model->verifica($data['data_ini'], $data['data_fim']);

				if(count($verifica)=='0'){
					$resp = $this->agenda_model->save($data);
					if($resp==TRUE){
						$this->session->set_flashdata('message_ok','Salvo com sucesso');
						redirect(base_url().'agenda', 'refresh');
					}
					else{
						$this->session->set_flashdata('message_fail','Erro ao salvar');
						redirect(base_url().'agenda/reserva', 'refresh');
					}
				}else{
					$this->session->set_flashdata('message_fail','Horário não disponivel');
					redirect(base_url().'agenda/reserva', 'refresh');
				}
			}	
		}

	}

	public function listar(){
		if(!$this->session->userdata("usuario")) {
			redirect(base_url().'login/index', 'refresh');
		}else{
			$data['salas'] = $this->agenda_model->get_salas();
			$data['eventos'] = $this->agenda_model->getEvents();

			$this->load->view('default/header');
			$this->load->view('agenda/listar',$data);
			$this->load->view('default/footer');
		}

	}
	public function editar(){
		if(!$this->session->userdata("usuario")) {
			redirect(base_url().'login/index', 'refresh');
		}else{
			$id = $this->uri->segment(3);
			$data['evento'] = $this->agenda_model->get_evento($id);
			$data['salas'] = $this->agenda_model->get_salas();
			$data['eventos'] = $this->agenda_model->getEvents();
			$this->load->view('default/header');
			$this->load->view('agenda/editar',$data);
			$this->load->view('default/footer');
		}

	}

	public function update(){

	    $this->form_validation->set_rules('sala', 'Sala', 'required');
	    $this->form_validation->set_rules('data_ini', 'Data Inicio', 'required');
	    $this->form_validation->set_rules('hora_ini', 'Hora inicial', 'required');
	    $this->form_validation->set_rules('hora_fim', 'Hora Final', 'required');

	    if ($this->form_validation->run() == FALSE)
	    {
			$this->session->set_flashdata('message_fail','Erro ao salvar, verifique campos vazios!');
			redirect(base_url().'sala/listar', 'refresh');
	    }
	    else{ 
			if(!$this->session->userdata("usuario")) {
				redirect(base_url().'login/index', 'refresh');
			}else{
				$data['id'] 	   = $this->uri->segment(3);
				$data['usuario']   = $this->session->usuario['id'];
				$data['sala']  	   = $this->input->post('sala');	
				$data['data_ini']  = date('Y-m-d',strtotime($this->input->post('data_ini'))).' '.$this->input->post('hora_ini');	
				$data['data_fim']  = date('Y-m-d',strtotime($this->input->post('data_ini'))).' '.$this->input->post('hora_fim');	

				$verifica = $this->agenda_model->verifica($data['data_ini'], $data['data_fim']);

				if(count($verifica)=='0'){
					$resp = $this->agenda_model->update($data);
					if($resp==TRUE){
						$this->session->set_flashdata('message_ok','Atualizado com sucesso');
						redirect(base_url().'agenda/editar/'.$data['id'], 'refresh');
					}
					else{
						$this->session->set_flashdata('message_fail','Erro ao atualizar');
						redirect(base_url().'agenda/editar/'.$data['id'], 'refresh');
					}
				}else{
					$this->session->set_flashdata('message_fail','Horário não disponivel');
					redirect(base_url().'agenda/editar/'.$data['id'], 'refresh');
				}
			}
		}
	}

	public function apagar(){
		$resp = $this->agenda_model->delete($this->uri->segment(3));
		if($resp==TRUE){
			$this->session->set_flashdata('message_ok','Apagado com sucesso');
			redirect(base_url().'agenda/listar', 'refresh');
		}
		else{
			$this->session->set_flashdata('message_fail','Erro ao apagar');
			redirect(base_url().'agenda/listar', 'refresh');
		}
	}


	/*Delete Event*/
	Public function deleteEvent()
	{
		$result=$this->Calendar_model->deleteEvent();
		echo $result;
	}
	Public function dragUpdateEvent()
	{	

		$result=$this->Calendar_model->dragUpdateEvent();
		echo $result;
	}



}
