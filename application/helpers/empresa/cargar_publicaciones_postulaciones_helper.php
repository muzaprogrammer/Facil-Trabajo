<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function cargar_publicaciones(){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

	if($CI->session->userdata('empresa','rol')){
	$user_data = $CI->session->userdata('empresa');
	}
  $idempresa= $user_data['id'];
  $query = $CI->db->query("SELECT * FROM ofertasEmpleo
INNER JOIN categoriasOfertas ON categoriasOfertas.idCategoriaOferta = ofertasEmpleo.idCategoriaEmpleo
INNER JOIN departamentos ON ofertasEmpleo.idDepartamento = departamentos.idDepartamento
 WHERE ofertasEmpleo.estado=1 AND idEmpresa=".$idempresa);
?>

  <table class="table table-striped" id="usuarios_tabla">
    <thead>
      <tr>
        <th style="text-align:center;">Cargo</th>
        <th style="text-align:center;">Categoria Empleo</th>
        <th style="text-align:center;">Fecha Publicacion</th>
        <th style="text-align:center;">Fecha Contratacion</th>
        <th style="text-align:center;">Vacantes</th>
        <th style="text-align:center;">Salario</th>
        <th style="text-align:center;">Descripcion</th>
        <th style="text-align:center;">Departamento</th>
        <th style="text-align:center;">Acciones</th>
      </tr>
    </thead>
    <tbody>
  <?php foreach($query->result_array() as $row){ ?>
      <tr>
        <td style="text-align:center"><?php echo $row['cargoOferta'];?></td>
        <td style="text-align:center"><?php echo $row['nombreCategoria'];?></td>
        <td style="text-align:center"><?php echo $row['fechaPublicacion'];?></td>
        <td style="text-align:center"><?php echo $row['fechaContratacion'];?></td>
        <td style="text-align:center"><?php echo $row['vacantes'];?></td>
        <td style="text-align:center"><?php echo $row['salario'];?></td>
        <td style="text-align:center"><?php echo $row['descripcion'];?></td>
        <td style="text-align:center"><?php echo $row['nombre'];?></td>
        <td style="text-align:center">
          <a class="btn btn-info" onclick="ver_postulantes(<?php echo $row['idofertasEmpleo'];?>)"><i class="fa fa-check"></i></a>

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
