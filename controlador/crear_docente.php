<?php
include_once "conexion.php";
session_start();
$nombreDocente= $_REQUEST['nombreDocente'];
$documento= $_REQUEST['documento'];
$correo= $_REQUEST['correo'];

$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $sql="INSERT INTO  `tbl_docentes` (`cedula`, `nombre_docente`, `correo`)
      VALUES ('$documento', '$nombreDocente', '$correo') ";  
      $consulta=$con->prepare($sql);
      $consulta->execute();
          
          header('Location: ../vistas/docentes.php?mensaje=registrado');
         
}