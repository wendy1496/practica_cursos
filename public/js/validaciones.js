let btn = document.getElementById('btn')
let codigo = document.getElementById('codigo')
let nombreCurso = document.getElementById('nombreCurso')
let descripcion = document.getElementById('descripcion')
let duracion = document.getElementById('duracion')
let fecha = document.getElementById('fecha')
let docente = document.getElementById('docente')
let precio = document.getElementById('precio')

precio.addEventListener('change',function(){
    let charCode =  /^[\d.,]+$/
  if (!charCode.test(precio.value)){
    alert("Formato incorrecto, ingrese solo números")
    precio.value = ""
  }
})

duracion.addEventListener('change',function(){
    let charCode =  /^[\d.,]+$/
  if (!charCode.test(duracion.value)){
    alert("Formato incorrecto, ingrese solo números")
    duracion.value = ""
  }
})

btn.addEventListener('click', function(){
    if(codigo.value == ''){
        alert("campo código vacío")
    }else if(nombreCurso.value  == '' ){
        alert("campo nombre del curso vacío")
    }else if(descripcion.value  == '' ){
        alert("campo descripción vacío")
    }else if(duracion.value  == '' ){
        alert("campo duración vacío")
    }
    else if(fecha.value  == '' ){
        alert("campo fecha vacío")
    }else if(docente.value  == '' ){
        alert("campo docente sin seleccionar")
    }else if(precio.value  == '' ){
        alert("campo precio vacío")
    }
})