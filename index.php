<!-- Importando modulos. -->
<?php include('db.php') ?>
<?php include('includes/header.php') ?>
<div class="container">
   <div class="row">
     <div class="col-md-12 mt-4">
       <?php if(isset($_SESSION['mensaje'])) {?>
          <div class="alert alert-<?= $_SESSION['mensaje_tipo'];?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['mensaje'] ?>
            <button type="button" name="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
       <?php session_unset(); }?>
       <div class="card card-body">
         <form class="" action="save.php" method="post">
           <div class="form-group">
             <input type="text" name="titulo" class="form-control" placeholder="Escribe tu tarea" autofocus>
             </div>
              <div class="form-group">
                <textarea name="descripcion" class="form-control" placeholder="Describe tu tarea"></textarea>
              </div>
              <input type="submit" name="enviar" value="ENVIAR" class="btn btn-success btn-block">

         </form>
       </div>
     </div>

   </div>
   <div class="col-md-12 mt-4">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Accion</th>

          </tr>
        </thead>
        <tbody>
          <?php
          $consulta_tabla = "Select * FROM tareas";
          $resultados_tabla = mysqli_query($conexion,$consulta_tabla);
          while($row = mysqli_fetch_array($resultados_tabla)) { ?>
            <tr>
              <td> <?php echo $row['id'] ?> </td>
              <td> <?php echo $row['titulo'] ?> </td>
              <td> <?php echo $row['descripcion'] ?> </td>
              <td> <?php echo $row['fecha'] ?> </td>
              <td>
                <a href="edit.php?id=<?php echo $row[id]?>" class="btn btn-info"><i class="fas fa-marker"></i></a>
              </td>
              <td>
                <a href="delete.php?id=<?php echo $row[id]?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>

          <?php } ?>
        </tbody>
      </table>
   </div>
</div>

<?php include('includes/footer.php')?>
