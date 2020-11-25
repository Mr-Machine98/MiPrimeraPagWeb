<?php


include('basededatos.php');
  //RECOGER DATOS DESDE LA VISTA DE LAS TABLAS
  if(isset($_GET['lado1']) and isset($_GET['lado2']) and isset($_GET['lado3']) ){ // Si ha creado la variable lado guardela en dato 
    $lado1 = $_GET['lado1'];
    $lado2 = $_GET['lado2'];
    $lado3 = $_GET['lado3'];
} else{
    //VARIABLES: RECOGER DATOS DESDE HTML
    $lado1 = $_POST['tlado1'];
    $lado2 = $_POST['tlado2'];
    $lado3 = $_POST['tlado3'];   
}
 
//LLEVAR EL REGISTRO DEL USUARIO
$bd = new basedatos();
//query
$sentencia ="INSERT INTO triangulop(lado1,lado2,lado3)VALUES(". $lado1 . "," . $lado2 . "," . $lado3 . ")";
$bd->PrepararEscrituraTriangulo($sentencia,$lado1,$lado2,$lado3);


$perimetrotriangulo = $lado1 + $lado2 + $lado3;



$pagRespuesta = file_get_contents('..\HTML\respuestaCalculoPTriangulo.html');



$x = str_replace('{respuestaPerimetrotriangulo}',$perimetrotriangulo , $pagRespuesta);


 if (is_numeric($lado1) and is_numeric($lado2) and is_numeric($lado3) ){
  echo $x;
  }else{
    echo "<script> alert('Ingrese numeros reales');window.location.href='http://localhost/corte3/proyecto2/index.html';
    </script>"; 
  } 
  


?>