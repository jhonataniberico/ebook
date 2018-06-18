<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->view('v_login');
	}
	function ingresar(){
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
         try {
			$id_partner  = $this->input->post('id_partner');
            $email       = $this->input->post('email');
            $pais        = $this->input->post('pais');
			$username = $this->M_usuario->verificarUsuario(intval($id_partner), $email, $pais);
			if(count($username) != 0){
				if($username[0]->partner_id == strval($id_partner)){
					$session = array('usuario' 	   => $id_partner,
							 		 'Id_user' 	   => $username[0]->Id,
							 		 'Nombre_user' => $username[0]->Nombres,
                                     'Apellid_user'=> $username[0]->Apellidos,
							 		 'Pais_user'   => $username[0]->Pais,
							 		 'Email_user'  => $username[0]->Email,
                                     'Name_user'   => $username[0]->Usuario,
							 		 'partner_id'  => $username[0]->partner_id,
                                     'Name_partner'=> $username[0]->partner_name,
                                     'MDF_monto'   => $username[0]->monto,);
					$this->session->set_userdata($session);
		          	$data['error'] = EXIT_SUCCESS;
				}
			}
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}
	function registrar(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
         try {
            $nombre        = $this->input->post('nombre');
            $apellido      = $this->input->post('apellido');
            $email         = $this->input->post('email');
            $usuario       = $this->input->post('usuario');
            $pass 		   = $this->input->post('pass');
            $pais          = $this->input->post('pais');
            $partner_id    = $this->input->post('partner_id');
            $arrayInsert   = array('Nombres'    => $nombre,
            					   'Apellidos'  => $apellido,
                                   'Email'      => $email,
                                   'Usuario'    => $usuario,
                                   'pass'       => $pass,
                                   'Pais'       => $pais,
                                   'partner_id' => $partner_id);
            $datoInsert = $this->M_usuario->insertarDatos($arrayInsert, 'usuarios');
            $session    = array('Nombres'    => $nombre,
            					'Apellidos'  => $apellido,
                                'Email'      => $email,
                                'Usuario'    => $usuario,
                                'Pais'       => $pais,
                                'partner_id' => $partner_id,
                                'Id_user'    => $datoInsert['Id']);
            $this->session->set_userdata($session);
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}
