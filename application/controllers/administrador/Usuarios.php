<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->helper('url');
    $this->load->helper('administrador/cargar_usuarios');
    $this->load->helper('administrador/modals/agregar_usuario');
		$this->load->helper('administrador/modals/editar_usuario');
		$this->load->helper("administrador/modals/tomar_foto_usuarios");
		$this->load->model('administrador/usuarios_model');
	}
  public function index()
	{
    if ($this->session->userdata('administrador')) {
			$this->load->view('administrador/usuarios');
    }
    else{
      redirect('iniciar_sesion');
    }
  }

  public function load_usuarios(){
		return load_usuarios();
	}

  public function editar_usuario(){
		extract($_POST);
		return editar_usuario($id);
	}

	public function agregar_usuario(){
		return agregar_usuario();
	}

	public function contar_usuarios(){
		return $this->usuarios_model->contar_usuarios();
	}

	public function guardar_usuario(){
		extract($_POST);
		return $this->usuarios_model->agregar_usuario($nombre,$dui,$user,$pass1);
	}

	public function actualizar_usuario(){
		extract($_POST);
		return $this->usuarios_model->actualizar_usuario($idu,$nombre,$dui,$user,$pass1);
	}

  public function eliminar_usuario(){
		extract($_POST);
		return $this->usuarios_model->eliminar_usuario($id,$user);
	}

	public function cargar_modal_foto(){
    extract($_POST);
		return cargar_modal($id);
	}

  public function do_upload(){
		extract($_POST);
    echo $_GET['id'];
		unlink(base_url()."assets/images/usuarios/".$_GET['id'].".png");
		$data = file_get_contents("php://input");
		$data = str_replace('data:image/png;base64,', '', $data);
		$data = str_replace(' ', '+', $data);
		$data = base64_decode($data);

		$newfile= rtrim($_GET['id'].".png");
		$var_name_img = $newfile;
		$var_img_dir =rtrim("assets/images/usuarios/");
		$imagen= $var_img_dir.$var_name_img;
		unlink($imagen);
		//subida de imagen normal
		$fp = fopen($imagen, 'wb');
	  $ok = fwrite( $fp, $data);
	  fclose( $fp );

		return $this->usuarios_model->actualizar_foto($_GET['id'],$var_name_img);
	}
}
?>
