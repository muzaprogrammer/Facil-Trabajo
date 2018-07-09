<?php
include "includes/time_zone.php";

defined('BASEPATH') OR exit('No direct script access allowed');

class Publicaciones_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->model('vitacora_model');
  }

  public function eliminar_publicacion($id)
  {
    $data = array(
      'estado' => 0
    );
    $this->db->where('idofertasEmpleo',$id);
    if($this->db->update('ofertasEmpleo',$data))
    {
      $accion = "Eliminar publicacion";
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function editar_publicacion($id,$cargoOferta,$idCategoriaEmpleo,$fechaContratacion,$vacantes,$salario,$descripcion,$idDepartamento)
  {
    $data = array(
      'cargoOferta' => $cargoOferta,
      'idCategoriaEmpleo' => $idCategoriaEmpleo,
      'fechaContratacion' => $fechaContratacion,
      'vacantes' => $vacantes,
      'salario' => $salario,
      'descripcion' => $descripcion,
      'idDepartamento' => $idDepartamento,
    );
    $this->db->where('idofertasEmpleo',$id);
    if($this->db->update('ofertasEmpleo',$data))
    {
      $accion = "Edito una publicacion";
      $this->vitacora_model->vitacora($accion);
    }
  }

  public function guardar_publicacion($ide,$cargoOferta,$idCategoriaEmpleo,$fechaContratacion,$vacantes,$salario,$descripcion,$idDepartamento){
    $data = array(
      'idEmpresa' => $ide,
      'cargoOferta' => $cargoOferta,
      'idCategoriaEmpleo' => $idCategoriaEmpleo,
      'fechaPublicacion' => date('Y-m-d'),
      'fechaContratacion' => $fechaContratacion,
      'vacantes' => $vacantes,
      'salario' => $salario,
      'descripcion' => $descripcion,
      'idDepartamento' => $idDepartamento,
      'estado' => 1,
    );
    if($this->db->insert("ofertasEmpleo",$data)){
      $accion = "Se publico una oferta de empleo";
      $this->vitacora_model->vitacora_2($accion);
    }else
    {
      echo 0;
    }
  }

  public function registrar_empresa($idDepartamento,$nombreEmpresa,$telefono,$descripcion,$correo,$contra,$direccion){
    $data = array(
      'idDepartamento' => $idDepartamento,
      'nombreEmpresa' => $nombreEmpresa,
      'telefono' => $telefono,
      'descripcion' => $descripcion,
      'correo' => $correo,
      'contra' => $contra,
      'direccion' => $direccion
    );
    if($this->db->insert("empresas",$data)){
      echo 0;
    }else
    {
      echo 0;
    }
  }

  public function editar_empresa($idDepartamento,$nombreEmpresa,$telefono,$descripcion,$correo,$contra,$direccion,$idEmpresa){
    $data = array(
      'idDepartamento' => $idDepartamento,
      'nombreEmpresa' => $nombreEmpresa,
      'telefono' => $telefono,
      'descripcion' => $descripcion,
      'correo' => $correo,
      'contra' => $contra,
      'direccion' => $direccion
    );
    $this->db->where('idEmpresa',$idEmpresa);
    if($this->db->update('empresas',$data))
    {
      $accion = "Edito sus datos";
      $this->vitacora_model->vitacora($accion);
    }
  }

}
?>
