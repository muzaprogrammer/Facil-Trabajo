<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function agregar_usuario(){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  ?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h2 class="semibold modal-title text-danger"><strong>Agregar usuario</strong></h2>
      </div>
      <div class="modal-body">
  		  <div class="panel-body">
          <form id="form_usuario" class="form-horizontal" autocomplete="off">
            <div class="form-body">
              <div class="form-group">
                <label class="control-label col-md-3">Nombre: </label>
                <div class="col-md-9">
                  <input id="nombre" name="nombre" class="form-control" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">DUI: </label>
                <div class="col-md-9">
                  <input id="dui" name="dui" class="form-control" data-mask="99999999-9" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Usuario:</label>
                <div class="col-md-9">
                  <input id="user" name="user" class="form-control" type="text" >
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Contraseña:</label>
                <div class="col-md-9">
                  <input id="pass1" name="pass1" onkeyup="verificarpass();" class="form-control" type="text">
                </div>
              </div><div class="form-group">
                <label class="control-label col-md-3">Confirme contraseña:</label>
                <div class="col-md-9">
                  <input id="pass2" name="pass2" onkeyup="verificarpass();" class="form-control" type="text">
                  <label class="text-danger" id="error"></label>
                </div>
              </div>
            </form>
            <div class="form-group" align="center">
              <button type="button" class="btn btn-warning" onclick="guardar();" name="submit" id="submit">
                <i class="fa fa-save"></i> Guardar
              </button>
              <button type="button" class="btn btn-info" onclick="cerrar_modal_usuario();" id="salir">
                <i class="fa fa-mail-reply"></i> Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>

  function verificarpass()
  {
    var pass1 = $('#pass1').val();
    var pass2 = $('#pass2').val();
    if (pass1==pass2)
    {
      $("#error").text("").addClass("alert alert-error").fadeIn("Slow");
      $("#submit").removeAttr("disabled");
    }
    else
    {
      $("#error").text("Las contraseñas no coinciden").addClass("alert alert-error").fadeIn("Slow");
      $("#submit").attr("disabled","disabled");
    }
  }
  </script>

<?php } ?>
