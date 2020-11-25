<?php
 include('basededatos.php');
 $bd = new basedatos();
 $query = "SELECT id, base, altura FROM  trianguloA";
 $bd->PrepararLectura($query);

 $vista = file_get_contents('..\HTML\vistaTablaTriangulo.html');
 $remplazar = "";

 while (($registros = $bd->TraeRegistroARegistro()) != null) {

    $id = $registros['id'];
    $base = $registros['base'];
    $altura = $registros['altura'];

    $remplazar .= '
      <tr>
         <td>
            '.$id.'
         </td>
         
         <td> 
            '. $base .' 
         </td>

         <td> 
            '. $altura .' 
         </td>

         <td>
            <a href="Calcula_Triangulo_area.php?base='.$base.'&altura='.$altura.'">
               <button class="btn btn-primary" type="submit">Calcular con estos valores</button>
            </a>
         </td>

         <td>
         <a href="borraRegistrosTrianguloA.php?id='.$id.'">
            <button class="btn btn-primary" type="submit">Borrar registro</button>
            </a>   
         </td>

      </tr>   
    ';
 }
 $imprimirVista = str_replace('{tabla}', $remplazar, $vista);
 echo $imprimirVista;