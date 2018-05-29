<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->load->model('M_usuario');
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }
	public function index(){
        if($this->session->userdata('usuario') == null){
            header("location: Login");
        }
        $data['nombre'] = $this->session->userdata('Nombre_user');
		$this->load->view('v_home', $data);
	}
    function guardarServicios(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $html          = '';
            $cont          = 1;
            $tipo_servicio = $this->input->post('tipo_servicio');
            $id_costo   = intval($this->input->post('presupuesto'));
            $pais          = $this->session->userdata('Pais_user');
            $id_pais       = $this->M_usuario->getIdDatosByPais($pais);
            $id_tipo       = $this->M_usuario->getIdDatosByTipo($tipo_servicio);
            //$id_costo      = $this->M_usuario->getIdDatosByCosto($presupuesto);
            if($id_tipo == '' || $id_tipo == null){
                return;
            }
            $datos = $this->M_usuario->getDatosServicio($id_pais, $id_tipo, $id_costo);
            if(count($datos) == 0){
                $html  = '<tr>
                            <td>1</td>
                            <td>-</td>
                          </tr>';
            }else {
                foreach ($datos as $key) {
                    $html .= '<tr>
                                <td>'.$cont.'</td>
                                <td><a href="">'.$key->Nombre.'</a></td>
                              </tr>';
                    $cont++;
                }
            }
            $data['tabla'] = $html;
            $data['error'] = EXIT_SUCCESS;
        }catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}
