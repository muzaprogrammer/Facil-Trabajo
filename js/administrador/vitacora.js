function load_vitacora(){
  var fecha = $('#fecha_vitacora').val();
  $.ajax({
    url:'Vitacora/cargar_vitacora',
    type:'POST',
    data:{fecha:fecha},
    dataType:'html',
    beforeSend: function(){
      $('#resultado').html('<div align="center"><h3>CARGANDO LA INFORMACION</h3><img src="../assets/images/progress.gif" width="75" height="75"></div></div>');
    },
    success: function(html){
      $('#resultado').html(html);
    }
  });
}
