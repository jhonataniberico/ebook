<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_partners');
		$this->load->model('M_usuario');
	}
	public function index()	{
		if(isset($_SESSION['logged_in'])){
			redirect('panel/partner','refresh');
		}
		$this->load->view('panel/v_login');
	}

	public function login(){
		$user = strtoupper($this->input->get_post('user'));
		$password = strtoupper($this->input->get_post('password'));
		if ($user=='ADMIN' && $password=='ADMIN') {
			$newdata = array(
				'username'  => $user,
				'email'     => 'demo@mail.com',
				'logged_in' => TRUE
			);
			$this->session->set_userdata($newdata);
			$data['msj']="ingreso correctament";
			$data['error'] = EXIT_SUCCESS;
		}else{
			$data['msj']="El Usuario o Password ingresado es incorrecto";
			$data['error'] = EXIT_ERROR;
		}
		echo json_encode($data);
	}

	public function Partner(){
		// echo "hola Partner";
		if(!isset($_SESSION['logged_in'])){
			redirect('panel','refresh');
		}
		$htmlPaises = '';
		$paises = $this->M_usuario->getPaisesAgregados();
		$htmlPaises .= '<option value="" default>Elige Pais</option>';
		foreach ($paises as $val) {
			if ($val->pais != 'Brazil') {
				$htmlPaises .= '<option value="'.$val->pais.'">'.$val->pais.'</option>';
			}
		}
		$data['paises'] = $htmlPaises;
		$this->load->view('panel/v_partners',$data);
	}

	public function tablaPartner(){
		$data['data'] = $this->M_partners->getTablePartners();
		echo json_encode($data);
	}

	public function newPartner(){
		$this->load->database();		
		$this->load->library('form_validation');
		// if($_POST['idPartner'] > 2147483647){
		// 	$_POST['idPartner']=2147483647;
		// }
		$this->form_validation->set_rules('idPartner', 'ID Partner', 'required|numeric|less_than[2147483647]|max_length[10]|is_unique[partners.id_partner]',
			array (
				'less_than'=> 'El campo {field} debe contener un número menor que 2147483647.',
				'max_length'=> '%s: El máximo de caracteres es 10',				
				'is_unique'  =>  'Este {field} ya se encuentra registrado'));
		if ($this->form_validation->run() == FALSE){
			$data['error'] = EXIT_ERROR;
			$data['msj'] = validation_errors('' ,  '' );
		}else{
			$arrayInsert['id_partner'] = $this->input->get_post('idPartner');
			$arrayInsert['nombre'] = $this->input->get_post('name');
			$arrayInsert['pais'] = $this->input->get_post('pais');
			$data= $this->M_partners->InsertNewPartner($arrayInsert, 'partners');
		}
		echo json_encode($data);
	}

	public function verificarPartner(){
		$id = strtoupper($this->input->get_post('id'));		
		$result= $this->M_partners->verificarPartner($id);
		if($result>0){
			$data['error'] = EXIT_ERROR;
			$data['msj']="Este ID Partner ya se encuentra registrado";
		}else{
			$data['error'] = EXIT_SUCCESS;
			$data['msj']="continuar";
		}
		echo json_encode($data);
	}


	public function logout(){
		session_destroy();
		redirect('panel','refresh');
	}
}

/* End of file Panel.php */
/* Location: ./application/controllers/Panel.php */