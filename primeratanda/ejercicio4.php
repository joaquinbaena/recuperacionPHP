<?php
    if(isset($_POST['enviar'])){
        $procesaFormulario = true;
        $items = array();
        $ganadores = "";

        for($i = 0; $i < 10; $i++){
            if(isset($_POST["item".($i + 1).""])){
                $items["item".($i + 1).""] = $_POST["item".($i + 1).""];
            }
        }
        if(!empty($items)){
            $mayorPuntuacion = max($items);
    
            foreach($items as $key=> $value){
                if($mayorPuntuacion == $value){
                    $ganadores .= ", $key";
                }
            }
            
            $ganadores = substr($ganadores,2);
        }else{
            $procesaFormulario = false;
            $msgError = "<p>Debes marcar almenos un valor para un Item</p>";
        }
    }else{
        $procesaFormulario = false;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <style>
        table{
            text-align: center;
        }    
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <h1>Votacion de items</h1>
    <form method="post">
        <table>
            <tr>
                <td></td>
                <td>1 punto</td>
                <td>2 puntos</td>
                <td>3 puntos</td>
                <td>4 puntos</td>
                <td>5 puntos</td>
            </tr>
        <?php
            for($i = 0; $i < 10; $i++){
                echo "<tr><td>Item ".($i+1)."</td>";
                for($j = 0; $j < 5; $j++){
                    echo "<td><input type='radio' name='item".($i + 1)."' value='".($j + 1)."'></td>";
                }
                echo "</tr>";
            }
        ?>
        </table>
        <input type="submit" value="Enviar" name="enviar">
    </form>
    <?php
        if($procesaFormulario){
            echo "<h2>$ganadores son los items con mayor puntuación, con una puntuación de $mayorPuntuacion.</h2>";
        }
        if(!empty($msgError)){
            echo $msgError;
        }
    ?>
</body>
</html>