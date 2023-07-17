<?php
include_once "conexion.php";
session_start();
$codigo= $_GET['codigo'];
$relacion= $_GET['relacion'];

$con=new Conexion();
  $con=$con->conectar();
    if($con){ 
      $idioma_id= $_GET['idioma_id'];
      $cedula= $_GET['cedula'];
      $sql="DELETE FROM `tbl_relacion` WHERE id_relacion = '$relacion'";  
          $consulta=$con->prepare($sql);
          $consulta->execute(); 
          
          $sql2="DELETE FROM `tbl_cursos`  WHERE id_curso = '$codigo'";  
          $consulta2=$con->prepare($sql2);
          $consulta2->execute();
          header('Location: ../vistas/cursos.php?');             
         
}
