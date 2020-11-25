<?php
include('basededatos.php');


if ( isset($_GET['A']) && isset($_GET['B']) && isset($_GET['C']) && isset($_GET['D']) && isset($_GET['E'])) {
    $a = $_GET['A'];

    $b = $_GET['B'];

    $c = $_GET['C'];

    $d = $_GET['D'];

    $e = $_GET['E'];

} else {

    $a = $_POST['caja_a'];

    $b = $_POST['caja_b'];

    $c = $_POST['caja_c'];

    $d = $_POST['caja_d'];

    $e = $_POST['caja_e'];

}
//LLEVAR EL REGISTRO DEL USUARIO
$bd = new basedatos();
//query
$sentencia ="INSERT INTO ecuacion(a,b,c,d,e) VALUES(:a,:b,:c,:d,:e)";
$bd->PrepararEscrituraEcuacion($sentencia, $a, $b, $c, $d, $e);





if (is_numeric($a) and is_numeric($b) and is_numeric($c) and is_numeric($d) and is_numeric($e)) {


    if (($a - $b + $c) < 0) {


        $error = "Raíz cuadrada de número negativo.";
        $pagRespuesta = file_get_contents('..\HTML\respuestaCalculoEcua.html');
        $respuesta = str_replace('{r}', $error, $pagRespuesta);
        echo $respuesta;
    } else if (($c + $b * $a) < 0) {


        $error = "Raíz cuadrada de número negativo.";
        $pagRespuesta = file_get_contents('..\HTML\respuestaCalculoEcua.html');
        $respuesta = str_replace('{r}', $error, $pagRespuesta);
        echo $respuesta;
    } else if (sqrt($a - $b + $c) * sqrt($c + $b * $a) == 0) {

        $error = "División entre cero.";
        $pagRespuesta = file_get_contents('..\HTML\respuestaCalculoEcua.html');
        $respuesta = str_replace('{r}', $error, $pagRespuesta);
        echo $respuesta;
    } else if (($b - $c - $a) > 1 || ($b - $c - $a) < -1) {

        $error = "Arcocoseno por fuera del rango.";
        $pagRespuesta = file_get_contents('..\HTML\respuestaCalculoEcua.html');
        $respuesta = str_replace('{r}', $error, $pagRespuesta);
        echo $respuesta;
    } else if (($a - $e - $d) > 1 || ($a - $e - $d) < -1) {

        $error = "Arcoseno por fuera del rango.";
        $pagRespuesta = file_get_contents('..\HTML\respuestaCalculoEcua.html');
        $respuesta = str_replace('{r}', $error, $pagRespuesta);
        echo $respuesta;
    } else if (($e * $d * $c) > 1 || ($e * $d * $c) < -1) {

        $error = "Arcocoseno por fuera del rango.";
        $pagRespuesta = file_get_contents('..\HTML\respuestaCalculoEcua.html');
        $respuesta = str_replace('{r}', $error, $pagRespuesta);
        echo $respuesta;
    } else if (($c * $e * $d) > 1 || ($c * $e * $d) < -1) {
        $error = "Arcoseno por fuera del rango.";
        $pagRespuesta = file_get_contents('..\HTML\respuestaCalculoEcua.html');
        $respuesta = str_replace('{r}', $error, $pagRespuesta);
        echo $respuesta;
    } else {
        $r = (((acos($b - $c - $a) * asin($a - $e - $d)) / 1) + ((acos($e * $d * $c) * asin($c * $e * $d)) / 1)) / ((sqrt($a - $b + $c)) * (sqrt($c + $b * $a)));

        $pagRespuesta = file_get_contents('..\HTML\respuestaCalculoEcua.html');

        $respuesta = str_replace('{r}', $r, $pagRespuesta);

        $cadena = '(((arcos(' . $b . '-' . $c . '-' . $a . ') * arcsin(' . $a . '-' . $e .  '-' . $d  . ')) / 1) +((arcos(' .  $e . '*' . $d . '*' . $c .  ')*arcsin(' .  $c . '*' .  $e . '*' . $d  . '))) / 1)) / ((sqrt(' . $a . '-' . $b . '+' . $c . '))*(sqrt(' . $c . '+' . $b . '*' . $a  . ')))';

        $respuesta = str_replace('{cadena}', $cadena, $respuesta);
        echo $respuesta;
    }
} else {
    $error = "Por favor ingresa números reales.";
    $pagRespuesta = file_get_contents('..\HTML\respuestaCalculoEcua.html');
    $respuesta = str_replace('{r}', $error, $pagRespuesta);
    echo $respuesta;
}
