<?php
//Longitud del tablero
DEFINE("TAMANIOTABLERO", 10);
//Array que contiene los datos de la tabla
$aTablero = array();
//Dirección que va a tomar la palabra: = igual, + suma y - resta
$direccion = array("+", "-", "=");
$rowDirection = "";
$columnDirection = "";
$sameLetter = false;

//Array de palabras
$capitales = array("MADRID", "LONDRES", "PARIS", "BERLIN", "ROMA");
$abcdario = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "Ñ", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
$capitalesLenght = count($capitales);
//Array que rellenaremos con los datos de cada palabra una vez colocadas y que usaremos para una comprobación final
$aDatosCapitales = array();
//array_push($capitales, array("Nombre"=>"MADRID"));

//Contiene la palabra que se vaya a colocar en ese momento. Cada letra ocupa una posición del array
$lettersArray = array();

//Contiene coordenadas de primera y última letra
$firstLR = "";
$firstLC = "";
$lastLR = "";
$lastLC = "";
$row = "";
$column = "";
$wordSet = true;
//Indica cuando se ha colocado una palabra y poder pasar a la siguiente
$wordSet = false;
$letterChecked = "";
$comprobarPalabra = "";

//Array inicial que cargamos con valor 0
for ($i = 0; $i < TAMANIOTABLERO; $i++) {
    for ($j = 0; $j < TAMANIOTABLERO; $j++) {
        $aTablero[$i][$j] = "0";
    }
}

//Por cada capital del array, realizamos el mismo proceso
foreach ($capitales as $key => $capitalName) {

    //Extrae la palabra del array y la separa en letras dentro de un nuevo array
    $lettersArray = str_split($capitalName);

    //Mientras no se comprueba que la palabra se puede colocar, genera posiciones aleatorias
    do {
        //Comienza en 0 hasta que comprobemos que cabe
        $comprobarPalabra = true;

        //Creamos fila y columna inicial para la primera letra de palabra actual
        $firstLR = rand(0, (TAMANIOTABLERO - 1));
        // echo ("$firstLR lr<br>");
        $firstLC = rand(0, (TAMANIOTABLERO - 1));
        // echo ("$firstLC lc<br>");

        //Según la dirección de la línea, calculamos la posición de la línea de la última letra.
        //Controlamos que no se salga del tablero generando números hasta que cuadre
        do {
            $rowDirection = $direccion[rand(0, 2)];
            //echo "<br>Dirección  de la fila => " . $rowDirection;
            switch ($rowDirection) {
                case '+':
                    $lastLR = $firstLR + (count(
                        $lettersArray
                    ) - 1);
                    break;
                case '-':
                    $lastLR = $firstLR - (count(
                        $lettersArray
                    ) - 1);
                    break;
                case '=':
                    $lastLR = $firstLR;
                    break;
            }
        } while ($lastLR > TAMANIOTABLERO - 1 || $lastLR < 0);

        //Según la dirección de la columna, calculamos la posición de columna de la última letra
        //Controlamos que no se salga del tablero generando números hasta que cuadre
        do {

            //Verificamos que al menos una coordenada se desplaza. Las dos no pueden ser =
            do {
                $columnDirection = $direccion[rand(0, 2)];
            } while ($columnDirection == "=" && $rowDirection == "=");
            //echo "<br>Direction  de la columna => " . $columnDirection;

            switch ($columnDirection) {
                case '+':
                    $lastLC = $firstLC + (count(
                        $lettersArray
                    ) - 1);
                    break;
                case '-':
                    $lastLC = $firstLC - (count(
                        $lettersArray
                    ) - 1);
                    break;
                case '=':
                    $lastLC = $firstLC;
                    break;
            }
        } while ($lastLC > TAMANIOTABLERO - 1 || $lastLC < 0);

        //Cargamos datos de capital y coordenadas en el array de verificación
        $aDatosCapitales = array("nombre" => $capitalName, "empieza" => $firstLR . $firstLC, "acaba" => $lastLR . $lastLC);


        //Cargamos estas variables con la posición de la letra incial y 
        //las usaremos como índices para recorrer el array donde ya hay colocadas capitales
        $row = $firstLR;
        $column = $firstLC;

        //Si una letra no se puede colocar, vuelve al inicio a generar nuevas coordenadas
        foreach ($lettersArray as $key => $letter) {

            //$aTablero[$row][$column] =  $letter;

            //Si hay letra, comprobamos si es la misma. Siempre inicia en false
            $sameLetter = false;
            // echo ("$row row<br>");
            // echo ("$column column<br>");
            // var_dump($row);
            // var_dump($column);
            if ($aTablero[$row][$column] == $letter) {
                $sameLetter = true;
            }

            //Si el contenido es diferente 0 y la letra también, no se puede colocar
            if (($aTablero[$row][$column] != "0") && !$sameLetter) {
                $comprobarPalabra = false;
            }

            //Comprobamos la dirección para saber si tenemos que sumar, restar o dejar igual las coordenadas
            if ($rowDirection == "+") {
                $row = $row + 1;
            } else if ($rowDirection == "-") {
                $row = $row - 1;
            }

            if ($columnDirection == "+") {
                $column = $column + 1;
            } else if ($columnDirection == "-") {
                $column = $column - 1;
            }
        }
    } while (!$comprobarPalabra); //Sale cuando la palabra se ha comprobado. 

    //Recorro la palabra comprobada y colocamos
    $row = $firstLR;
    $column = $firstLC;
    foreach ($lettersArray as $key => $letter) {

        $aTablero[$row][$column] =  $letter;
        //Comprobamos la dirección para saber si tenemos que sumar, restar o dejar igual las coordenadas
        if ($rowDirection == "+") {
            $row = $row + 1;
        } else if ($rowDirection == "-") {
            $row = $row - 1;
        }

        if ($columnDirection == "+") {
            $column = $column + 1;
        } else if ($columnDirection == "-") {
            $column = $column - 1;
        }
    }
} //Vuelve al foreach a por la siguiente palabra

?>

<!--Muestra tablero interno-->
<!DOCTYPE HTML>
<html lang='es'>

<head>
    <title>Sopa de letras</title>
</head>

<body>
    <h1>Sopa de Letras</h1>
    <h2>Encuentra cinco capitales.</h2>
<div id='container'>
    <table>
    <?php
        for ($i = 0; $i < TAMANIOTABLERO; $i++) {
            //echo "<br><br>";
            echo "<tr>";
            for ($j = 0; $j < TAMANIOTABLERO; $j++) {
                if ($aTablero[$i][$j] != 0) {
                    echo "<td style='color:red'>" . $aTablero[$i][$j] . "</td>";
                } else {
                    echo "<td>" . $aTablero[$i][$j] = $abcdario[rand(0, count($abcdario) - 1)] . "</td>";
                }
            }
            echo "</tr>";
        }
    
    ?>
    </table>
</div>
</body>

</html>