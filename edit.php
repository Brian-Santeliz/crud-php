<?php
include('db.php');
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $consulta_editar = "SELECT * FROM tareas WHERE id = $id";
  $resultado_editar = mysqli_query($conexion,$consulta_editar);
  if(mysqli_num_rows($resultado_editar) == 1){
    $dato = mysqli_fetch_array($resultado_editar);
    $titulo = $dato['titulo'];
    $descripcion = $dato['descripcion'];

  }
}
if(isset($_POST['editar'])){
  $id = $_GET['id'];
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $consulta_actualizar = "UPDATE tareas set titulo='$titulo', descripcion='$descripcion' WHERE id = $id";
  mysqli_query($conexion,$consulta_actualizar);
  $_SESSION['mensaje'] =' Tarea Actualizada Exitosamente!';
  $_SESSION['mensaje_tipo'] = 'info';
  header('location:index.php');
}
 ?>

 <?php include('includes/header.php') ?>
    <div class="container p-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-body">
            <form  action="edit.php?id=<?php echo $id;?>" method="POST">
              <div class="form-group">
                <input class="form-control" type="text" name="titulo" value="<?php echo $titulo;?>"placeholder="Editar Titulo">
              </div>
              <div class="form-group">
                <textarea name="descripcion" class="form-control" placeholder="Editar Descripcion"><?php echo $descripcion;?></textarea>
              </div>
              <input type="submit" name="editar" class="btn btn-info btn-block" value="ACTUALIZAR">
            </form>
          </div>
        </div>
      </div>
    </div>
 <?php include('includes/footer.php')?>
