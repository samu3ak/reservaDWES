<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //Establezco conexión con BD
        $con = mysqli_connect("localhost", "root", "");
        //Si da error aviso y cierro
        if (mysqli_connect_errno()) {
            echo "Error al conectar a MySQL: " . mysqli_connect_error();
            exit;
        }

        //Función que devuelve la info del campo dado
        function recogeDato($campo) {
            return isset($_POST[$campo]) ? $_POST[$campo] : '';
        }

        //Variables para cada campo
        $nombre = recogeDato("nombre");
        $email = recogeDato("email");
        $fechaRecibida = recogeDato("fecha");
        $fecha = substr($fechaRecibida, 6) . "-" . substr($fechaRecibida, 3, 2) . "-" . substr($fechaRecibida, 0, 2);
        $numeroPersonas = recogeDato("numeroPersonas");
        $edadGrupo = recogeDato("edad");
        $aulaEducativa = recogeDato("asistir");
        $observaciones = recogeDato("observaciones");

        //Selecciono la BD a conectar
        mysqli_select_db($con, "formularioreserva");

        //Realizo la Query
        mysqli_query($con, "INSERT INTO reserva (Nombre, Correo, FechaVisita, NumPersonas, EdadGrupo, AulaEducativa, Observaciones, ID) VALUES ('$nombre','$email','$fecha','$numeroPersonas','$edadGrupo','$aulaEducativa','$observaciones',NULL)");

        //Mensaje
        echo "<h1>Enviado correctamente</h1>";

        //Cierro BD
        mysqli_close($con);
        ?>
    </body>
</html>
