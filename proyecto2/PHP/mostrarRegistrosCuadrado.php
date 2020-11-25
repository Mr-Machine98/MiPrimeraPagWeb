<?php
 include('basededatos.php');
 $bd = new basedatos();
 $query = "SELECT id, lado1, lado2 FROM cuadrado";
 $bd->PrepararLectura($query);

 $vista = file_get_contents('..\HTML\vistaTablaCuadrado.html');
 $remplazar = "";

 while (($registros = $bd->TraeRegistroARegistro()) != null) {

    $id = $registros['id'];
    $lado1 = $registros['lado1'];
    $lado2 = $registros['lado2'];


    /*
      OTRO MÉTODO DE HACER ESTO
    $remplazar .= '<tr>';
    $remplazar .= '<td>' . $id . '</td>';
    $remplazar .= '<td>' . $lado1 . '</td>';
    $remplazar .= '<td>' . $lado2 . '</td>';
    $remplazar .= '<td><form action="" method="POST"><button class="btn btn-primary" type="submit">Calcular con estos valores</button></form></td>';
    $remplazar .= '<td><form action="" method="POST"><button class="btn btn-primary" type="submit">Borrar registro</button></form></td></tr>'; */

    $remplazar .= '
      <tr>
         <td>
            '.$id.'
         </td>
         
         <td> 
            '. $lado1 .' 
         </td>

         <td> 
            '. $lado2 .' 
         </td>

         <td>
            <a href="calcula_AreaPerimetro.php?lado='.$lado1.'">
               <button class="btn btn-primary" type="submit">Calcular con estos valores</button>
            </a>
         </td>

         <td>
            <a href="borrarRegistrosCuadrado.php?id='.$id.'">
            <button class="btn btn-primary" type="submit">Borrar registro</button>
            </a>   
         </td>

      </tr>   
    ';
 }
 $imprimirVista = str_replace('{tabla}', $remplazar, $vista);
 echo $imprimirVista;

 