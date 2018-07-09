<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<?php include "includes/meta.php";?>

<link rel="stylesheet" href="<?=base_url();?>assets/css/admin/module.admin.page.login.min.css" />
<script src="<?=base_url();?>assets/components/library/jquery/jquery.min.js?v=v1.2.3"></script>
<script src="<?=base_url();?>assets/components/library/jquery/jquery-migrate.min.js?v=v1.2.3"></script>
<script src="<?=base_url();?>assets/components/library/modernizr/modernizr.js?v=v1.2.3"></script>
<script src="<?=base_url();?>assets/components/plugins/less-js/less.min.js?v=v1.2.3"></script>
<script src="<?=base_url();?>assets/components/modules/admin/charts/flot/assets/lib/excanvas.js?v=v1.2.3"></script>
<script src="<?=base_url();?>assets/components/plugins/browser/ie/ie.prototype.polyfill.js?v=v1.2.3"></script>
</head>
<body class=" loginWrapper">



	<div id="content"><h4 class="innerAll margin-none border-bottom text-center"><i class="fa fa-lock"></i> Ingreso al Sistema</h4>

<div class="login spacing-x2">
	<div class="placeholder text-center"><i class="fa fa-lock"></i></div>
	<div class="col-sm-6 col-sm-offset-3">
		<div class="panel panel-default">
			<div class="panel-body innerAll">
		  		<form role="form" method="POST">

		  	  		<div class="form-group">
			    		<label for="exampleInputEmail1">Usuario</label>
		    			<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
			  		</div>
			  		<div class="form-group">
			    		<label for="exampleInputPassword1">Contraseña</label>
			    		<input type="password" class="form-control" name="contra" placeholder="Contraseña" id="contra">
			  		</div>
			  		<button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            <span class="btn btn-info btn-block" onclick="registro();">Registrarse</span>
				</form>
		  	</div>
		</div>
	</div>
</div>
<div class="modal fade" id="div_modal">
</div>






	<!-- Global -->
	<script>
	var basePath = '',
		commonPath = '<?=base_url();?>assets/',
		rootPath = '<?=base_url();?>',
		DEV = false,
		componentsPath = '<?=base_url();?>assets/components/';

	var primaryColor = '#cb4040',
		dangerColor = '#b55151',
		infoColor = '#466baf',
		successColor = '#8baf46',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';

	var themerPrimaryColor = primaryColor;

  function statement_loading(){
    var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
    return mensaje;
  }

  function registro(){
    window.open("empresa/Publicaciones/nueva_empresa");

  }
	</script>

	<script src="<?=base?>/assets/components/library/bootstrap/js/bootstrap.min.js?v=v1.2.3"></script>
<script src="<?=base_url();?>assets/components/plugins/nicescroll/jquery.nicescroll.min.js?v=v1.2.3"></script>
<script src="<?=base_url();?>assets/components/plugins/breakpoints/breakpoints.js?v=v1.2.3"></script>
<script src="<?=base_url();?>assets/components/core/js/animations.init.js?v=v1.2.3"></script>
<script src="<?=base_url();?>assets/components/helpers/themer/assets/plugins/cookie/jquery.cookie.js?v=v1.2.3"></script>
<script src="<?=base_url();?>assets/components/core/js/core.init.js?v=v1.2.3"></script>

</body>
</html>
