<?php
    $msgError;
    if(isset($_POST['enviar'])){
        $numAleatorio;
        $procesaFormulario = true;
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        if((trim($num1) != "") && (trim($num2) != "")){
            if(($num1 < 0) || ($num2 < 0)){
                $procesaFormulario = false;
                $msgError = "no puede haber un número menor que 0";
            }else if($num1 > $num2){
                $procesaFormulario = false;
                $msgError = "El número 1 debe ser menor que el número 2";
            }else{
                $numAleatorio = rand($num1,$num2);
            }
        }else{
            $procesaFormulario = false;
            $msgError = "Los campos no pueden estar vacios";
        }
    }else{
        $procesaFormulario = false;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número aleatorio</title>
</head>
<body>
    <h1>Número aleatorio comprendido entre dos números positivos</h1>
    <form method="post">
        <p>Primer número: <input type="number" name="num1"
            <?php
                if($procesaFormulario){
                    echo "value='$num1'";
                }
            ?>
        ></p>
        <p>Segundo número: <input type="number" name="num2"
        <?php
                if($procesaFormulario){
                    echo "value='$num2'";
                }
            ?>
        ></p>
        <p><input type="submit" value="Enviar" name="enviar"></p>
    </form>
    <?php
        if($procesaFormulario){
            echo "El número aleatorio es: $numAleatorio";
        }
        if(!empty($msgError)){
            echo "$msgError";
        }
    ?>
</body>
</html>