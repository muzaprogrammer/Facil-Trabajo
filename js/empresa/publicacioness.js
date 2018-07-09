function statement_loading(){
  var mensaje = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body" align="center"><div class="panel-body"><strong><h2>PROCESANDO LA INFORMACI&Oacute;N</h2></strong><img src="../assets/images/progress.gif" width="150" height="150"></div></div></div></div>';
  return mensaje;
}

function cargar_publicaciones(){
  $.ajax({
    url: 'Publicaciones/cargar_publicaciones',
    type: "POST",
    beforeSend: function(){
      $('#materias').show();
      $('#materias').html('<div align="center"><h3>BUSCANDO REGISTROS</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
    },
    success: function (response) {
      $('#materias').html(response);
    }
  });
}

function registrar(){
  $.ajax({
    url: 'Publicaciones/agregar_publicacion',
    beforeSend: function(){
      $('#div_modal').html(statement_loading());
      $('#div_modal').modal({backdrop: 'static', keyboard: false});
    },
    complete: function(){
      $('#div_modal').html();
     },
    success: function (response) {
      $('#div_modal').html(response);
    }
  });
}

function editar_publicacion(id){
  $.ajax({
    url: 'Publicaciones/editar_publicacion',
    type: "POST",
    data: {id:id},
    beforeSend: function(){
      $('#div_modal').html(statement_loading());
      $('#div_modal').modal({backdrop: 'static', keyboard: false});
    },
    complete: function(){
      $('#div_modal').html();
     },
    success: function (response) {
      $('#div_modal').html(response);
    }
  });
}

function cerrar_modal(){
  $('#div_modal').modal('hide');
}

function eliminar_publicacion(id){
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de eliminar la publicacion?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Eliminar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Publicaciones/eliminar_publicacion',
      type: "POST",
      data: {id:id},
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
            text: 'Publicacion Eliminada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cargar_publicaciones();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al eliminar la publicacion!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}

function guardar(){
  var ide = $('#ide').val();
  var cargoOferta = $('#cargoOferta').val();
  var idCategoriaEmpleo = $('#idCategoriaEmpleo').val();
  var fechaContratacion = $('#fechaContratacion').val();
  var vacantes = $('#vacantes').val();
  var salario = $('#salario').val();
  var descripcion = $('#descripcion').val();
  var idDepartamento = $('#idDepartamento').val();

  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de guardar la publicacion?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Guardar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Publicaciones/guardar_publicacion',
      type: "POST",
      data: {
        ide:ide,
        cargoOferta:cargoOferta,
        idCategoriaEmpleo:idCategoriaEmpleo,
        fechaContratacion:fechaContratacion,
        vacantes:vacantes,
        salario:salario,
        descripcion:descripcion,
        idDepartamento:idDepartamento
      },
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
            text: 'Publicacion Guardada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cerrar_modal();
            cargar_publicaciones();
          });
        }else if(response==2){
          swal({
            title: 'Ooops !',
            text: 'Error! Vuelva a intentarlo.',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al guardar la publicacion!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}


function editar(id){
  var cargoOferta = $('#cargoOferta').val();
  var idCategoriaEmpleo = $('#idCategoriaEmpleo').val();
  var fechaContratacion = $('#fechaContratacion').val();
  var vacantes = $('#vacantes').val();
  var salario = $('#salario').val();
  var descripcion = $('#descripcion').val();
  var idDepartamento = $('#idDepartamento').val();
  swal({
    title: '¿Estas seguro?',
    text: '¿Estas a punto de editar la publicacion?',
    type: 'question',
    showCancelButton: true,
    confirmButtonColor: '#4fb7fe',
    cancelButtonColor: '#EF6F6C',
    allowOutsideClick: false,
    confirmButtonText: 'Si, Editar!',
    cancelButtonText: 'Cancelar'
  }).then(function () {
    $.ajax({
      url: 'Publicaciones/editar',
      type: "POST",
      data: {
        id:id,
        cargoOferta:cargoOferta,
        idCategoriaEmpleo:idCategoriaEmpleo,
        fechaContratacion:fechaContratacion,
        vacantes:vacantes,
        salario:salario,
        descripcion:descripcion,
        idDepartamento:idDepartamento
      },
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
            text: 'Publicacion Editada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            cerrar_modal();
            cargar_publicaciones();
          });
        }else {
          swal({
            title: 'Ooops !',
            text: 'Error al editar la publicacion!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() {  });
        }
      }
    });
  });
}
