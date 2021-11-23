<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/formulario.css">
    <title>Tolerancia a Fallos</title>
</head>

<body>

    <?php

    $id = $_POST['idU'];
    $nomU = $_POST['nomU'];
    $pass = $_POST['passU'];

    ?>

    <form action="viewUsers.php" method="POST">
        <div class="form">
            <h1>Registrar nuevo<br>usuario</h1>

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="grupo">
                <input type="text" name="nameU" value="<?php echo $nomU; ?>" id="nom" required><samp class="barra"></samp>
                <label for="nom">Nombre Usuario</label>
            </div>


            <div class="grupo">
                <input type="password" name="passU" value="<?php echo $pass; ?>" id="pass" required><samp class="barra"></samp>
                <label for="pass">Pasword</label>
            </div>


            <div class="botones">
                <button name="accion" value="Update">Cambiar datos</button>
            </div>

        </div>

    </form>

</body>

</html>