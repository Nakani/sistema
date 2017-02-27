<?php

class Dashboard_model extends CI_Model {

	public function confirmar($data){
        $this->db->where("email", $data['email']);
        $this->db->where("senha", $data['senha']);
        $result = $this->db->get("usuarios")->row_array();
        return $result;
	}
}