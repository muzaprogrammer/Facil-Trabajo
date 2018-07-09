function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}

function load_usuarios(){
  $.ajax({
    url: 'Usuarios/load_usuarios',
    beforeSend: function(){
      $('#tabla').show();
      $('#tabla').html('<div align="center"><h3>BUSCANDO REGISTROS COINCIDENTES</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
    },
    success: function (response) {
      $('#tabla').html(response);
			contar_usuarios();
    }
  });
}

function agregar_usuario(){
  $.ajax({
    url: 'Usuarios/agregar_usuario',
    beforeSend: function(){
      $('#modal').html(statement_loading());
      $('#modal').modal({backdrop: 'static', keyboard: false});
    },
    complete: function(){
      $('#modal').html();
     },
    success: function (response) {
      $('#modal').html(response);
    }
  });
}

function editar_usuario(id){
  $.ajax({
    url: 'Usuarios/editar_usuario',
		type: "POST",
    data: { id:id },
    beforeSend: function(){
      $('#modal').html(statement_loading());
      $('#modal').modal({backdrop: 'static', keyboard: false});
    },
    complete: function(){
      $('#modal').html();
     },
    success: function (response) {
      $('#modal').html(response);
    }
  });
}

function contar_usuarios(){
	$.ajax({
		url: 'Usuarios/contar_usuarios',
		success: function (response) {
			if(parseInt(response) <= 500){
        $("#agregar_user").removeAttr("disabled");
      }
			else{
        $("#agregar_user").attr("disabled","disabled");
      }
		}
	});
}


function eliminar_usuario(id,user){
  swal({
    title: '¿Estas seguro?',
    text: 'Se eliminara el usuario permanentemente!',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Eliminar!',
    cancelButtonText: 'No'
  }).then(function () {
    $.ajax({
      url: 'Usuarios/eliminar_usuario',
      type: "POST",
      data: {id:id,user:user},
      beforeSend: function(){
        $('#myModal').modal('toggle');
        $('#myModal').modal('show');
      },
      complete: function(){
        $('#myModal').modal('hide');
      },
      success: function (response) {
        if(response == 0){
          swal({
            title: 'Exito!',
            text: 'Usuario eliminado!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function(){ load_usuarios(); });
        }else if(response == 1){
          swal({
            title: 'Oops...',
            text: 'Hubo un error al eliminar el usuario, por favor intentelo de nuevo mas tarde!',
            type: 'error',
            confirmButtonColor: '#4fb7fe'
          }).done();
        }else if(response == 3){
          swal({
            title: 'Oops...',
            text: 'No se puede eliminar el usuario porque este tiene registros asociados!',
            type: 'error',
            confirmButtonColor: '#4fb7fe'
          }).done();
        }
      }
    });
  });
}

function guardar(){
  var nombre = $('#nombre').val();
  var dui = $('#dui').val();
  var roles = $('#roles').val();
  var user = $('#user').val();
  var pass1 = $('#pass1').val();
  var pass2 = $('#pass2').val();
  if(nombre=="" || dui =="" || user=="" || pass1=="" || pass2==""){
    swal(
      'Oops...',
      'Debe llenar todos los campos!',
      'error'
    );
  }
  else
  {
    swal({
      title: '¿Deseas guardar?',
      text: '¿Todos los datos estan correctos?',
      type: 'question',
      showCancelButton: true,
      confirmButtonColor: '#4fb7fe',
      cancelButtonColor: '#EF6F6C',
      allowOutsideClick: false,
      confirmButtonText: 'Si, Guardar!',
      cancelButtonText: 'Cancelar'
    }).then(function () {
      var datos = $("#form_usuario").serialize();
      $.ajax({
        url: 'Usuarios/guardar_usuario',
        type: "POST",
        data: datos,
        beforeSend: function(){
          $('#modal').html(statement_loading());
        },
        complete: function(){
          $('#modal').html();
         },
        success: function (response) {
          if(response > 0){
            swal({
              title: 'Exito!<br> Usuario registrado!',
              text: '¿Deseas agregar una fotografia al usuario?',
              type: 'success',
              showCancelButton: true,
              confirmButtonColor: '#4fb7fe',
              cancelButtonColor: '#EF6F6C',
              allowOutsideClick: false,
              confirmButtonText: 'Si, Tomar foto!',
              cancelButtonText: 'Solo salir'
            }).then( function() {
              cerrar_modal_usuario();
              load_usuarios();
              cargar_modal(response);
            },
            function (dismiss) {
              if (dismiss === 'cancel') {
                cerrar_modal_usuario();
                load_usuarios();
              }
            });
          }
          else if (response == 2) {
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
              text: 'Hubo un error al guardar el usuario, por favor intentelo de nuevo mas tarde!',
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

function cargar_modal(id){
  cerrar_modal_usuario();
  $('#button_foto').button('toggle').addClass('fat');
$.ajax({
  data: {id:id},
  url: 'Usuarios/cargar_modal_foto',
  type: "POST",
  success: function (response) {
    $('#modalcontent').html(response);
    $('#modalcontent').modal({backdrop: 'static', keyboard: false});
    $('#modalcontent').modal('show');
  }
  });
}
