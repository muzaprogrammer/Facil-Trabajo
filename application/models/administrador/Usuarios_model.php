<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->library('session');
      $this->load->model('vitacora_model');
  }

  var $datos;

  public function contar_usuarios()
  {
    $query = $this->db->query('SELECT COUNT(*) as num FROM usuarios WHERE estado = 1');
    foreach ($query->result_array() as $row) {
      $cantidad = $row['num'];
    }
    echo $cantidad;
  }

  public function agregar_usuario($nombre,$dui,$user,$pass1){
    $query=$this->db->query("SELECT COUNT(*) as num FROM usuarios WHERE usuario = '".$user."'");
    foreach ($query->result_array() as $row)
    {
      $numuser = $row['num'];
    }
    if($numuser==0)
    {
      $data = array(
        'usuario' => $user,
        'password' => $pass1,

  			'nombre' => $nombre,
        'dui' => $dui,
        'estado' => 1,
        'idsucursal' => 1,

      );
      if($this->db->insert('usuarios',$data)){
        echo $this->db->insert_id();
        $accion ="Registró en el sistema el usuario ".$user;
        $this->vitacora_model->vitacora_2($accion);
      }else { echo 0; }
    }
    else
    {
      echo 2;
    }
  }

  public function actualizar_usuario($idu,$nombre,$dui,$user,$pass1){
    $data = array(
      'usuario' => $user,
      'password' => $pass1,

      'nombre' => $nombre,
      'dui' => $dui,
      'estado' => 1,
      'idsucursal' => 1,

    );
    $this->db->where('idusuario',$idu);
    if($this->db->update('usuarios',$data)){
      $accion ="Editó la información del usuario ".$user."";
      $this->vitacora_model->vitacora($accion);
    }else { echo 1; }
  }

  public function eliminar_usuario($id,$user){
    $data = array(
      'estado' => 0
    );
    $this->db->where('idusuario',$id);
    if($this->db->update('usuarios',$data)){
      $accion ="Eliminó el usuario ".$user."";
      $this->vitacora_model->vitacora($accion);
    }else { echo 1; }
  }

  public function actualizar_foto($id,$foto){
    $data = array(
      'foto' => $foto
    );
    $this->db->where('idusuario',$id);
    if($this->db->update('usuarios',$data))
    {
      $query = $this->db->query("SELECT nombre FROM usuarios WHERE idusuario = ".$id);
      foreach($query->result_array() as $row){
        $nom_completo = $row['nombre'];
      }
      $accion = "Actualizó la foto del usuario ".$nom_completo;
      $this->vitacora_model->vitacora_2($accion);
    }
  }
}

?>
