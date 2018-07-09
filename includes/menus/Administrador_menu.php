<div id="menu" class="hidden-print hidden-xs">
<div class="sidebar sidebar-inverse">
  <div class="user-profile media innerAll">
    <a href="" class="pull-left"><img src="<?=base_url();?>assets/images/<?php echo $user_data['foto'];?>" alt="" height="50px" width="50px" class="img-circle"></a>
    <div class="media-body">
      <a href="" class="strong"><?php echo $user_data['nombres'];?></a>
      <p class="text-success"><i class="fa fa-fw fa-circle"></i> Online</p>
    </div>

  </div>
  <div class="sidebarMenuWrapper">
    <ul class="list-unstyled">
      <li <?php if($opt == "admin_index"){ echo 'class="active"'; }?> ><a href="../administrador/index"><i class=" icon-projector-screen-line"></i><span>Dashboard</span></a></li>

      <!--<li <?php if($opt == "alum_inscripcion"){ echo 'class="active"'; }?> ><a href="../alumno/inscripcion"><i class="fa fa-user"></i><span>Inscripcion Ciclo</span></a></li>-->

      <li <?php if($opt == "admin_usuarios"){ echo 'class="hasSubmenu active"'; }else{echo 'class="hasSubmenu"'; }?>>
        <a href="#" data-target="#menu-usuarios" data-toggle="collapse"><i class="fa fa-gear"></i><span>Configuraciones</span></a>
        <ul <?php if($opt == "admin_usuarios"){ echo 'class="collapse in "'; }else{echo 'class="collapse"'; }?> id="menu-usuarios">
          <li <?php if($opt == "admin_usuarios"){ echo 'class="active"'; }?>><a href="../administrador/usuarios"><i class="fa fa-list-ol"></i>Administracion de usuarios</a></li>
        </ul>
      </li>

      <li <?php if($opt == "admin_vitacora"){ echo 'class="active"'; }?> ><a href="../administrador/vitacora"><i class="fa fa-road"></i><span>Vitacora de Eventos</span></a></li>
      <li <?php if($opt == "admin_salir"){ echo 'class="active"'; }?> ><a href="../iniciar_sesion/cerrar_sesion"><i class="fa fa-sign-out"></i><span>Cerrar Sesion</span></a></li>

    </ul>
  </div>
</div>
</div>
