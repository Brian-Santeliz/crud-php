<?php

include('db.php');

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $consulta_eliminar = "DELETE FROM tareas WHERE id = $id";
  $eliminar = mysqli_query($conexion,$consulta_eliminar);

  if(!$eliminar){
    die('Fallo al eliminar');
  }
    $_SESSION['mensaje'] = 'Tarea Eliminada Exitosamente!';
    $_SESSION['mensaje_tipo'] = 'danger';
    header('location:index.php');
}

 ?>
