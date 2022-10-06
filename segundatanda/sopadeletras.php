<?php
    include "arrays.php";

    $aDireccion = ["N", "S", "E", "O"];
    // array de 5 capitales que no se repitan
    $capitales = array_rand(array_flip($aPaises), 5);
    $capitales = array_map('strtoupper', $capitales);
    // var_dump($capitales);
    
    for($capital = 0; $capital < 5; $capital++){
        do{
            $aCapital = str_split($capitales[$capital]);
            $fila = rand(0, 9);
            $columna = rand(0, 19);
            $direccion = $aDireccion[rand(0, 3)];
            $pasar = false;
            switch($direccion){
                case "N":
                case "S":
                    ($direccion == "N") ? $direc = -1 : $direc = 1;
                    $limiteV = $fila + (count($aCapital) * $direc);
                    if($limiteV < 9 && $limiteV > 0){
                        $pasar = true;
                        foreach($aCapital as $letra){
                            var_dump($tSopaLetras[$fila][$columna] != "*" || $tSopaLetras[$fila][$columna] != $letra);
                            if($tSopaLetras[$fila][$columna] != "*" || $tSopaLetras[$fila][$columna] != $letra){
                                $tSopaLetras[$fila][$columna] = $letra;
                                $fila += $direc;
                            }else{
                                echo "false";
                                $pasar = false;
                            }
                        }
                    }
                    break;
                case "E":
                case "O":
                    ($direccion == "O") ? $direc = -1 : $direc = 1;
                    $limiteH = $columna + (count($aCapital) * $direc);
                    if($limiteH < 19 && $limiteH > 0){
                        $pasar = true;
                        foreach($aCapital as $letra){
                            $tSopaLetras[$fila][$columna] = $letra;
                            $columna += $direc;
                        }
                    }
                    break;
                }
        }while(!$pasar);
   }

    echo "<table>";
    foreach($tSopaLetras as $fila){
        echo "<tr>";
        foreach($fila as $letra){
            echo "<td>".$letra."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";