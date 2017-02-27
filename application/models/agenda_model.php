<?php

class agenda_model extends CI_Model {

	public function getEvents(){
		$this->db->select('
						r.id,
						r.data_ini,
						r.data_fim,
						s.nome as sala,
						u.nome,
						');
		$this->db->from('reserva as r');
		$this->db->join('salas as s', 's.id = r.sala');
		$this->db->join('usuarios as u', 'u.id = r.usuario');
		return $this->db->get()->result();
	}

public function verifica($data_ini, $data_fim){
	$this->db->from('reserva');
	$this->db->where("(data_ini BETWEEN '" .$data_ini. "' AND '" .$data_fim. "') 
OR (data_fim BETWEEN '" .$data_ini. "' AND '" .$data_fim. "')");

	return $this->db->get()->result();
}

/*	public function verifica($data){
	$sql = "SELECT * FROM reserva WHERE reserva.data_ini BETWEEN ? AND ? ";
	return $this->db->query($sql, array($data['data_ini'], $data['data_fim']))->result();
	}*/


	public function save($data) {
		if(count($data) > 0) {
			$this->db->insert('reserva',$data);
			$this->id = $this->db->insert_id();
		}
		return $this->id;
	}

	public function get_salas(){
		$this->db->from('salas');
		return $this->db->get()->result();
	}

	public function get_reserva($id){
		$this->db->select('
						r.id,
						r.data_ini,
						r.data_fim,
						s.nome as sala,
						u.nome,
						');
		$this->db->from('reserva as r');
		$this->db->join('salas as s', 's.id = r.sala');
		$this->db->join('usuarios as u', 'u.id = r.usuario');
		$this->db->where('r.id',$id);
		return $this->db->get()->row();
	}

	public function update($data){
		$this->db->where('id',$data['id']);
		$resp = $this->db->update('salas',$data);
		return $resp;
	}
	public function delete($id){
		$this->db->where('id',$id);
		$resp = $this->db->delete('salas');
		return $resp;
	}
}