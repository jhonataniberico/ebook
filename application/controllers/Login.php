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
        /*$combo     = $this->M_usuario->getPaises();
        $htmlCombo = '';*/
        $htmlPaises = '';
        $paises = $this->M_usuario->getPaisesPartner();
        foreach ($paises as $val) {
           $htmlPaises .= '<option value="'.$val->pais.'">'.$val->pais.'</option>';
        }
        /*foreach($combo as $key) {
            $htmlCombo .= '<option value="'.$key->Nombre.'">'.$key->Nombre.'</option>';
        }
        $data['combo'] = $htmlCombo;*/
        $data['paises'] = $htmlPaises;
		$this->load->view('v_login', $data);
	}
	function ingresar(){
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
         try {
			$id_partner  = $this->input->post('id_partner');
            $email       = $this->input->post('email');
            $pais        = $this->input->post('pais');
            /*$verificaMail= $this->M_usuario->verificaMail($email);
            $verificaId  = $this->M_usuario->verificaId($email, $id_partner);
            $verificaPais= $this->M_usuario->verificaPais($email, $id_partner, $pais);*/
			//$username    = $this->M_usuario->verificarUsuario(intval($id_partner), $email, $pais);
            $username      = $this->M_usuario->verificarUsuarioPartner($pais, intval($id_partner));
            if(count($username) != 0){
                if($username[0]->id_partner == strval($id_partner) && $username[0]->pais == $pais){
                    $session = array('usuario'     => $id_partner,
                                     'Id_user'     => $username[0]->Id,
                                     /*'Nombre_user' => $username[0]->nombres,
                                     'Apellid_user'=> $username[0]->Apellidos,*/
                                     'Pais_user'   => $username[0]->pais,
                                     'Email_user'  => $email,
                                     /*'Name_user'   => $username[0]->Usuario,*/
                                     'partner_id'  => $id_partner,
                                     'Name_partner'=> $username[0]->nombre,
                                     /*'MDF_monto'   => $username[0]->monto,*/);
                    $this->session->set_userdata($session);
                    $data['error'] = EXIT_SUCCESS;
                }
			}/*else{
                if(count($verificaMail) == 0){
                    $data['msj'] = 'Email no registrado';
                } else if(count($verificaId) == 0) {
                    $data['msj'] = 'El Usuario/Partner ID es incorrecto';
                }else if (count($verificaPais) == 0) {
                    $data['msj'] = 'Pais incorrecto';
                } else {
                    $data['msj'] = 'Datos incorrectos';    
                } 
            }*/
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
    function getIdsPartner(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
         try {
            $pais = $this->input->post('pais');
            $htmlPaises = '';
            $paises = $this->M_usuario->getPaisesByPartner($pais);
            $htmlPaises .= '<select class="selectpicker" id="usuario" name="usuario" title="Partner ID">';
            foreach ($paises as $val) {
               $htmlPaises .= '<option value="'.$val->id_partner.'">'.$val->id_partner.' - '.$val->nombre.'</option>';
            }
            $htmlPaises .= '</select>';
            /*foreach($combo as $key) {
                $htmlCombo .= '<option value="'.$key->Nombre.'">'.$key->Nombre.'</option>';
            }
            $data['combo'] = $htmlCombo;*/
            $data['paises'] = $htmlPaises;
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}
