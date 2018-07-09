<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'includes/time_zone.php';
class Vitacora extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->helper('administrador/vitacora');
	}
  public function index()
	{
    if ($this->session->userdata('administrador')) {
			$this->load->view('administrador/vitacora');
    }
    else{
      redirect('iniciar_sesion');
    }
  }

	public function cargar_vitacora(){
		extract($_POST);
		return cargar_vitacora($fecha);
	}
}
?>
