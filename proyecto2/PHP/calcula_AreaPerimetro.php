<?php
    include('basededatos.php');

    //RECOGER DATOS DESDE LA VISTA DE LAS TABLAS
    if(isset($_GET['lado'])){ // Si ha creado la variable lado guardela en dato 
        $dato = $_GET['lado'];
    } else{
        //VARIABLES: RECOGER DATOS DESDE HTML
        $dato = $_POST['caja_ingresa_magn_cuadrado'];// de lo contrario coja el dato  post
    }
    
    //LLEVAR EL REGISTRO DEL USUARIO
    $bd = new basedatos();
    //query
    $sentencia ="INSERT INTO cuadrado(lado1,lado2) VALUES(:l1,:l2)";
    $bd->PrepararEscrituraCuadrado($sentencia,$dato,$dato);


    //Cálculo de área
    $area = pow($dato, 2);
    //Cálculo de perimetro
    $perimetro = 4 * $dato;


    //recibe la pag
    $pagRespuesta = file_get_contents('..\HTML\respuestaCalculoPerimetroCuadrado.html');

    $r = str_replace('{respuestaArea}',$area ,$pagRespuesta);
    $r = str_replace('{respuestaPerimetro}',$perimetro , $r);


    if (is_numeric($dato)) {
        
        if ($dato > 0) {
            echo $r;
        } else {

            echo "<script> alert('Ingresa un número mayor a cero.');window.location.href='http://localhost/corte3/proyecto2/index.html';
            </script>";
        }
        

    } else {

        echo "<script> alert('Ingrese números reales');window.location.href='http://localhost/corte3/proyecto2/index.html';
        </script>";
        
    }
    

   










