<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/tabla.css">
    <title>Tolerancia a Fallos</title>
</head>

<body>

    <?php
    include_once '../Source/Entities/User.php';
    require_once '../Source/DAO/UserDAO.php';


    $sentenceSQL = new UserDAO();
    $user = new User();

    $accion = $_POST['accion'];

    switch ($accion) {
        case 'Login':
            $nomU = $_POST['nameU'];
            $pass = $_POST['passU'];

            $user->setNom($nomU);
            $user->setPass($pass);

            $sentenceSQL->login($user);

            break;

        case 'Register':

            $nomU = $_POST['nameU'];
            $pass = $_POST['passU'];

            $user->setNom($nomU);
            $user->setPass($pass);

            $sentenceSQL->insert($user);

            break;

        case 'Update':

            $id = $_POST['id'];
            $nomU = $_POST['nameU'];
            $pass = $_POST['passU'];

            $user->setId(intval($id));
            $user->setNom($nomU);
            $user->setPass($pass);

            $sentenceSQL->update($user);

            break;

        case 'Delete':

            $id = $_POST['idU'];

            $user->setId(intval($id));

            $sentenceSQL->delete($user);

            break;
    }

    $listaUsuarios = $sentenceSQL->selectAll();
    ?>

    <div id="main-container">

        <a href="index.php" class="buttonIndex">Volver a index</a>
        <br><br><br>

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Contraseñas</th>
                    <th id="config">Configuración</th>
                </tr>
            </thead>

            <?php foreach ($listaUsuarios as $datosU) { ?>
                <tr>
                    <td><?php echo $datosU[0]; ?></td>
                    <td><?php echo $datosU[1]; ?></td>
                    <td><?php echo $datosU[2]; ?></td>
                    <div class="botones">
                        <td>
                            <form method="POST" action="updateUser.php">
                                <input type="hidden" name="idU" value="<?php echo $datosU[0]; ?>">
                                <input type="hidden" name="nomU" value="<?php echo $datosU[1]; ?>">
                                <input type="hidden" name="passU" value="<?php echo $datosU[2]; ?>">
                                <button class="btn1" name="accion" value="">
                                    <span>Editar datos</span>
                                </button>
                            </form>

                            <form method="POST" action="viewUsers.php">
                                <input type="hidden" name="idU" value="<?php echo $datosU[0] ?>">
                                <button class="btn2" name="accion" value="Delete">
                                    <span>Eliminar usuario</span>
                                </button>
                            </form>
                        </td>
                    </div>
                </tr>

            <?php
            } ?>

        </table>

    </div>

</body>

</html>