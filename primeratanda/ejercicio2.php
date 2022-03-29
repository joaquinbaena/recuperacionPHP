<?php
    $msgError;
    if(isset($_POST['enviar'])){
        $procesaFormulario = true;

        $pass1 = $_POST['contrasenia1'];
        $pass2 = $_POST['contrasenia2'];

        if((trim($pass1) != "") && (trim($pass2) != "")){
            if($pass1 == $pass2){
                $msgCoincidencia = "Las contraseñas coinciden";
            }else{
                $msgCoincidencia = "Las contraseñas no coinciden";
            }
        }else{
            $procesaFormulario = false;
            $msgError = "No puede estar un campo vacío";
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
    <title>Reescritura de contraseñas</title>
</head>
<body>
    <h1>Contraseñas coincidentes</h1>
    <form method="post">
        <p>
            Contraseña: <input type="password" name="contrasenia1">
        </p>
        <p>
            Repita la Contraseña: <input type="password" name="contrasenia2">
        </p>
        <p><input type="submit" value="Enviar" name="enviar"></p>
    </form>
    <?php
        if($procesaFormulario){
            echo "$msgCoincidencia";
        }
        if(!empty($msgError)){
            echo "$msgError";
        }
    ?>
</body>
</html>