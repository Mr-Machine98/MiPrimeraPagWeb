<?php

    include('basededatos.php');
    $bd = new basedatos();
    $query = "SELECT id, a, b, c, d, e FROM ecuacion";
    $bd->PrepararLectura($query);

    $vista = file_get_contents('..\HTML\vistaTablaEcuacion.html');
    $remplazar = "";


    while (($registros = $bd->TraeRegistroARegistro()) != null) {
        $id = $registros['id'];
        $a = $registros['a'];
        $b = $registros['b'];
        $c = $registros['c'];
        $d = $registros['d'];
        $e = $registros['e'];

        $remplazar .= '
            <tr>
                <td>
                    '.$id.'
                </td>
                <td> 
                    '. $a .' 
                </td>

                <td> 
                    '. $b .' 
                </td>

                <td> 
                    '. $c .' 
                </td>

                <td> 
                    '. $d .' 
                </td>

                <td> 
                    '. $e .' 
                </td>

                <td>
                    <a href="logicaEcuacion.php?A='.$a.'&B='.$b.'&C='.$c.'&D='.$d.'&E='.$e.'">
                        <button class="btn btn-primary" type="submit">Calcular con estos valores</button>
                    </a>
                </td>

                <td>
                    <a href="borrarRegistrosEcuacion.php?id='.$id.'">
                    <button class="btn btn-primary" type="submit">Borrar registro</button>
                    </a>   
                </td>

            </tr>   
        ';
    }

    $imprimirVista = str_replace('{tabla}', $remplazar, $vista);
    echo $imprimirVista;










