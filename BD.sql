create database bd_cursos;
use bd_cursos;

create table tbl_docentes(
cedula varchar(12) primary key, 
nombre_docente varchar(50),
correo varchar(50)
);

create table tbl_cursos(
id_curso varchar(12) primary key, 
nombre varchar(50),
descripcion text,
duracion int,
precio double,
fecha date
);

create table tbl_relacion(
id_relacion int AUTO_INCREMENT primary key, 
id_curso varchar(12),
cedula varchar(12),
foreign key(id_curso) references tbl_cursos(id_curso),
foreign key(cedula) references tbl_docentes(cedula)
);