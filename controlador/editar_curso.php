<?php
include_once "conexion.php";
session_start();
$nombreCurso= $_REQUEST['nombreCurso'];
$descripcion= $_REQUEST['descripcion'];
$duracion= $_REQUEST['duracion'];
$precio= $_REQUEST['precio'];
$fecha= $_REQUEST['fecha'];
$docente= $_REQUEST['docente'];
$id_curso = $_REQUEST['codigo'];
$relacion = $_REQUEST['relacion'];
$cedula = $_REQUEST['cedula'];

$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="UPDATE `tbl_cursos` SET `nombre`='$nombreCurso',`descripcion`='$descripcion',`duracion`='$duracion',`precio`='$precio',`fecha`='$fecha' 
      WHERE `id_curso`='$id_curso'";  
      $consulta=$con->prepare($sql);
      $consulta->execute();

          
      $sql2="UPDATE `tbl_relacion` SET `id_curso`='$id_curso',`cedula`='$cedula' WHERE `id_relacion`='[value-1]'";  
              $consulta2=$con->prepare($sql2);
              $consulta2->execute();  

          header('Location: ../vistas/cursos.php?mensaje=editado');
         
}