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
    <form class="form-signin" action="./../controlador/crear_curso.php" method="POST">   
    <?php
              if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
              ?>
                <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                  <p>Se creó el curso correctamente</p>
                </div>
              <?php
              }
              ?>
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Código del curso</label>
            <input type="text" class="form-control" placeholder="Código del curso" id="codigo" name="codigo" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nombre del curso</label>
            <input type="text" class="form-control" id="nombreCurso" placeholder="Nombre del curso" name="nombreCurso" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" rows="3" name="descripcion" required></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Duración</label>
            <input type="number" class="form-control w-90" id="duracion" placeholder="Duración en semanas" name="duracion" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Precio</label>
            <input type="" class="form-control w-90" id="precio" placeholder="Precio" name="precio" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Fecha</label>
            <input type="date" class="form-control w-90" id="fecha" placeholder="Duración en semanas" name="fecha" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Docente</label>
            <select class="form-select" aria-label="Default select example" id="docente" name="docente" required>
              <option selected>Seleccione...</option>
              <?php
            
            if($con){      
              $sql="SELECT * FROM tbl_docentes";  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                       
              ?>
              <option value="<?php echo $fila['cedula'] ?>"><?php echo $fila['nombre_docente'] ?></option>
              <?php
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
            <button type="submit" class="btn btn-cesde my-4" id="btn">Guardar</button>
        </div>
        <div class="col-5"></div>
        </div>
    </div>
    </form>
    <hr>
    <div class="my-2">
        <h4>Listado de cursos</h4>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  <th>Nombre del curso</th>
                  <th>Duración</th>
                  <th>Fecha de inicio</th>
                  <th>Docente asignado</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php     
              $sql2="SELECT d.cedula, d.nombre_docente, c.nombre, c.duracion, c.fecha, c.id_curso, r.id_relacion FROM tbl_docentes d INNER JOIN tbl_relacion r ON r.cedula = d.cedula INNER JOIN tbl_cursos c ON c.id_curso = r.id_curso ORDER BY c.fecha ASC ";  
              $consulta2=$con->prepare($sql2);
              $consulta2->execute();  
              while ($fila2=$consulta2->fetch(PDO::FETCH_ASSOC)){ 
                $codigo = $fila2['id_curso'];
                $id_relacion = $fila2['id_relacion'];         
              ?>
                <tr>
                  <td><?php echo $fila2['nombre'] ?></td>
                  <td><?php echo $fila2['duracion'] ?></td>
                  <td><?php echo $fila2['fecha'] ?></td>
                  <td><?php echo $fila2['nombre_docente'] ?></td>
                  <td><a class="btn btn-success" href="editar_curso.php?relacion=<?php echo $id_relacion ?>"><i class="fas fa-edit"></i></a></td>
                  <td><a class="btn btn-danger" href="./../controlador/eliminar_curso.php?codigo=<?php echo $codigo ?>&relacion=<?php echo $id_relacion ?>"><i class="far fa-trash-alt"></a></i></td>
                </tr>
                <?php
                }  
            }
          ?>
            </tbody>
            <tfoot>
                <tr>
                <th>Nombre del curso</th>
                  <th>Duración</th>
                  <th>Fecha de inicio</th>
                  <th>Docente asignado</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
            </tfoot>
        </table>
    </div>
<script src="./../public/js/validaciones.js"></script>

</div>
<?php  
  include_once "footer.php"
?>