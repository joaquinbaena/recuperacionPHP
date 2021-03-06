<?php
    $aEjerciciosPrimeraTanda = [
        ['id'=> 1, 'titulo'=> 'Ejercicio 1','descripcion'=>'Número aleatorio', 'enlace'=>'primeratanda/ejercicio1.php', 'github' =>'https://github.com/joaquinbaena/recuperacionPHP/blob/main/primeratanda/ejercicio1.php'],
        ['id'=> 2, 'titulo'=> 'Ejercicio 2','descripcion'=>'Reescritura de contraseñas', 'enlace'=>'primeratanda/ejercicio2.php', 'github' =>'https://github.com/joaquinbaena/recuperacionPHP/blob/main/primeratanda/ejercicio2.php'],
        ['id'=> 3, 'titulo'=> 'Ejercicio 3','descripcion'=>'Operaciones aritméticas', 'enlace'=>'primeratanda/ejercicio3.php', 'github' =>'https://github.com/joaquinbaena/recuperacionPHP/blob/main/primeratanda/ejercicio3.php'],
        ['id'=> 4, 'titulo'=> 'Ejercicio 4','descripcion'=>'Encuesta', 'enlace'=>'primeratanda/ejercicio4.php', 'github' =>'https://github.com/joaquinbaena/recuperacionPHP/blob/main/primeratanda/ejercicio4.php'],
        ['id'=> 5, 'titulo'=> 'Ejercicio 5','descripcion'=>'Figuras Geométricas', 'enlace'=>'primeratanda/ejercicio5.php', 'github' =>'https://github.com/joaquinbaena/recuperacionPHP/blob/main/primeratanda/ejercicio5.php']
    ];

    $aEjerciciosSegundaTanda = [
        ['id'=> 6, 'titulo'=> 'Ejercicio 2','descripcion'=>'Paises y capitales', 'enlace'=>'segundatanda/ejercicio2.php', 'github' =>'https://github.com/joaquinbaena/recuperacionPHP/blob/main/segundatanda/ejercicio2.php'],
        ['id'=> 7, 'titulo'=> 'Ejercicio 3','descripcion'=>'Comunidades autonomas', 'enlace'=>'segundatanda/ejercicio3.php', 'github' =>'https://github.com/joaquinbaena/recuperacionPHP/blob/main/segundatanda/ejercicio3.php'],
        ['id'=> 8, 'titulo'=> 'Ejercicio 4','descripcion'=>'Notas', 'enlace'=>'segundatanda/ejercicio4.php', 'github' =>'https://github.com/joaquinbaena/recuperacionPHP/blob/main/segundatanda/ejercicio4.php']
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
    <h2>Primera tanda</h2>
    <ul>
        <?php
            foreach($aEjerciciosPrimeraTanda as $ejercicio){
                echo "<h2>".$ejercicio['titulo'] ." - ". $ejercicio['descripcion']."</h2>";
                echo "<li><a href='".$ejercicio['enlace']."'>".$ejercicio['descripcion']."</a></li>";
                echo "<li><a href='".$ejercicio['github']."'>Github del ejercicio</a></li>";
            }
        ?>
    </ul>
    <h2>Segunda Tanda</h2>
    <ul>
        <?php
            foreach($aEjerciciosSegundaTanda as $ejercicio){
                echo "<h2>".$ejercicio['titulo'] ." - ". $ejercicio['descripcion']."</h2>";
                echo "<li><a href='".$ejercicio['enlace']."'>".$ejercicio['descripcion']."</a></li>";
                echo "<li><a href='".$ejercicio['github']."'>Github del ejercicio</a></li>";
            }
        ?>
    </ul>
</body>
</html>