<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include "includes/meta.php";?>

    <link rel="stylesheet" href="<?=base_url();?>assets/css/admin/module.admin.page.form_validator.min.css" />
    <script src="<?=base_url();?>assets/components/library/jquery/jquery.min.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/library/jquery/jquery-migrate.min.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/library/modernizr/modernizr.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/plugins/less-js/less.min.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v1.2.3"></script>

    <link href="<?php echo base_url();?>assets/components/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/components/plugins/datatables/jquery.dataTables.min.css" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin/module.admin.page.form_elements.min.css" />

  </head>
  <body class="" onload="load_vitacora()">
    <?$opt="admin_vitacora"?>
    <?php include "includes/nav_bar_header.php";?>
    <?php include "includes/menus/".$user_data['menu']?>

    <div id="content"><h1 class="content-heading bg-white border-bottom"><?=$user_data['institucion']?></h1>
      <div class="innerAll spacing-x2">
        <!-- Form -->
        <form class="form-horizontal margin-none" id="form-buscar_alumno" method="get" autocomplete="off">
          <!-- Widget -->
          <div class="widget widget-inverse">
            <!-- Widget heading -->
            <div class="widget-head">
              <h4 class="heading">Vitacora de eventos</h4>
            </div>
            <!-- // Widget heading END -->
            <div class="widget-body">
              <div class="form-group">
                <div class="row">
                  <div class="well">
			              <h4>Fecha de actividad</h4>
                    <div class="input-group date" id="datepicker2">
                      <input class="form-control" type="text" name="fecha_vitacora" id="fecha_vitacora" onchange="load_vitacora(this.value)" value="<?=date('d-m-Y')?>" />
                      <span class="input-group-addon"><i class="fa fa-th"></i></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive panel-collapse pull out">
                <div id="resultado"></div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <?php include "includes/footer.php"?>

    <script src="<?=base_url();?>assets/components/library/bootstrap/js/bootstrap.min.js?v=v1.2.3"></script>
    <script src="<?=base_url( );?>assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/plugins/breakpoints/breakpoints.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/core/js/animations.init.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/modules/admin/forms/validator/assets/lib/jquery-validation/dist/jquery.validate.min.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/modules/admin/forms/validator/assets/custom/form-validator.init.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/plugins/holder/holder.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/core/js/sidebar.main.init.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/core/js/sidebar.collapse.init.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/helpers/themer/assets/plugins/cookie/jquery.cookie.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/core/js/core.init.js?v=v1.2.3"></script>

    <script src="<?php echo base_url();?>assets/components/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>

    <script src="<?=base_url();?>assets/components/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?=base_url();?>assets/components/plugins/sweetalert/jquery.sweet-alert.custom.js"></script>

    <script src="<?=base_url();?>assets/components/modules/admin/forms/elements/bootstrap-datepicker/assets/lib/js/bootstrap-datepicker.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/modules/admin/forms/elements/bootstrap-datepicker/assets/custom/js/bootstrap-datepicker.init.js?v=v1.2.3"></script>

    <script src="<?=base_url();?>assets/components/modules/admin/forms/elements/colorpicker-farbtastic/assets/js/farbtastic.min.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/modules/admin/forms/elements/colorpicker-farbtastic/assets/js/colorpicker-farbtastic.init.js?v=v1.2.3"></script>

    <script src="<?=base_url();?>js/administrador/vitacora.js"></script>
  </body>
</html>
