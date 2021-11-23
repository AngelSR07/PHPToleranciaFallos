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
    </header>

    <form action="viewUsers.php" method="POST">
        <div class="form">
            <h1>Inciar Sesión</h1>

            <div class="grupo">
                <input type="text" name="nameU" id="nom" required><samp class="barra"></samp>
                <label for="nom">Nombre Usuario</label>
            </div>

            <div class="grupo">
                <input type="password" name="passU" id="pass" required><samp class="barra"></samp>
                <label for="pass">Pasword</label>
            </div>

            <div class="botones">
                <button name="accion" value="Login">Iniciar Sesión</button>
            </div>
        </div>
    </form>

</body>

</html>