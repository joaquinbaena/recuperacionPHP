<?php
    $figura = "";
    $color = "";
    
    if(isset($_POST['forma']) || isset($_POST['darForma'])){
        $procesaFormulario = true;

        if(!isset($_POST['figura'])){
            $procesaFormulario = false;
            $msgError = "Selecciona una figura";
        }else{
            $figura = $_POST['figura'];
        }

        if(!isset($_POST['color'])){
            $procesaFormulario = false;
            $msgError = "Selecciona una figura";
        }else{
            $color = $_POST['color'];
        }

        
    }else{
        $procesaFormulario = false;
    }

    if(isset($_POST['darForma'])){
        $procesaFigura = true;
        if(isset($_POST['altura'])){
            $altura = $_POST['altura'];
        }
        if(isset($_POST['base'])){
            $base = $_POST['base'];
        }
        if(isset($_POST['radio'])){
            $radio = $_POST['radio'];
        }
        if(isset($_POST['lado'])){
            $lado = $_POST['lado'];
        }
    }else{
        $procesaFigura = false;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <h1>Figura Geométrica</h1>
    <form method="post">
        <p>
            Círculo: <input type="radio" name="figura" value="circulo" <?php echo ($figura == "circulo") ? "checked" : ""?>>
        </p>
        <p>
            Rectangulo: <input type="radio" name="figura" value="rectangulo" <?php echo ($figura == "rectangulo") ? "checked" : ""?>>
        </p>
        <p>
            Cuadrado: <input type="radio" name="figura" value="cuadrado" <?php echo ($figura == "cuadrado") ? "checked" : ""?>>
        </p>
        <p>
            Color de la figura en inglés: <input type="text" name="color" value="<?php echo ($color == "") ? "": "$color"?>">
        </p>
        <input type="submit" value="Enviar" name="forma">
    </form>
    <?php
        if($procesaFormulario){
            ?>
            <form method="post">
                <input type="hidden" name="figura" value="<?php echo $figura?>">
                <input type="hidden" name="color" value="<?php echo $color?>">
            <?php
            switch($figura){
                case "circulo":
            ?>
                    <p>
                        radio del círculo: <input type="text" name="radio">
                    </p>
            <?php
                break;
                case "rectangulo":
                    ?>
                        <p>
                            Altura: <input type="text" name="altura" value="">
                        </p>
                        <p>
                            Base: <input type="text" name="base" value="">
                        </p>
            <?php
                break;
                case "cuadrado":
            ?>
                    <p>
                        Lado: <input type="text" name="lado">
                    </p>
            <?php
                break;
            }
            ?>
                <input type="submit" value="Enviar" name="darForma">
            </form>
            <?php
        }

        if($procesaFigura){
            switch($figura){
                case "circulo":
                    ?>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                            width="600" height="600" viewBox="0 0 120 120">
                            <circle cx="50" cy="50" r="<?php echo "$radio"?>" fill="<?php echo "$color"?>" />
                        </svg>
                    <?php
                    break;
                case "rectangulo":
                    ?>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                            width="600" height="600" viewBox="0 0 600 600">
                            <rect width="<?php echo "$base";?>" height="<?php echo "$altura"?>" fill="<?php echo "$color"?>"/>
                        </svg>
                    <?php
                    break;
                case "cuadrado":
                    ?>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                            width="600" height="600" viewBox="0 0 600 600">
                            <rect width="<?php echo "$lado"?>" height="<?php echo "$lado"?>" fill="<?php echo "$color"?>" />
                        </svg>
                    <?php
                    break;
            }
        }
    ?>
</body>
</html>