<?php  
  include_once "header.php"
?>
<?php
include_once './../controlador/conexion.php';
  $con=new Conexion();
  $con=$con->conectar();                            
          ?>
<div class="container">
    <h3 class="my-4">Crear docente</h3>
    <form class="form-signin" action="./../controlador/crear_docente.php" method="POST">   
    <?php
              if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
              ?>
                <div class=" mb-2 mt-2 alert alert-success alert-dismissible fade show" role="alert">
                  <p>Se creó el docente correctamente</p>
                </div>
              <?php
              }
              ?>
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" id="docente" placeholder="Nombre del docente" name="nombreDocente" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Documento</label>
            <input type="text" class="form-control" id="cedula" placeholder="Documento de identificación" name="documento" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Correo</label>
            <input type="email" class="form-control" id="correo" placeholder="name@example.com" name="correo" required>
        </div>
        </div>
        <div class="col-3">

        </div>
        <div class="row">
        <div class="col-5"></div>
        <div class="col-2">
            <button type="submit" class="btn btn-cesde my-4">Guardar</button>
        </div>
        <div class="col-5"></div>
        </div>
    </div>
    </form>
    <hr>
    <div class="my-2">
        <h4>Listado de docentes creados</h4>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
           
                <tr>
                  <th>Nombre</th>
                  <th>Cédula</th>
                  <th>Correo</th>
                </tr>
            </thead>
            <tbody>
            <?php
            
            if($con){      
              $sql="SELECT * FROM tbl_docentes";  
              $consulta=$con->prepare($sql);
              $consulta->execute();  
              while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){                       
              ?>
                <tr>
                  <td><?php echo $fila['nombre_docente'] ?></td>
                  <td><?php echo $fila['cedula'] ?></td>
                  <td><?php echo $fila['correo'] ?></td>
                </tr>
                <?php
                }  
            }
          ?>
            </tbody>
            <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Cédula</th>
                  <th>Correo</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php  
  include_once "footer.php"
?>