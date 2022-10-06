<?php
    include "arrays.php";
    $aciertos = 0;
    $fallos = 0;
    if(isset($_POST['enviar'])){
        $procesaFormulario = true;
        $aRespuestas = $_POST['paises'];
        foreach($aPaises as $pais => $capital){
            ($aRespuestas[$pais] == $capital) ? $aciertos++ : $fallos++;
        }
    }else{
        $procesaFormulario = false;
    }

    if(isset($_POST['respuestas'])){
        $procesaRespuestas = true;
    }else{
        $procesaRespuestas = false;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <?php
            // generacion de formulario para que tengamos que introducir las capitales de los paises
            echo "<h1>Capitales de los paises</h1>";
            echo "<table border='2' halign='center'>";
            foreach($aPaises as $pais => $capital){
                echo "<tr><td>".$pais."</td><td><input type='text' name='paises[".$pais."]'></td></tr>";
            }
            echo "</table>";
            
        ?>
        <p>
            <input type="submit" value="Enviar" name="enviar">
            <input type="submit" value="Respuestas" name="respuestas">
        </p>
    </form>

    <?php
        if($procesaFormulario){
            echo "<h2>Resultados</h2>";
            echo "<p>Aciertos: ".$aciertos."</p>";
            echo "<p>Fallos: ".$fallos."</p>";
        }

        if($procesaRespuestas){
            echo "<h2>Respuestas</h2>";
            echo "<table border='2' halign='center'>";
            foreach($aPaises as $pais => $capital){
                echo "<tr><td>".$pais."</td><td>".$capital."</td></tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>