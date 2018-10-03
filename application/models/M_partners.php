<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_partners extends CI_Model {

	function getTablePartners()	{
		$sql = "SELECT * FROM partners";
		$result = $this->db->query($sql);
		return $result->result();
	}
	function verificarPartner($id){
		$sql = "SELECT * FROM partners P WHERE P.id_partner='$id'";
		$result = $this->db->query($sql);
		$this->db->close();
		return $result->num_rows();
	}

	function InsertNewPartner($arrayInsert, $tabla){
		$this->db->insert($tabla, $arrayInsert);
		$sol = $this->db->insert_id();
		if($this->db->affected_rows() != 1){
			throw new Exception('Error al insertar');
			$data['error'] = EXIT_ERROR;
		}
		return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "Id" => $sol);
	}
}

/* End of file M_partners.php */
/* Location: ./application/models/M_partners.php */