<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function editar_publicacion($id){
  $CI =& get_instance();
  $CI->load->helper('url');
  $CI->load->database();

  if($CI->session->userdata('empresa','rol')){
	$user_data = $CI->session->userdata('empresa');
	}
  $idempresa= $user_data['id'];

  $query = $CI->db->query("SELECT * FROM ofertasEmpleo WHERE idofertasEmpleo = ".$id);
  foreach($query->result_array() as $row){
    $cargoOferta = $row['cargoOferta'];
    $idCategoriaEmpleo = $row['idCategoriaEmpleo'];
    $fechaContratacion = $row['fechaContratacion'];
    $vacantes = $row['vacantes'];
    $salario = $row['salario'];
    $descripcion = $row['descripcion'];
    $idDepartamento = $row['idDepartamento'];
  }

  $optionsCat = '<option value="">Seleccione una categoria...</option>';
  $query = $CI->db->query("SELECT * FROM categoriasOfertas");
  foreach($query->result_array() as $row){
    if($row['idCategoriaOferta']==$idCategoriaEmpleo){
      $optionsCat .= '<option value="'.$row['idCategoriaOferta'].'" selected>'.$row['nombreCategoria'].'</option>';
    }else{
      $optionsCat .= '<option value="'.$row['idCategoriaOferta'].'" >'.$row['nombreCategoria'].'</option>';
    }
  }

  $optionsDepartamento = '<option value="">Seleccion un Departamento...</option>';
  $query = $CI->db->query("SELECT * FROM departamentos");
  foreach($query->result_array() as $row){
    if($row['idDepartamento']==$idDepartamento){
      $optionsDepartamento .= '<option value="'.$row['idDepartamento'].'" selected >'.$row['nombre'].'</option>';
    }else {
      $optionsDepartamento .= '<option value="'.$row['idDepartamento'].'" >'.$row['nombre'].'</option>';
    }
  }

  ?>
  <div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Editar Publicacion</h3>
			</div>
			<!-- // Modal heading END -->
			<!-- Modal body -->
			<div class="modal-body">
				<div class="innerAll">
					<div class="innerLR">
						<form class="form-horizontal" id="form_publicaciones" name="form_publicaciones">
              <br>
              <input type="hidden" id="ide" name="ide" value="<?=$idempresa?>">
              <div class="form-group">
                <label class="col-sm-2 control-label">Cargo Oferta: </label>
                <div class="col-sm-10">
                  <input type="text" name="cargoOferta" id="cargoOferta" value="<?=$cargoOferta?>" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">Categoria Empleo:</label>
                <div class="col-md-10">
                  <select class="form-control" id="idCategoriaEmpleo" name="idCategoriaEmpleo">
                    <?=$optionsCat?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Contratacion: </label>
                <div class="col-sm-10">
                  <input type="text" name="fechaContratacion" value="<?=$fechaContratacion?>" placeholder="yyyy/mm/dd" id="fechaContratacion" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Vacantes: </label>
                <div class="col-sm-10">
                  <input type="text" name="vacantes" value="<?=$vacantes?>" id="vacantes" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Salario: </label>
                <div class="col-sm-10">
                  <input type="text" name="salario" id="salario" value=<?=$salario?> class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Descripcion: </label>
                <div class="col-sm-10">
                  <input type="text" name="descripcion" id="descripcion" value="<?=$descripcion?>" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Departamento: </label>
                <div class="col-sm-10">
                  <select class="form-control" id="idDepartamento" name="idDepartamento">
                    <?=$optionsDepartamento?>
                  </select>
                </div>
              </div>
              <br><br>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" class="btn btn-warning" onclick="editar(<?=$id?>);" name="submit" id="submit">
                    <i class="fa fa-save"></i> Guardar
                  </button>
                  <button type="button" class="btn btn-info" onclick="cerrar_modal();" id="salir">
                    <i class="fa fa-mail-reply"></i> Cerrar
                  </button>
                </div>
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

<?php } ?>
