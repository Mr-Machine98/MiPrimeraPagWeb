<?php
 include('basededatos.php');
 $bd = new basedatos();
 $query = "SELECT * FROM cubo";
 $bd->PrepararLectura($query);

 $vista = file_get_contents('..\HTML\vistaTablaCubo.html');
 $remplazar = "";

 while (($registros = $bd->TraeRegistroARegistro()) != null) {

    $id = $registros['id'];
    $lado = $registros['lado'];



    $remplazar .= '
      <tr>
         <td>
            '.$id.'
         </td>
         
         <td> 
            '. $lado .' 
         </td>

         <td>
            <a href="Calcula_3D_cubo.php?lado='.$lado.'">
               <button class="btn btn-primary" type="submit">Calcular con estos valores</button>
            </a>
         </td>

         <td>
            <a href="borrarRegistrosCubo.php?id='.$id.'">
            <button class="btn btn-primary" type="submit">Borrar registro</button>
            </a>   
         </td>

      </tr>   
    ';
 }
 $imprimirVista = str_replace('{tabla}', $remplazar, $vista);
 echo $imprimirVista;

 