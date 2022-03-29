<?php
    $aEjercicios = [
        ['id'=> 1, 'titulo'=> 'Ejercicio 1','descripcion'=>'Número aleatorio', 'enlace'=>'primeratanda/ejercicio1.php', 'github' =>],
        ['id'=> 2, 'titulo'=> 'Ejercicio 2','descripcion'=>'Reescritura de contraseñas', 'enlace'=>'primeratanda/ejercicio2.php', 'github' =>],
        ['id'=> 3, 'titulo'=> 'Ejercicio 3','descripcion'=>'Operaciones aritméticas', 'enlace'=>'primeratanda/ejercicio3.php', 'github' =>],
        ['id'=> 4, 'titulo'=> 'Ejercicio 4','descripcion'=>'Encuesta', 'enlace'=>'primeratanda/ejercicio4.php', 'github' =>],
        ['id'=> 5, 'titulo'=> 'Ejercicio 5','descripcion'=>'Figuras Geométricas', 'enlace'=>'primeratanda/ejercicio5.php', 'github' =>]
    ];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RA3</title>
</head>
<body>
    <h1>Ejercicios UD3 Repaso</h1>
    <ul>
        <?php
            foreach($aEjercicios as $ejercicio){
                echo "<h2>".$ejercicio['titulo']."</h2>";
                echo "<li><a href='".$ejercicio['enlace']."'>".$ejercicio['descripcion']."</a></li>";
                echo "<li><a href='".$ejercicio['github']."'>Github del ejercicio</a></li>";
            }
        ?>
    </ul>    
</body>
</html>