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

  </head>
  <body class="" onload="cargar_publicaciones()">
    <?$opt="empresa_postulaciones"?>
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
              <h4 class="heading">Administracion de Postulaciones</h4>
            </div>
            <!-- // Widget heading END -->
            <div class="widget-body">
              <div class="table-responsive" id="materias">
              </div>
              <div class="modal fade" id="div_modal">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <?php include "includes/footer.php"?>

    <script src="<?=base_url();?>js/empresa/postulaciones.js"></script>

    <script src="<?=base_url();?>assets/components/library/bootstrap/js/bootstrap.min.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.2.3"></script>
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
  </body>
</html>
