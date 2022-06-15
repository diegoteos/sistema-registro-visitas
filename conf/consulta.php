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
                echo "<br>";
                echo "<b>DPI:</b> " . $consulta['cui'] . '<br>';
                echo "<b>Primer nombre:</b> " . $consulta['nombre1'] . '<br>';
                echo "<b>Segundo nombre:</b> " . $consulta['nombre2'] . '<br>';
                if (!empty($consulta['nombre3'])) {
                    echo "<b>Tercer nombre:</b> " . $consulta['nombre3'] . '<br>';
                }
                echo "<b>Primer apellido:</b> " . $consulta['apellido1'] . '<br>';
                echo "<b>Segundo apellido:</b> " . $consulta['apellido2'] . '<br>';
                if ($consulta['estadoCivil'] == 'C') {
                    echo "<b>Estado civil:</b> CASADO  <br>";
                } else {
                    echo "<b>Estado civil:</b> SOLTERO  <br>";
                }
                if (!empty($consulta['regCedula'])) {
                    echo "<b>Cedula:</b> " . $consulta['cedula']  . " <b>registro:</b> " . $consulta['regCedula'] . '<br>';
                }
                echo "<b>Fecha nacimiento:</b> " . $consulta['nacFecha'] . '<br>';
                if ($consulta['defuncion'] != 'null') {
                    echo "<b>Fecha defuncion:</b> " . $consulta['defuncion'] . '<br>';
                }
                echo "<b>Profesion:</b> " . $consulta['ocupacion'] . '<br>';
                echo "<b>Municipio de nacimineto:</b> " . $consulta['municipioNac'] . '<br>';
                echo "<b>Departamento:</b> " . $consulta['deptoNac'] . '<br>';
                echo "<b>Pais:</b> " . $consulta['pais'] . '<br>';
                echo "<b>Nacionalidad:</b> " . $consulta['nacionalidad'] . '<br>';
                if (!empty($consulta['vecindad'])) {
                    echo "<b>Vecindad:</b> " . $consulta['vecindad'] . '<br>';
                }
                if ($consulta['genero'] == 'F') {
                    echo "<b>Genero:</b> FEMENINO" . '<br><br>';
                } else {
                    echo "<b>Genero:</b> MASCULINO" . '<br><br>';
                }
            }

            require_once 'cerrar.php';
        }

        ?>


    </div>
</body>

</html>