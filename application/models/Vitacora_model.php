<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include 'includes/time_zone.php';
class Vitacora_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
  }

  var $datos;

  public function vitacora($accion){
    if(isset($this->session->userdata['administrador']['id'])){
    $usuario = $this->session->userdata['administrador']['usuario'];
  }else if(isset($this->session->userdata['empresa']['id'])){
      $usuario = $this->session->userdata['empresa']['usuario'];
    }
    $data2 = array(
      'usuario' => $usuario,
      'fecha' => date("Y-m-d"),
      'hora' => date("H:i:s"),
      'accion' => $accion
    );
    if($this->db->insert('vitacora',$data2)){
      echo 0;
    }
    else { echo 1; }
  }

  public function vitacora_2($accion){
    if(isset($this->session->userdata['administrador']['id'])){
    $usuario = $this->session->userdata['administrador']['usuario'];
  }else if(isset($this->session->userdata['empresa']['id'])){
        $usuario = $this->session->userdata['empresa']['usuario'];
      }
    $data2 = array(
      'usuario' => $usuario,
      'fecha' => date("Y-m-d"),
      'hora' => date("H:i:s"),
      'accion' => $accion
    );
    $this->db->insert('vitacora',$data2);
  }
}
?>
