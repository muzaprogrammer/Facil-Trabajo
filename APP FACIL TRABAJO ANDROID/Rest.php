<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rest extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('rest_model','rest');
	}

  public function Index(){
    extract($_GET);
    $data['datos'] = $this->rest->SignIn($correo_electronico,$password);
		$this->load->view('REST/signin',$data);
  }

  public function SignUp(){
    extract($_GET);
    $data['datos'] = $this->rest->SignUp($nombres,$apellidos,$correo_electronico,$password);
    $this->load->view('REST/signin',$data);
  }

  public function BuscarOfertas(){
    extract($_GET);
    $data['datos'] = $this->rest->BuscarOfertas($cargo,$lugar,$idUsuario);
    $this->load->view('REST/signin',$data);
  }

  public function ValidaPostulacion(){
    extract($_REQUEST);
    $data['datos'] = $this->rest->ValidaPostulacion($idOferta,$idUsuario);
    $this->load->view('REST/signin',$data);
  }

  public function DetallesOferta(){
    extract($_REQUEST);
    $data['datos'] = $this->rest->DetallesOferta($idOferta,$idUsuario);
    $this->load->view('REST/signin',$data);
  }

  public function Postulacion(){
    extract($_REQUEST);
    $data['datos'] = $this->rest->Postulacion($idOferta,$idUsuario);
    $this->load->view('REST/signin',$data);
  }

  public function BuscarPostulaciones(){
    extract($_REQUEST);
    $data['datos'] = $this->rest->BuscarPostulaciones($idUsuario);
    $this->load->view('REST/signin',$data);
  }
}
