<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function cargar_vitacora($fecha){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();
  $fecha = date("Y-m-d",strtotime($fecha));
  $query = $CI->db->query("SELECT vitacora.fecha,vitacora.hora,vitacora.usuario,vitacora.accion,usuarios.nombre FROM vitacora INNER JOIN usuarios ON vitacora.usuario = usuarios.usuario WHERE vitacora.fecha = '".$fecha."' ORDER BY vitacora.fecha DESC, vitacora.hora DESC");
?>

<table class="table table-striped" id="vitacora_table">
<thead>
  <tr>
    <th style="text-align:center;"><strong>Fecha</strong></th>
    <th style="text-align:center;">Hora</th>
    <th style="text-align:center;">Usuario</th>
    <th style="text-align:center;">Responsable</th>
    <th style="text-align:center;">Actividad</th>
  </tr>
</thead>
<tbody>
  <?php foreach($query->result_array() as $row){ ?>
    <tr>
      <td style="text-align:center"><?php echo date("d/m/Y",strtotime($row['fecha']));?></td>
      <td style="text-align:center"><?php echo date("h:i a",strtotime($row['hora']));?></td>
      <td style="text-align:center"><?php echo $row['usuario'];?></td>
      <td style="text-align:center"><?php echo $row['nombre'];?></td>
      <td style="text-align:center"><?php echo $row['accion'];?></td>
    </tr>
  <?php } ?>
</tbody>
</table>
<script>
  $('#vitacora_table').DataTable({
    "aaSorting": []
    ,"displayLength": 50
  });
</script>

<?php } ?>
