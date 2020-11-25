<?php
include('basededatos.php');
//RECOGER DATOS DESDE LA VISTA DE LAS TABLAS
if(isset($_GET['lado'])){ // Si ha creado la variable lado guardela en dato
  $ladocub = $_GET['lado'];
} else{
  //VARIABLES: RECOGER DATOS DESDE HTML
  $ladocub = $_POST['ladocub'];
}
//VARIABLES: RECOGER DATOS DE CUBO 
//LLEVAR EL REGISTRO DEL USUARIO
$bd = new basedatos();
//query
$sentencia ="INSERT INTO cubo(lado) VALUES(". $ladocub . ")";
$bd->PrepararEscrituraCubo($sentencia,$ladocub);

$areacubo = pow($ladocub, 2) * 6;
$volumencubo = pow($ladocub,3);
$pagRespuesta = file_get_contents('..\HTML\respuesta3D_CUBO.html');
$x = str_replace('{areacubo}',$areacubo ,$pagRespuesta);
$x = str_replace('{volumencubo}',$volumencubo , $x);



    
 if (is_numeric($ladocub)){
   if($ladocub > 0){
     echo $x;

   }else{
    echo "<script> alert('Ingrese numeros reales');window.location.href='http://localhost/corte3/proyecto2/index.html';
    </script>"; 
   }


  }else{
    echo "<script> alert('Ingrese numeros reales');window.location.href='http://localhost/corte3/proyecto2/index.html';
    </script>"; 
  } 




?>