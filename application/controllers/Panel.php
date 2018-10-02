<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index()	{
		$this->load->view('panel/v_login', $data, FALSE);
	}
	public function tablaPartner(){

	}

	public function newPartner(){
		
	}

	public function verificarPartner(){
		
	}
}

/* End of file Panel.php */
/* Location: ./application/controllers/Panel.php */