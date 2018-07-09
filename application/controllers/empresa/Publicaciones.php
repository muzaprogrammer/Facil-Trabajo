<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicaciones extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->helper("empresa/cargar_publicaciones");
    $this->load->helper("empresa/modals/agregar_publicacion");
    $this->load->helper("empresa/modals/editar_publicacion");
    $this->load->helper("empresa/modals/nueva_empresa");
    $this->load->helper("empresa/modals/editar_empresa");
    $this->load->model("empresa/publicaciones_model");
  }

  public function index()
  {
    if ($this->session->userdata('empresa')) {
      $this->load->view('empresa/publicaciones');
    }
    else{
      redirect('iniciar_sesion?error=Tu sesión ha expirado.');
    }
  }

  public function cargar_publicaciones()
  {
    return cargar_publicaciones();
  }

  public function agregar_publicacion()
  {
    return agregar_publicacion();
  }

  public function nueva_empresa()
  {
    return nueva_empresa();
  }

  public function editar_empresa()
  {
    return editar_empresa();
  }

  public function editar(){
		extract($_POST);
		return $this->publicaciones_model->editar_publicacion($id,$cargoOferta,$idCategoriaEmpleo,$fechaContratacion,$vacantes,$salario,$descripcion,$idDepartamento);
	}

  public function editar_publicacion()
  {
    extract($_POST);
    return editar_publicacion($id);
  }

  public function eliminar_publicacion(){
		extract($_POST);
		return $this->publicaciones_model->eliminar_publicacion($id);
	}

  public function guardar_publicacion(){
		extract($_POST);
		return $this->publicaciones_model->guardar_publicacion($ide,$cargoOferta,$idCategoriaEmpleo,$fechaContratacion,$vacantes,$salario,$descripcion,$idDepartamento);
	}

  public function registrar_empresa(){
		extract($_POST);
		return $this->publicaciones_model->registrar_empresa($idDepartamento,$nombreEmpresa,$telefono,$descripcion,$correo,$contra,$direccion);
	}

  public function editar_empresa_datos(){
		extract($_POST);
		return $this->publicaciones_model->editar_empresa($idDepartamento,$nombreEmpresa,$telefono,$descripcion,$correo,$contra,$direccion,$idEmpresa);
	}
}
