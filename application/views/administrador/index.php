<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include "includes/meta.php";?>

    <link rel="stylesheet" href="<?=base_url();?>assets/css/admin/module.admin.page.index.min.css" />
    <script src="<?=base_url();?>assets/components/library/jquery/jquery.min.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/library/jquery/jquery-migrate.min.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/library/modernizr/modernizr.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/plugins/less-js/less.min.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/library/jquery-ui/js/jquery-ui.min.js?v=v1.2.3"></script>
    <script src="<?=base_url();?>assets/components/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js?v=v1.2.3"></script>

  </head>
<body class="">
  <?php $opt="admin_index"?>
  <?php include "includes/nav_bar_header.php";?>
  <?php include "includes/menus/".$user_data['menu']?>

  <div id="content"><h1 class="content-heading bg-white border-bottom"><?=$user_data['institucion']?></h1></div>
  <?php include "includes/footer.php"?>

	<script src="<?=base_url();?>assets/components/library/bootstrap/js/bootstrap.min.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/plugins/breakpoints/breakpoints.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/core/js/animations.init.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/modules/admin/charts/flot/assets/lib/jquery.flot.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/modules/admin/charts/flot/assets/lib/jquery.flot.resize.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/modules/admin/charts/flot/assets/lib/plugins/jquery.flot.tooltip.min.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/modules/admin/charts/flot/assets/custom/js/flotcharts.common.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/modules/admin/charts/flot/assets/custom/js/flotchart-simple.init.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/modules/admin/charts/flot/assets/custom/js/flotchart-simple-bars.init.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/modules/admin/widgets/widget-chat/assets/js/widget-chat.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/plugins/slimscroll/jquery.slimscroll.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/modules/admin/forms/elements/bootstrap-datepicker/assets/lib/js/bootstrap-datepicker.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/modules/admin/forms/elements/bootstrap-datepicker/assets/custom/js/bootstrap-datepicker.init.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/modules/admin/charts/easy-pie/assets/lib/js/jquery.easy-pie-chart.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/modules/admin/charts/easy-pie/assets/custom/easy-pie.init.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/modules/admin/widgets/widget-scrollable/assets/js/widget-scrollable.init.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/plugins/holder/holder.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/core/js/sidebar.main.init.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/core/js/sidebar.collapse.init.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/helpers/themer/assets/plugins/cookie/jquery.cookie.js?v=v1.2.3"></script>
  <script src="<?=base_url();?>assets/components/core/js/core.init.js?v=v1.2.3"></script>

  </body>
</html>
