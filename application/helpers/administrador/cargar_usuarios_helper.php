<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function load_usuarios(){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

	if($CI->session->userdata('administrador','rol')){
	$user_data = $CI->session->userdata('administrador');
	}
  $query = $CI->db->query("SELECT * FROM usuarios WHERE estado=1");
?>

  <table class="table table-striped" id="usuarios_tabla">
    <thead>
      <tr>
        <th style="text-align:center;">Usuario</th>
        <th style="text-align:center;">Tipo de usuario</th>
        <th style="text-align:center;">Acciones</th>
      </tr>
    </thead>
    <tbody>
  <?php foreach($query->result_array() as $row){ ?>
      <tr>
        <td style="text-align:center"><?php echo $row['usuario'];?></td>
        <td style="text-align:center">Administrador</td>
        <td style="text-align:center">
          <a class="btn btn-info" onclick="editar_usuario(<?php echo $row['idusuario'];?>)"><i class="fa fa-edit"></i></a>

          <a class="btn btn-primary" onclick="eliminar_usuario('<?php echo $row['idusuario'];?>','<? echo $row['usuario'];?>')"><i class="fa fa-trash-o"></i></a>

        </td>
      </tr>
  <?php } ?>
    </tbody>
	</table>
<script>
  $('#usuarios_tabla').DataTable({
    "aaSorting": []
    ,"displayLength": 25
  });
</script>

<?php
}
?>
