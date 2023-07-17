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
$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="INSERT INTO  `tbl_cursos` (`id_curso`, `nombre`, `descripcion`, `duracion`, `precio`, `fecha`)
      VALUES ('$id_curso','$nombreCurso', '$descripcion', '$duracion','$precio','$fecha') ";  
      $consulta=$con->prepare($sql);
      $consulta->execute();

          
      $sql2="INSERT INTO `tbl_relacion`(`id_curso`, `cedula`) 
      VALUES ('$id_curso', '$docente')";  
              $consulta2=$con->prepare($sql2);
              $consulta2->execute();  

          header('Location: ../vistas/cursos.php?mensaje=registrado');
         
}