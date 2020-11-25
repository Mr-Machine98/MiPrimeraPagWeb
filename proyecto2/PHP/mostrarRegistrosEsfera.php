<?php
 include('basededatos.php');
 $bd = new basedatos();
 $query = "SELECT *  FROM esfera";
 $bd->PrepararLectura($query);

 $vista = file_get_contents('..\HTML\vistaTablaEsfera.html');
 $remplazar = "";

 while (($registros = $bd->TraeRegistroARegistro()) != null) {

    $id = $registros['id'];
    $radio = $registros['radio'];
   


    $remplazar .= '
      <tr>
         <td>
            '.$id.'
         </td>
         
         <td> 
            '. $radio .' 
         </td>

        
         <td>
            <a href="calcula_3D_esfera.php?radio='.$radio.'">
               <button class="btn btn-primary" type="submit">Calcular con estos valores</button>
            </a>
         </td>

         <td>
            <a href="borrarRegistrosEsfera.php?id='.$id.'">
            <button class="btn btn-primary" type="submit">Borrar registro</button>
            </a>   
         </td>

      </tr>   
    ';
 }
 $imprimirVista = str_replace('{tabla}', $remplazar, $vista);
 echo $imprimirVista;

 