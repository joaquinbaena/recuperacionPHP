<?php
    include 'arrays.php';
    $comunidadAutonoma = array_rand($aComunidades);
    if(isset($_POST['enviar'])){
        $procesaFormulario = true;
        $comunidadAAcertar = $_POST['comunidad'];
        if(isset($_POST['provincia'])){
            $aProvinciasSeleccionadas = $_POST['provincia'];
            $aciertos = 0;
            $fallos = 0;
            foreach($aProvinciasSeleccionadas as $pronvinciaSelect){
                if(in_array($pronvinciaSelect, $aComunidades[$comunidadAAcertar])){
                    $aciertos++;
                }else{
                    $fallos++;
                }
            }
        }else{
            $procesaFormulario = false;
            $error = "No has seleccionado ninguna provincia";
        }
    }else{
        $procesaFormulario = false;
    }
    
    if(isset($_POST['verRespuesta'])){
        $procesaRespuesta = true;
        $comunidadAutonoma = $_POST['comunidad'];
        $aRespuesta = $aComunidades[$comunidadAutonoma];
        $respuestas = "";
        foreach($aRespuesta as $provincia){
            $respuestas .= ", ".$provincia;
        }
        $respuestas = substr($respuestas, 2);
    }else{
        $procesaRespuesta = false;
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <h1>Provincias de una comunidad autonoma</h1>
    <form method="post">
        <label for="comunidad">Selecciona las provincias de la comunidad autonoma de <?php echo "$comunidadAutonoma" ?>:</label>
        <?php
            echo "<input type='hidden' name='comunidad' value='$comunidadAutonoma'></hidden>";
            foreach ($aComunidades as $comunidad) {
                foreach ($comunidad as $provincias) {
                    echo "<br><input type='checkbox' name='provincia[]' value='$provincias'>$provincias";
                }
            }
        ?>
        <p><input type="submit" value="Enviar" name="enviar">
        <input type="submit" value="Ver Respuesta" name="verRespuesta"></p>
    </form>
        <?php
            if($procesaFormulario){
                echo "<p>Has obtenido $aciertos aciertos y $fallos fallos</p>";
            }
            
            if($procesaRespuesta){
                echo "<p>Las provincias de $comunidadAutonoma son: $respuestas</p>";
            }

            if(isset($error)){
                echo "<p>$error</p>";
            }
        ?>
</body>
</html>