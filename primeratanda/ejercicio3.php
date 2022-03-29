<?php
    $operadores = ["+", "-", "*", "/"];

    $num1 = rand(1,10);

    $num2 = rand(1,10);

    $operador = $operadores[rand(0,3)];

    eval('$resultado = '."$num1 $operador $num2".';');
    
    if(isset($_POST['enviar'])){
        $procesaFormulario = true;
        $comprobar = $_POST['comprobar'];
        if(trim($comprobar) == ""){
            $msgError = "No has introducido un número para comprobar, la operación ha cambiado";
            $procesaFormulario = false;
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
    <title>Ejercicio 3</title>
</head>
<body>
    <h1>Operación generada automaticamente</h1>
    <form method="post">
        <p>
            <?php
                echo "<input type=\"hidden\" name=\"resultado\" value=\"$resultado\">";
                echo "$num1 $operador $num2 = ";
            ?>
            <input type="number" name="comprobar" placeholder="Escribe el resultado">
        </p>
        <p><input type="submit" value="Enviar" name="enviar"></p>
    </form>
    <?php
        if($procesaFormulario){
            echo ($comprobar == $_POST['resultado']) ? "<h2>Has acertado</h2>" : "<h2>No has acertado</h2>";
        }
        if(!empty($msgError)){
            echo "$msgError";
        }
    ?>
</body>
</html>