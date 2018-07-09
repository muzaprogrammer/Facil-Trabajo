<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
  }

  public function SignIn($correo_electronico,$password){
    $posts = array();
    $query = $this->db->query("SELECT idUsuario,nombres,apellidos,correo, COUNT(*) AS total FROM usuarios WHERE correo = '".$correo_electronico."' AND contra = '".md5($password)."' AND estado = 1");
    foreach($query->result_array() as $row){
      $posts = array("usuario" => $row);
    }
    header('Content-type: application/json');
		return json_encode($posts);
  }

  public function SignUp($nombres,$apellidos,$correo_electronico,$password){
    $query = $this->db->query("SELECT COUNT(*) AS total FROM usuarios WHERE correo = '".$correo_electronico."'");
    foreach($query->result_array() as $row){
      $totalCuentas = $row["total"];
    }
    if($totalCuentas > 0){
      $posts = array("mensaje" => array("resultado" => false));
      header('Content-type: application/json');
      return json_encode($posts);
    }else{
      $datos = array("nombres" => $nombres, "apellidos" => $apellidos, "correo" => $correo_electronico, "contra" => md5($password), "estado" => 1);
      if($this->db->insert("usuarios",$datos)){
        $idUsuario = $this->db->insert_id();
        $datos = array("idUsuario" => $idUsuario);
        $this->db->insert("datos_personales",$datos);
        $posts = array("mensaje" => array("resultado" => true));
        header('Content-type: application/json');
        return json_encode($posts);
      }
    }
  }

  public function BuscarOfertas($cargo,$lugar,$idUsuario){

    $query = $this->db->query("SELECT ofertasEmpleo.idofertasEmpleo, empresas.nombreEmpresa,ofertasEmpleo.cargoOferta,departamentos.nombre AS departamento, ofertasEmpleo.fechaPublicacion, postulacionesUsuarios.idOfertaEmpleo  FROM ofertasEmpleo
    INNER JOIN departamentos ON departamentos.idDepartamento = ofertasEmpleo.idDepartamento
    INNER JOIN empresas ON empresas.idEmpresa = ofertasEmpleo.idEmpresa
    LEFT JOIN postulacionesUsuarios ON postulacionesUsuarios.idOfertaEmpleo = ofertasEmpleo.idofertasEmpleo
    WHERE departamentos.nombre = '".$lugar."' AND ofertasEmpleo.cargoOferta LIKE '%$cargo%'");

    $posts = array();
    foreach($query->result_array() as $row){
      $posts[] = $row;
    }

    header('Content-type: application/json');
		return json_encode($posts);
  }

  public function DetallesOferta($idOferta,$idUsuario){
    $query = $this->db->query("SELECT ofertasEmpleo.cargoOferta,departamentos.nombre AS departamento,empresas.nombreEmpresa, DATE_FORMAT(ofertasEmpleo.fechaPublicacion, '%d/%m/%Y') AS fechaPublicacion,
      DATE_FORMAT(ofertasEmpleo.fechaContratacion, '%d/%m/%Y') AS fechaContratacion,ofertasEmpleo.vacantes,ofertasEmpleo.salario,
      ofertasEmpleo.descripcion,postulacionesUsuarios.idUsuario AS idPostulante
      FROM postulacionesUsuarios
      RIGHT JOIN ofertasEmpleo ON ofertasEmpleo.idOfertasEmpleo = postulacionesUsuarios.idOfertaEmpleo
      INNER JOIN empresas ON empresas.idEmpresa = ofertasEmpleo.idEmpresa
      INNER JOIN departamentos ON departamentos.idDepartamento = ofertasEmpleo.idDepartamento
      WHERE ofertasEmpleo.idOfertasEmpleo = ".$idOferta);

      foreach($query->result_array() as $row){
        $posts = array("oferta" => $row);
      }
      header('Content-type: application/json');
  		return json_encode($posts);
  }

  Public function Postulacion($idOferta,$idUsuario){
    $datos = array("idUsuario" => $idUsuario, "idOfertaEmpleo" => $idOferta, "fechaPostulacion" => date("Y-m-d"));
    if($this->db->insert("postulacionesUsuarios",$datos)){
      $posts = array("mensaje" => array("respuesta" => 0));
    }else{
      $posts = array("mensaje" => array("respuesta" => 1));
    }
    header('Content-type: application/json');
    return json_encode($posts);
  }

  public function BuscarPostulaciones($idUsuario){
    $query = $this->db->query("SELECT ofertasEmpleo.idofertasEmpleo, empresas.nombreEmpresa,ofertasEmpleo.cargoOferta,departamentos.nombre AS departamento, ofertasEmpleo.fechaPublicacion,
      postulacionesUsuarios.idOfertaEmpleo, DATE_FORMAT(postulacionesUsuarios.fechaPostulacion, '%d/%m/%Y') AS fechaPostulacion
      FROM postulacionesUsuarios
      INNER JOIN ofertasEmpleo ON ofertasEmpleo.idOfertasEmpleo = postulacionesUsuarios.idOfertaEmpleo
      INNER JOIN empresas ON ofertasEmpleo.idEmpresa = empresas.idEmpresa
      INNER JOIN departamentos ON empresas.idDepartamento = departamentos.idDepartamento
      WHERE postulacionesUsuarios.idUsuario  = ".$idUsuario);
    $posts = array();
    foreach($query->result_array() as $row){
      $posts[] = $row;
    }
    header('Content-type: application/json');
    return json_encode($posts);
  }
}
