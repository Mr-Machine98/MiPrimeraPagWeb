<?php

include('basededatos.php');
  //RECOGER DATOS DESDE LA VISTA DE LAS TABLAS
  if(isset($_GET['base']) and isset($_GET['altura']) ){ // Si ha creado la variable lado guardela en dato 
    $base = $_GET['base'];
    $altura = $_GET['altura'];
} else{
    //VARIABLES: RECOGER DATOS DESDE HTML
    
$base = $_POST['Baset'];
$altura = $_POST['Alturat'];// de lo contrario coja el dato  post
}

//LLEVAR EL REGISTRO DEL USUARIO
$bd = new basedatos();
//query
$sentencia ="INSERT INTO trianguloa(base,altura)VALUES(". $base . "," . $altura . ")";
$bd->PrepararEscrituraCuadrado($sentencia,$base,$altura);


$areatriangulo = ($base * $altura) / 2;

$pagRespuesta = file_get_contents('..\HTML\respuestaCalculoATriangulo.html');
$x = str_replace('{respuestaAreatriangulo}',$areatriangulo ,$pagRespuesta);





if (is_numeric($base) and  is_numeric($altura) ) {
        
  if ($base and $altura > 0) {
      echo $x;
  } else {

      echo "<script> alert('Ingresa un número mayor a cero.');window.location.href='http://localhost/corte3/proyecto2/index.html';
      </script>";
  }
  

} else {

  echo "<script> alert('Ingrese números reales');window.location.href='http://localhost/corte3/proyecto2/index.html';
  </script>";
  
}



?>