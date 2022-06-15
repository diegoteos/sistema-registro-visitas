<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta a la base de datos</title>
</head>

<body>
    <br><br>
    <div class="container">
        <form action="consulta.php" method="post">
            Escriba el numero a consultar en la base de datos: <br>
            <input type="number" name="cui" id="" placeholder="Ingrese el DPI"><br><br>
            <input type="submit" value="Consultar" class="btn btn-info" name="btn2">
        </form>
        <br>
    </div>

    <div class="container">

        <?php

        //if (isset($_POST['dpi']) && $_POST['btn2']){
        if (isset($_POST['btn2'])) {
            require_once 'conexion.php';
            $cui = $_POST['cui'];

            $res = mysqli_query($conexion, "SELECT * FROM $tabla WHERE `cui` = $cui");
            while ($consulta = mysqli_fetch_array($res)) {
        ?>
                <img src=<?php echo $consulta['fotografia'];
                            "<br>" ?> class="img-fluid" alt="">
        <?php
                echo "<br>" . "DPI: " . $consulta['cui'] . '<br>';
                echo "Primer nombre: " . $consulta['nombre1'] . '<br>';
                echo "Segundo nombre: " . $consulta['nombre2'] . '<br>';
                if (!empty($consulta['nombre3'])) {
                    echo "Tercer nombre: " . $consulta['nombre3'] . '<br>';
                }
                echo "Primer apellido: " . $consulta['apellido1'] . '<br>';
                echo "Segundo apellido: " . $consulta['apellido2'] . '<br>';
                if ($consulta['estadoCivil'] == 'C') {
                    echo "Estado civil: CASADO  <br>";
                } else {
                    echo "Estado civil: SOLTERO  <br>";
                }
                if (!empty($consulta['regCedula'])) {
                    echo "Cedula: " . $consulta['cedula']  . " registro: " . $consulta['regCedula'] . '<br>';
                }
                echo "Fecha nacimiento: " . $consulta['nacFecha'] . '<br>';
                if ($consulta['defuncion'] != 'null') {
                    echo "Fecha defuncion: " . $consulta['defuncion'] . '<br>';
                }
                echo "Profesion: " . $consulta['ocupacion'] . '<br>';
                echo "Municipio de nacimineto: " . $consulta['municipioNac'] . '<br>';
                echo "Departamento: " . $consulta['deptoNac'] . '<br>';
                echo "Pais: " . $consulta['pais'] . '<br>';
                echo "Nacionalidad: " . $consulta['nacionalidad'] . '<br>';
                echo "Vecindad: " . $consulta['vecindad'] . '<br>';
                if ($consulta['genero'] == 'F') {
                    echo "Genero: FEMENINO" . '<br><br>';
                } else {
                    echo "Genero: MASCULINO" . '<br><br>';
                }
            }

            require_once 'cerrar.php';
        }

        ?>


    </div>
</body>

</html>