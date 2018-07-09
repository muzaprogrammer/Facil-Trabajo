<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function nueva_empresa(){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  $optionsDepartamento = '<option value="">Seleccion un Departamento...</option>';
  $query = $CI->db->query("SELECT * FROM departamentos");
  foreach($query->result_array() as $row){
    $optionsDepartamento .= '<option value="'.$row['idDepartamento'].'" >'.$row['nombre'].'</option>';
  }

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
    <body>
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal heading -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title">Formulario de Registro</h3>
          </div>
          <!-- // Modal heading END -->
          <!-- Modal body -->
          <div class="modal-body">
            <div class="innerAll">
              <div class="innerLR">
                <form class="form-horizontal" id="form_empresas" name="form_empresas">
                  <br>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Departamento: </label>
                    <div class="col-sm-10">
                      <select class="form-control" id="idDepartamento" name="idDepartamento">
                        <?=$optionsDepartamento?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nombre Empresa: </label>
                    <div class="col-sm-10">
                      <input type="text" name="nombreEmpresa" id="nombreEmpresa" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Telefono: </label>
                    <div class="col-sm-10">
                      <input type="text" name="telefono" id="telefono" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">descripcion: </label>
                    <div class="col-sm-10">
                      <input type="text" name="descripcion" id="descripcion" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Correo: </label>
                    <div class="col-sm-10">
                      <input type="text" name="correo" id="correo" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Contraseña: </label>
                    <div class="col-sm-10">
                      <input type="text" name="contra"id="contra" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Direccion: </label>
                    <div class="col-sm-10">
                      <input type="text" name="direccion" id="direccion" class="form-control">
                    </div>
                  </div>


                  <br><br>
                  <div class="form-group">
                    <center>
                      <div>
                        <button type="button" class="btn btn-success" onclick="registrar_empresa();" name="submit" id="submit">
                          <i class="fa fa-save"></i> Registrarse
                        </button>
                        <span class="btn btn-danger" onclick="salir();"><i class="fa fa-mail-reply"></i> Cancelar</span>
                      </div>
                    </center>

                  </div>
                  <div class="form-actions">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- // Modal body END -->
        </div>
      </div>

      <script src="<?=base_url();?>js/empresa/publicacioness.js"></script>

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
      <script type="text/javascript">

      function salir(){
        window.close();
      }

      function registrar_empresa(){
        swal({
          title: '¿Todos los datos estan correctos?',
          text: '¿Estas a punto de registrarte?',
          type: 'question',
          showCancelButton: true,
          confirmButtonColor: '#4fb7fe',
          cancelButtonColor: '#EF6F6C',
          allowOutsideClick: false,
          confirmButtonText: 'Si, Registrarme!',
          cancelButtonText: 'Cancelar'
        }).then(function () {
          var datos = $("#form_empresas").serialize();
          $.ajax({
            url: 'registrar_empresa',
            type: "POST",
            data: datos,
            success: function (response) {
              if(response == 0){
                swal({
                  title: 'Exito!',
                  text: 'Registrado!',
                  type: 'success',
                  confirmButtonColor: '#ff9933'
                }).then( function() {
                  window.close();
                });
              }else {
                swal({
                  title: 'Ooops !',
                  text: 'Error al registrarse!',
                  type: 'error',
                  confirmButtonColor: '#ff9933'
                }).then( function() {  });
              }
            }
          });
        });
      }

      </script>
    </body>
  </html>

<?php } ?>
