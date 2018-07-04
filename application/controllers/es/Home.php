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
        $data['nombre']       = $this->session->userdata('Nombre_user');
        $data['pais']         = $this->session->userdata('Pais_user');
        $data['apellido']     = $this->session->userdata('Apellid_user');
        $data['email']        = $this->session->userdata('Email_user');
        $data['partner']      = $this->session->userdata('partner_id');
        $data['name_user']    = $this->session->userdata('Name_user');
        $data['name_partner'] = $this->session->userdata('Name_partner');
        $data['mdf']          = $this->session->userdata('MDF_monto');
		$this->load->view('es/v_home', $data);
	}
    function guardarServicios(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $html          = '';
            $tipo_servicio = $this->input->post('tipo_servicio');
            $presupuesto   = $this->input->post('presupuesto');
            // $id_costo      = intval($this->input->post('presupuesto'));
            $pais          = $this->session->userdata('Pais_user');
            $id_pais       = $this->M_usuario->getIdDatosByPais($pais);
            $id_tipo       = $this->M_usuario->getIdDatosByTipo($tipo_servicio);
            $id_costo      = $this->M_usuario->getIdDatosByCosto($presupuesto);
            if($id_tipo == '' || $id_tipo == null){
                return;
            }
            $datos = $this->M_usuario->getDatosServicio($id_pais, $id_tipo, $id_costo);
            if(count($datos) == 0){
                $html  = '<tr>
                            <td>No se encontraron paquetes disponibles.</td>
                            <td></td>
                          </tr>';
            }else {
                foreach ($datos as $key) {
                    if($key->link == '' || $key->link == null) {
                        $html .= '<tr>
                                    <td><p>'.$key->Nombre.'</p></td>
                                    <td> </td>
                                  </tr>';
                    } else {
                        $html .= '<tr>
                                    <td><a href="'.$key->link.'" target="_blank">'.$key->Nombre.'</a></td>
                                    <td><a href="'.$key->link.'" target="_blank" class="mdl-button mdl-js-button mdl-button--icon">
                                            <i class="fa fa-arrow-right"></i>
                                        </a></td>
                                  </tr>';
                    }
                }
            }
            $data['tabla'] = $html;
            $data['error'] = EXIT_SUCCESS;
        }catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function cerrarCesion(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $this->session->unset_userdata('usuario');
            $this->session->unset_userdata('Id_user');
            $data['error'] = EXIT_SUCCESS;
        } catch (Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}
