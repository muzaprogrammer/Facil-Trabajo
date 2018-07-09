<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function editar_usuario($id){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  $query = $CI->db->query("SELECT * FROM usuarios WHERE idusuario = ".$id);
  foreach($query->result_array() as $row){
    $nombre = $row['nombre'];
    $dui = $row['dui'];
    $usuario = $row['usuario'];
    $password = $row['password'];
    $foto = $row['foto'];
  }
  ?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">x</button>
        <h2 class="semibold modal-title text-danger"><strong>Editar usuario</strong></h2>
      </div>
      <div class="modal-body">
  		  <div class="panel-body">
          <form id="form_usuario" class="form-horizontal" autocomplete="off">
            <div class="form-body">
              <input id="idu" name="idu" class="form-control" type="hidden" value="<?=$id?>">
              <div class="innerAll spacing-x2">
                <div class="widget widget-inverse">
                  <div class="widget-body">
                    <img width="100%" alt="user" src="<?=base_url();?>/assets/images/usuarios/<?=$foto?>">
                  </div>
                  <div class="form-actions" align="center">
                    <button type="button" class="btn btn-warning hidden-xs" onclick="cargar_modal(<?=$id?>);">Cambiar fotografia</button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Nombre: </label>
                <div class="col-md-9">
                  <input id="nombre" name="nombre" class="form-control" type="text" value="<?=$nombre?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">DUI: </label>
                <div class="col-md-9">
                  <input id="dui" name="dui" data-mask="99999999-9" class="form-control" type="text" value="<?=$dui?>">
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3">Usuario:</label>
                <div class="col-md-9">
                  <input id="user" name="user" readonly="readonly" class="form-control" type="text" value="<?=$usuario?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Contraseña:</label>
                <div class="col-md-9">
                  <input id="pass1" name="pass1" onkeyup="verificarpass();" class="form-control" type="text" value="<?=$password?>">
                </div>
              </div><div class="form-group">
                <label class="control-label col-md-3">Confirme contraseña:</label>
                <div class="col-md-9">
                  <input id="pass2" name="pass2" onkeyup="verificarpass();" class="form-control" type="text" value="<?=$password?>">
                  <label class="text-danger" id="error"></label>
                </div>
              </div>
            </form>
            <div class="form-group" align="center">
              <button type="button" class="btn btn-warning" onclick="actualizar_usuario();" name="submit" id="submit">
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

  function verificarpass(){
    var pass1 = $('#pass1').val();
    var pass2 = $('#pass2').val();

    if (pass1 == pass2){
      $("#error").text("").addClass("alert alert-error").fadeIn("Slow");
      $("#submit").removeAttr("disabled");
    }else{
      $("#error").text("Las contraseñas no coinciden").addClass("alert alert-error").fadeIn("Slow");
      $("#submit").attr("disabled","disabled");
    }
  }

  function actualizar_usuario(){
    var nombre = $('#nombre').val();
    var dui = $('#dui').val();
    var roles = $('#roles').val();
    var pass1 = $('#pass1').val();
    var pass2 = $('#pass2').val();

    if(nombre == "" || dui == "" || pass1 == "" || pass2 == ""){
      swal(
        'Oops...',
        'Debe llenar todos los campos!',
        'error'
      );
    }

    else{
      swal({
        title: '¿Deseas guardar?',
        text: '¿Todos los datos estan correctos?',
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#4fb7fe',
        cancelButtonColor: '#EF6F6C',
        allowOutsideClick: false,
        confirmButtonText: 'Si, Editar!',
        cancelButtonText: 'Cancelar'
      }).then(function () {
        var datos = $("#form_usuario").serialize();
        $.ajax({
          url: 'Usuarios/actualizar_usuario',
          type: "POST",
          data: datos,
          beforeSend: function(){
            $('#modal').html(statement_loading());
          },
          complete: function(){
            $('#modal').html();
           },
          success: function (response) {
            if(response == 0){
              swal({
                title: 'Exito!',
                text: 'Usuario editado!',
                type: 'success',
                confirmButtonColor: '#ff9933'
              }).then( function() { cerrar_modal_usuario();load_usuarios(); });
            }
            else if(response == 2){
              swal({
                title: 'Oops...',
                text: 'El usuario que trato de ingresar ya esta en la base de datos!',
                type: 'error',
                confirmButtonColor: '#4fb7fe'
              }).done();
              cerrar_modal_usuario();
            }
            else {
              swal({
                title: 'Oops...',
                text: 'Hubo un error al editar el usuario, por favor intentelo de nuevo mas tarde!',
                type: 'error',
                confirmButtonColor: '#4fb7fe'
              }).done();
              cerrar_modal_usuario();
            }
          }
        });
      });
    }
  }

  function cerrar_modal_usuario(){
    $('#modal').modal('hide');
  }
  </script>

<?php } ?>
