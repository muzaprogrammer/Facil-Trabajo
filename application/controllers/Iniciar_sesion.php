<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iniciar_sesion extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->library('session');
    $this->load->model('iniciar_sesion_model');
	}
	public function index()
	{
    if ($this->session->userdata('administrador')) {
			redirect('administrador/index');
		}else if ($this->session->userdata('empresa')) {
			redirect('empresa/index');
		}else{
		$this->load->view('iniciar_sesion');
		}
		if(isset($_POST['contra'] ) AND isset($_POST['usuario'])){
			extract($_POST);
			if($this->iniciar_sesion_model->validar_usuario($usuario,$contra) == "Administrador"){
				redirect('administrador/index');
			}
			else if($this->iniciar_sesion_model->validar_usuario($usuario,$contra) == "Empresa"){
				redirect('empresa/index');
			}
			else{
				redirect('iniciar_sesion?error=error al iniciar sesion');
			}
		}
	}

  public function cerrar_sesion()
 	{
   	if($this->session->userdata('administrador')){
      $this->session->unset_userdata('administrador');
      session_destroy();
    }
		else if($this->session->userdata('empresa')){
      $this->session->unset_userdata('empresa');
      session_destroy();
    }
   	redirect('Iniciar_sesion');
 	}
}
?>
