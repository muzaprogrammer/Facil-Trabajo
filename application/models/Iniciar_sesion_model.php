<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iniciar_sesion_model extends CI_model {
  public function __construct()
  {
      parent:: __construct();
      $this->load->database();
      $this->load->model('vitacora_model');
  }

  var $datos;

  public function validar_usuario($usuario,$password){
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where('usuarios.correo',$usuario);
    $this->db->where('usuarios.contra',$password);
    $this->db->where('usuarios.estado',1);
    $query = $this->db->get()->result();
    if ( is_array($query) && count($query) == 1 ) {
        // Set the users details into the $details property of this class
        $this->datos = $query[0];
        // Call set_session to set the user's session vars via CodeIgniter

        $this->set_session_administrador();
        return "Administrador";
    }
    else{
      $this->db->select('*');
      $this->db->from('empresas');
      $this->db->where('correo',$usuario);
      $this->db->where('contra',$password);
      //$this->db->where('empresas.estado',1);
      $query = $this->db->get()->result();
      if ( is_array($query) && count($query) == 1 ) {
          // Set the users details into the $details property of this class
          $this->datos = $query[0];
          // Call set_session to set the user's session vars via CodeIgniter
          $this->set_session_empresa();
          return "Empresa";
      }else{
        return false;
      }
    }
  }

  private function set_session_administrador() {
    $this->session->set_userdata('administrador',array(
            'id'=> $this->datos->idusuario,
            'usuario'=> $this->datos->nombres.' '.$this->datos->apellidos,
            'menu'=> "Administrador_menu.php",
            'rol' => "Administrador",
            'foto' => "usuarios/user.png",
            'institucion' => "Facil Trabajo",
          )
    );
    $accion = "Inició sesión.";
    $this->vitacora_model->vitacora_2($accion);
  }

  private function set_session_empresa() {
    $this->session->set_userdata('empresa',array(
            'id'=> $this->datos->idEmpresa,
            'nombres'=> $this->datos->nombreEmpresa,
            'usuario'=> $this->datos->nombreEmpresa,
            'menu'=> "Empresa_menu.php",
            'rol' => "Empresa",
            'institucion' => "Facil Trabajo",
          )
    );
    $accion = "Inició sesión.";
    $this->vitacora_model->vitacora_2($accion);
  }
}
?>
