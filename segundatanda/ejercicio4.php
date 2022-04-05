<?php
    include 'arrays.php';
    $notamediaAlumno = 0;
    if(isset($_POST['enviar'])){
        $procesaFormulario = true;
        $alumno = $_POST['alumno'];
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
    <title>Ejercicio 4</title>
</head>
<body>
    <?php
        // Generación de boletines de notas en función de la evaluación seleccionada en una lista desplegable con array $aNotas.
        echo "<h1>Boletines de notas DAW</h1>";
        echo "<form action='ejercicio4.php' method='post'>";
        echo "<select name='alumno'>";
        foreach($aNotas as $key => $nota){
            echo "<option value='".$key."'>".$key."</option>";
        }
        echo "</select>";
        echo "<input type='submit' value='Enviar' name='enviar'>";
        echo "</form>";
        if($procesaFormulario){
            echo "<h2>Boletín de notas de ".$alumno."</h2>";
            echo "<table border='2' halign='center'>";
            foreach($aNotas[$alumno] as $evaluacion => $aAsignaturas){
                echo "<tr><th></th><th>$evaluacion</th></tr>    ";
                foreach($aAsignaturas as $asignatura => $nota){
                    echo "<tr><td>".$asignatura."</td><td>".$nota."</td></tr>";
                    $notamediaAlumno += $nota;
                }
                echo "<tr><td>Nota Media</td><td>".($notamediaAlumno/5)."</td></tr>";
                $notamediaAlumno = 0;
            }
            echo "</table>";
        }
    ?>
</body>
</html>