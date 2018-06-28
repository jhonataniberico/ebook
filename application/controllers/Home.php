<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();require_once APPPATH.'third_party/PHPExcel.php';
        $this->excel = new PHPExcel(); 
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
		$this->load->view('v_home', $data);
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
    
// NO BORRAR

    // function exportarExcel () {
    //     $nombre       = $this->session->userdata('Nombre_user');
    //     $pais         = $this->session->userdata('Pais_user');
    //     $apellido     = $this->session->userdata('Apellid_user');
    //     $email        = $this->session->userdata('Email_user');
    //     $partner      = $this->session->userdata('partner_id');
    //     $name_user    = $this->session->userdata('Name_user');
    //     $name_partner = $this->session->userdata('Name_partner');
    //     $mdf          = $this->session->userdata('MDF_monto');


    //     $objPHPExcel->getProperties()->setCreator($nombre) // Nombre del autor
    //                 ->setLastModifiedBy("ebook") //Ultimo usuario que lo modificó
    //                 ->setTitle("Reporte Excel con PHP y MySQL") // Titulo
    //                 ->setSubject("Reporte Excel con PHP y MySQL") //Asunto
    //                 ->setDescription("Reporte de alumnos") //Descripción
    //                 ->setKeywords("reporte alumnos carreras") //Etiquetas
    //                 ->setCategory("Reporte excel"); //Categorias

    //     $tituloReporte = "Reporte MDFS Acumulados";
    //     $titulosColumnas = array('Partner ID', 'Partner Name', 'País', 'Nombre', 'Email', 'MDFS Acumunlados');

    //     // Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
    //     $objPHPExcel->setActiveSheetIndex(0)
    //         ->mergeCells('A1:F1');
         
    //     // Se agregan los titulos del reporte
    //     $objPHPExcel->setActiveSheetIndex(0)
    //         ->setCellValue('A1',$tituloReporte) // Titulo del reporte
    //         ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
    //         ->setCellValue('B3',  $titulosColumnas[1])
    //         ->setCellValue('C3',  $titulosColumnas[2])
    //         ->setCellValue('D3',  $titulosColumnas[3])
    //         ->setCellValue('E3',  $titulosColumnas[4])
    //         ->setCellValue('F3',  $titulosColumnas[5]);
    //     //Se agregan los datos de los alumnos
         
    //      $i = 4; //Numero de fila donde se va a comenzar a rellenar
    //      while ($fila = $resultado->fetch_array()) {
    //          $objPHPExcel->setActiveSheetIndex(0)
    //              ->setCellValue('A'.$i, $fila['alumno'])
    //              ->setCellValue('B'.$i, $fila['fechanac'])
    //              ->setCellValue('C'.$i, $fila['sexo'])
    //              ->setCellValue('D'.$i, $fila['carrera']);
    //          $i++;
    //      }

    //     $estiloTituloReporte = array(
    //         'font' => array(
    //             'name'      => 'Verdana',
    //             'bold'      => true,
    //             'italic'    => false,
    //             'strike'    => false,
    //             'size' =>16,
    //             'color'     => array(
    //                 'rgb' => 'FFFFFF'
    //             )
    //         ),
    //         'fill' => array(
    //             'type'  => PHPExcel_Style_Fill::FILL_SOLID,
    //             'color' => array(
    //                 'argb' => 'FF220835')
    //         ),
    //         'borders' => array(
    //             'allborders' => array(
    //                 'style' => PHPExcel_Style_Border::BORDER_NONE
    //             )
    //         ),
    //         'alignment' => array(
    //             'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    //             'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    //             'rotation' => 0,
    //             'wrap' => TRUE
    //         )
    //     );
         
    //     $estiloTituloColumnas = array(
    //         'font' => array(
    //             'name'  => 'Arial',
    //             'bold'  => true,
    //             'color' => array(
    //                 'rgb' => 'FFFFFF'
    //             )
    //         ),
    //         'fill' => array(
    //             'type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
    //       'rotation'   => 90,
    //             'startcolor' => array(
    //                 'rgb' => 'c47cf2'
    //             ),
    //             'endcolor' => array(
    //                 'argb' => 'FF431a5d'
    //             )
    //         ),
    //         'borders' => array(
    //             'top' => array(
    //                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
    //                 'color' => array(
    //                     'rgb' => '143860'
    //                 )
    //             ),
    //             'bottom' => array(
    //                 'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
    //                 'color' => array(
    //                     'rgb' => '143860'
    //                 )
    //             )
    //         ),
    //         'alignment' =>  array(
    //             'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    //             'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    //             'wrap'      => TRUE
    //         )
    //     );
         
    //     $estiloInformacion = new PHPExcel_Style();
    //     $estiloInformacion->applyFromArray( array(
    //         'font' => array(
    //             'name'  => 'Arial',
    //             'color' => array(
    //                 'rgb' => '000000'
    //             )
    //         ),
    //         'fill' => array(
    //       'type'  => PHPExcel_Style_Fill::FILL_SOLID,
    //       'color' => array(
    //                 'argb' => 'FFd9b7f4')
    //       ),
    //         'borders' => array(
    //             'left' => array(
    //                 'style' => PHPExcel_Style_Border::BORDER_THIN ,
    //           'color' => array(
    //                   'rgb' => '3a2a47'
    //                 )
    //             )
    //         )
    //     ));

    //     $idPersona = $this->session->userdata('partner_id');
    //     $datos     = $this->M_usuario->
    // }
}
