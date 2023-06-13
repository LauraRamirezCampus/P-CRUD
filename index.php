<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <title>Document</title>
</head>
<body>
<div class="container">
    <form method="POST">
        <div class="row">
            <div class="col">
                <br>
                <div class="row">
                    <input type="text" name="nombre" placeholder="1.Nombre"
                           value="<?php echo isset($nombre) ? $nombre : ''; ?>">
                </div>
                <br>
                <div class="row">
                    <input type="text" name="apellido" placeholder="2.Apellido"
                           value="<?php echo isset($apellido) ? $apellido : ''; ?>">
                </div>
                <br>
                <div class="row">
                    <input type="text" name="direccion" placeholder="3.Direccion"
                           value="<?php echo isset($direccion) ? $direccion : ''; ?>">
                </div>
                <br>
                <div class="row">
                    <input type="text" name="horarioEntrada" placeholder="6.Horario de entrada">
                </div>
                <br>
                <div class="row">
                    <input type="text" name="team" placeholder="7.Team">
                </div>
                <br>
                <div class="row">
                    <input type="text" name="trainer" placeholder="8.Trainer">
                </div>
                <br>

            </div>
            <div class="col-1"></div>
            <div class="col">
                <br>
                <h3>Campuslands</h3>

                <div class="row">
                    <input type="text" name="edad" placeholder="4.Edad"
                           value="<?php echo isset($edad) ? $edad : ''; ?>">
                </div>
                <br>
                <div class="row">
                    <input type="text" name="email" placeholder="5.Email"
                           value="<?php echo isset($email) ? $email : ''; ?>">
                </div>
                <br>

                <div class="row">
                    <div class="col-2">
                        <input type="submit" value="✅" name="guardar">
                        <br><br>
                        <input type="submit" value="✏️" name="editar"><br><br>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-2">
                        <input type="submit" value="❌" name="eliminar"><br><br>
                        <input type="submit" value="🔍" name="buscar">
                    </div>
                </div>
                <input type="text" name="cedula" placeholder="cedula"
                       value="<?php echo isset($email) ? $email : ''; ?>">
            </div>
        </div>
    </form>
</div>

<table>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Direccion</th>
        <th>Edad</th>
        <th>Email</th>
        <th>hora de entrada</th>
        <th>Team</th>
        <th>Trainer</th>

    </tr>
    <tbody>

    </tbody>
</table>

</body>
</html>
