<?php
 include('basededatos.php');
 $bd = new basedatos();
 $query = "SELECT id, lado1,lado2,lado3 FROM  triangulop";
 $bd->PrepararLectura($query);

 $vista = file_get_contents('..\HTML\vistaTablaTrianguloP.html');
 $remplazar = "";

 while (($registros = $bd->TraeRegistroARegistro()) != null) {

    $id = $registros['id'];
    $lado1 = $registros['lado1'];
    $lado2 = $registros['lado2'];
    $lado3 = $registros['lado3'];
    

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
         '. $lado3 .' 
         </td>

         <td>
            <a href="Calcula_Triangulo_perimetro.php?lado1='.$lado1.'&lado2='.$lado2.'&lado3='.$lado3.'">
               <button class="btn btn-primary" type="submit">Calcular con estos valores</button>
            </a>
         </td>

         <td>
         <a href="borraRegistrosTrianguloP.php?id='.$id.'">
            <button class="btn btn-primary" type="submit">Borrar registro</button>
            </a>   
         </td>

      </tr>   
    ';
 }
 $imprimirVista = str_replace('{tabla}', $remplazar, $vista);
 echo $imprimirVista;