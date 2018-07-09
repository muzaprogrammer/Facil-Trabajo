<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function cargar_modal($id){ ?>
  <div class="modal-dialog modal-lg" style="position:relative">
      <div class="modal-content">
      <!-- Modal heading -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <center><h3 class="modal-title"><b>Cambiar fotografia</b></h3></center>
        </div>
      <!-- // Modal heading END -->
      <!-- Modal body -->
      <div class="modal-body">
        <div class="innerAll">
          <div class="innerLR">
            <form class="form-horizontal" id="form_foto" role="form">
              <div class="form-group" align="center">
                <div class="form-group">
                  <video id="camara" autoplay style="width: 275px;min-height: 240px;border: 1px solid #008000;"></video>
                  <canvas id="fotografia" style="width: 275px;min-height: 240px;border: 1px solid #008000;"></canvas>
                </div>
              </div>
              <hr>
              <div class="form-group" align="center">
                <div class="form-group">
                  <button type="button" class="btn btn-primary" id="startbutton"><i class="fa fa-check-circle"></i> Tomar fotografia</button>
                  <button type="button" class="btn btn-success" id="uploadbutton"><i class="fa fa-times"></i> Guardar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Cancelar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
  function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    vars[key] = value;
    });
    return vars;
  }

  (function() {

    var streaming = false,
        video        = document.querySelector('#camara'),
        canvas       = document.querySelector('#fotografia'),
        startbutton  = document.querySelector('#startbutton'),
        width = 320,
        height = 0;

    navigator.getMedia = ( navigator.getUserMedia ||
                           navigator.webkitGetUserMedia ||
                           navigator.mozGetUserMedia ||
                           navigator.msGetUserMedia);

    navigator.getMedia(
      {
        video: true,
        audio: false
      },
      function(stream) {
        if (navigator.mozGetUserMedia) {
          video.mozSrcObject = stream;
        } else {
          var vendorURL = window.URL || window.webkitURL;
          video.src = vendorURL.createObjectURL(stream);
        }
        video.play();
      },
      function(err) {
        console.log("An error occured! " + err);
      }
    );

    video.addEventListener('canplay', function(ev){
      if (!streaming) {
        height = video.videoHeight / (video.videoWidth/width);
        video.setAttribute('width', width);
        video.setAttribute('height', height);
        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);

    function takepicture() {
      canvas.width = width;
      canvas.height = height;
      canvas.getContext('2d').drawImage(video, 0, 0, width, height);
      var data = canvas.toDataURL('image/png');
    }

    function subir_foto() {
      $('#myModal').modal('toggle');
      $('#myModal').modal('show');
      var data = canvas.toDataURL('image/png');
      var xhr = new XMLHttpRequest();
      //var id = getUrlVars()["id"];
      xhr.open('POST','Nuevo_alumno/do_upload?id='+<?=$id?>,true);
      xhr.setRequestHeader('Content-Type', 'application/upload');
      xhr.onreadystatechange=function() {
        if (xhr.readyState==4) {
          swal({
            title: 'Exito!',
            text: 'Fotografia actualizada!',
            type: 'success',
            confirmButtonColor: '#ff9933'
          }).then( function() {
            window.location.replace("datos_alumno?id=<?=$id?>");
          });
        }
        else{
          swal({
            title: 'Ooops!',
            text: 'Hubo un error al subir la fotografia!',
            type: 'error',
            confirmButtonColor: '#ff9933'
          }).then( function() { $('#myModal').modal('hide'); });
        }
      }
      xhr.send(data);
    }

    startbutton.addEventListener('click', function(ev){
        takepicture();
      ev.preventDefault();
    }, false);

    uploadbutton.addEventListener('click', function(ev){
      subir_foto();
      $('#modalcontent').modal('hide');
      ev.preventDefault();
    }, false);


  })();
  </script>
<?php } ?>
