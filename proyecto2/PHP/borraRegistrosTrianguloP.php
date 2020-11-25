<?php
    // IMPORTAMOS LA BASE DE DATOS
    include('basededatos.php');

    //ID QUE LLEGA PARA BORRA EL REGISTRO
    $id = $_GET['id'];

    //BORRA EL REGISTRO
    $bd = new basedatos();
    $query = "DELETE FROM trianguloP WHERE id = :id";
    $bd->borraEsteRegistro($query, $id);

    //MENSAJE DE QUE BORRO EL REGISTRO
    echo "<script> 
                alert('Ha borrado el registro número #" . $id . ".');
                window.location.href='http://localhost/corte3/proyecto2/PHP/mostrarRegistrosTrianguloP.php';
         </script>";

?>



