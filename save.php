<?php

include('db.php');

  if($_POST['enviar']==true){
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];


    $consulta = "INSERT INTO tareas (titulo, descripcion) VALUES ('$titulo', '$descripcion')";
    $resultado = mysqli_query($conexion,$consulta);
    if($resultado==false){
      die('Fallo en consulta');
    }
    $_SESSION['mensaje'] = 'Tarea guardada exitosamente!';
    $_SESSION['mensaje_tipo'] = 'success';
    header('location:index.php');
  }else{
    echo "error";
  }
 ?>
