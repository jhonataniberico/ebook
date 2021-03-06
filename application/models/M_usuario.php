<?php

class M_usuario extends  CI_Model{
    function __construct(){
        parent::__construct();
    }
    function getPaises() {
        $sql = "SELECT * 
                  FROM paises";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function insertarDatos($arrayInsert, $tabla){
      $this->db->insert($tabla, $arrayInsert);
      $sol = $this->db->insert_id();
      if($this->db->affected_rows() != 1){
          throw new Exception('Error al insertar');
          $data['error'] = EXIT_ERROR;
      }
      return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "Id" => $sol);
    }
    function updateDatos($arrayData, $id, $tabla){
      $this->db->where('Id'  , $id);
      $this->db->update($tabla, $arrayData);
      if ($this->db->trans_status() == false){
          throw new Exception('No se pudo actualizar los datos');
      }
      return array('error' => EXIT_SUCCESS,'msj' => MSJ_UPT);
    }
    // function verificarUsuario($id_partner, $email, $pais){
    //   $sql = "SELECT *
    //             FROM usuarios
    //            WHERE partner_id = ".$id_partner."
    //              AND pais = '".$pais."'
    //              ";//AND email LIKE '%".$email."%'
    //   $result = $this->db->query($sql);
    //   return $result->result();
    // }
    function getDatosServicio($pais, $tipo_servicio, $presupuesto){
      $sql = "SELECT s.*
                FROM servicio s,
                     paises p,
                     tipo_servicio t,
                     costo c
               WHERE s.Id_pais = p.Id
                 AND s.Id_costo = c.Id
                 AND s.id_tipo_servi = t.Id
                 AND s.Id_pais = ?
                 AND s.Id_costo = ?
                 AND s.id_tipo_servi = ?";
      $result = $this->db->query($sql, array($pais, $presupuesto, $tipo_servicio));
      return $result->result();
    }
    function getIdDatosByPais($pais){
      $sql = "SELECT Id FROM paises WHERE Nombre LIKE '%".$pais."%'";
      $result = $this->db->query($sql);
      return $result->row()->Id;
    }
    function getIdDatosByTipo($tipo){
      $sql = "SELECT t.Id FROM tipo_servicio t WHERE t.Tipo LIKE '%".$tipo."%'";
      $result = $this->db->query($sql);
      return $result->row()->Id;
    }
    function getIdDatosByCosto($costo){
        $sql = "SELECT c.Id FROM costo c WHERE c.precio LIKE '%".$costo."%'";
        $result = $this->db->query($sql);
        return $result->row()->Id;
    }
    function getPaisesPartner() {
        $sql = "SELECT *, nombre as partner FROM partners ";
        // -- $sql = "SELECT *, nombre as partner FROM partners GROUP BY pais";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getPaisesByPartner($pais) {
        $sql = "SELECT * FROM partners WHERE pais LIKE '".$pais."'";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function verificarUsuarioPartner($pais, $patner_id){
        $sql = "SELECT * FROM partners WHERE pais LIKE '".$pais."' AND id_partner LIKE '".$patner_id."'";
        $result = $this->db->query($sql);
        return $result->result();
    }


     function getPaisesAgregados() {
        $sql = "SELECT P.pais FROM partners P GROUP BY P.pais";
        // -- $sql = "SELECT *, nombre as partner FROM partners GROUP BY pais";
        $result = $this->db->query($sql);
        return $result->result();
    }
}