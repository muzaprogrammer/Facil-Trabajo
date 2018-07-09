<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->userdata('administrador','rol')){
$user_data = $this->session->userdata('administrador');
}
else if($this->session->userdata('empresa','rol')){
$user_data = $this->session->userdata('empresa');
}



?>
<div class="navbar navbar-fixed-top navbar-primary main" role="navigation">

<div class="navbar-header pull-left">
    <div class="navbar-brand">
        <div class="pull-left">
            <a href="" class="toggle-button toggle-sidebar btn-navbar"><i class="fa fa-bars"></i></a>
        </div>
        <a href="" class="appbrand innerL">Facil Trabajo</a>
    </div>
</div>

<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="" class="dropdown-toggle user" data-toggle="dropdown"> <img src="<?=base_url();?>assets/images/usuarios/user.png" height="35px" width="35px" alt="" class="img-circle"/><span class="hidden-xs hidden-sm"> &nbsp; <?php echo $user_data['nombres'];?> </span> <span class="caret"></span></a>
        <ul class="dropdown-menu list pull-right ">
            <li><a href=""><i class="fa fa-user"></i>Perfil</a></li>
            <li><a href=""><i class="fa fa-pencil"></i>Ajustes </a></li>
            <li><a href=""><i class="fa fa-question-circle"></i>Ayuda </a></li>
            <li><a href="../Iniciar_sesion/cerrar_sesion"><i class="fa fa-sign-out"></i>Salir</a></li>
        </ul>
    </li>
</ul>
</div>
