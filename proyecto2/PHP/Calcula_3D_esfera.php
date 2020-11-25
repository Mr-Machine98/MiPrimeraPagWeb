<?php
include('basededatos.php');

//RECOGER DATOS DESDE LA VISTA DE LAS TABLAS
if(isset($_GET['radio'])){ // Si ha creado la variable lado guardela en dato 
$radio = $_GET['radio'];
} else{
//VARIABLES: RECOGER DATOS DESDE HTML
$radio = $_POST['areaes'];// de lo contrario coja el dato  post
    }

//LLEVAR EL REGISTRO DEL USUARIO
$bd = new basedatos();
//query
$sentencia ="INSERT INTO esfera(radio) VALUES(". $radio . ")";
$bd->PrepararEscrituraEsfera($sentencia,$radio);





$areaesfera = pow($radio,2) * 4 * pi();
$volumenes = 4/3 * pi() * pow($radio,3);
$pagRespuesta = file_get_contents('..\HTML\respuesta3D_ESFERA.html');
$x2 = str_replace('{areaes}',$areaesfera ,$pagRespuesta);
$x2 = str_replace('{volumenes}',$volumenes , $x2 );



 if (is_numeric($radio)){
  if($radio > 0){
    echo $x2;

  }else{
   echo "<script> alert('Ingrese numeros reales');window.location.href='http://localhost/corte3/proyecto2/index.html';
   </script>"; 
  }

 
 }else{
   echo "<script> alert('Ingrese numeros reales');window.location.href='http://localhost/corte3/proyecto2/index.html';
   </script>"; 
 } 





?>