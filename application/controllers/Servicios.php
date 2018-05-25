<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }
	public function index(){
        if($this->session->userdata('usuario') == null){
            header("location: Login");
        }
		$this->load->view('v_servicios');
	}
    function guardarServicios(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $tipo_servicio = $this->input->post('tipo_servicio');
            $presupuesto   = $this->input->post('presupuesto');
            $fondos        = $this->input->post('fondos');
            $arrayInsert   = array('tipo_servicio' => $tipo_servicio,
                                   'presupuesto'   => $presupuesto,
                                   'fondos'        => $fondos);
            $datoInsert = $this->M_usuario->insertarDatos($arrayInsert, 'servicios');
            $session    = array('tipo_servicio' => $tipo_servicio,
                                'presupuesto'   => $presupuesto,
                                'fondos'        => $fondos,
                                'Id_servicio'   => $datoInsert['Id']);
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
        }catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}
