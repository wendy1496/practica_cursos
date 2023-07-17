<?php  
  include_once "header.php"
?>
<?php
include_once './../controlador/conexion.php';
  $con=new Conexion();
  $con=$con->conectar();                            
          ?>
<div class="container">
    <h3 class="my-4">Crear curso</h3>
    <form class="form-signin" action="./../controlador/editar_curso.php" method="POST">   
    <?php
              if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
              ?>
                <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                  <p>Se actualizó el curso correctamente</p>
                </div>
              <?php
              }
              ?>
    <div class="row">
        <div class="col-4">
        <?php
            
            if($con){  
              $relacion = $_GET['relacion'];  
              $sql="SELECT d.cedula, d.nombre_docente, c.nombre, c.duracion, c.descripcion, c.precio, c.fecha, c.id_curso, r.id_relacion FROM tbl_docentes d INNER JOIN tbl_relacion r ON r.cedula = d.cedula INNER JOIN tbl_cursos c ON c.id_curso = r.id_curso where r.id_relacion = '$relacion'";  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              if ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                       
              ?>
        </div>
        <div class="col-4">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Código del curso</label>
            <input type="text" class="form-control" id="curso" value="<?php echo $fila['id_curso'] ?>" name="codigo">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nombre del curso</label>
            <input type="text" class="form-control" id="curso" value="<?php echo $fila['nombre'] ?>" name="nombreCurso">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" rows="3" name="descripcion"><?php echo $fila['descripcion'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Duración</label>
            <input type="number" class="form-control w-90" id="correo" value="<?php echo $fila['duracion'] ?>" name="duracion">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Precio</label>
            <input type="" class="form-control w-90" id="correo" value="<?php echo $fila['precio'] ?>" name="precio">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Fecha</label>
            <input type="date" class="form-control w-90" id="fecha" value="<?php echo $fila['fecha'] ?>" name="fecha">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Docente</label>
            <select class="form-select" aria-label="Default select example" name="docente">              
              <option value="<?php echo $fila['cedula'] ?>"><?php echo $fila['nombre_docente'] ?></option>
              <?php
                } 
                $sql2="SELECT * FROM tbl_docentes";  
              $consulta2=$con->prepare($sql2);
              $consulta2->execute();  
              while ($fila2=$consulta2->fetch(PDO::FETCH_ASSOC)){                       
              
          ?>
              <option value="<?php echo $fila2['cedula'] ?>"><?php echo $fila2['nombre_docente'] ?></option>
              <?php
              }
            }
              ?>
            </select>
            <a class="mt-y" href="docentes.php">¿Desea agregar un docente nuevo?</a>

        </div>
        </div>
        <div class="col-3">

        </div>
        <div class="row">
        <div class="col-5"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-cesde my-4">Actualizar</button>
        </div>
        <div class="col-5"></div>
        </div>
    </div>
    </form>
</div>
<?php  
  include_once "footer.php"
?>