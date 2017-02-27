<?php

class usuario_model extends CI_Model {

	public function get_all(){
		$this->db->from('usuarios');
		return $this->db->get()->result();
	}

	public function save($data) {
		if(count($data) > 0) {
			$this->db->insert('usuarios',$data);
			$this->id = $this->db->insert_id();
		}
		return $this->id;
	}

	public function get_usuario($id){
		$this->db->from('usuarios');
		$this->db->where('id',$id);
		return $this->db->get()->row();
	}
	public function update($data){
		$this->db->where('id',$data['id']);
		$resp = $this->db->update('usuarios',$data);
		return $resp;
	}
	public function delete($id){
		$this->db->where('id',$id);
		$resp = $this->db->delete('usuarios');
		return $resp;
	}
}