<?php
session_start();

// Guardar datos en la API
if (isset($_POST['guardar'])) {
    $data = array();
    foreach ($_POST as $key => $value) {
        if ($key !== 'guardar') {
            $data[$key] = $value;
        }
    }

    $data = json_encode($data);

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-type: application/json",
            'content' => $data
        )
    );

    $context = stream_context_create($options);
    $respuesta = file_get_contents("https://648386ddf2e76ae1b95c9ebf.mockapi.io/crud", false, $context);

   
} elseif (isset($_POST['buscar'])) {
    $cedula = $_POST['cedula'];
    
    $url = "https://648386ddf2e76ae1b95c9ebf.mockapi.io/crud?cedula=" . urlencode($cedula);

    $response = file_get_contents($url);

    // Analizar la respuesta JSON
    $data = json_decode($response, true);

    // Verificar si se encontraron datos para la cédula ingresada
    if (!empty($data)) {
        // Asignar los datos encontrados a las variables correspondientes
        $nombre = $data[0]['nombre'];
        $apellido = $data[0]['apellido'];
        $direccion = $data[0]['Direccion'];
        $edad = $data[0]['edad'];
        $email = $data[0]['email'];
        $horarioEntrada = $data[0]['horarioEntrada'];
        $team = $data[0]['team'];
        $trainer = $data[0]['trainer'];
    } else {
        echo "No se encontraron datos para la cédula ingresada.";
    }

} elseif (isset($_POST['eliminar'])){
 $cedula = $_POST['cedula'];
 
 // la URL de búsqueda
 $url = "https://648386ddf2e76ae1b95c9ebf.mockapi.io/crud?cedula=" . urlencode($cedula);

 $response = file_get_contents($url);

 $data = json_decode($response, true);
 

 if (!empty($data)) {
 $id = $data[0]['id'];
 
 
 $credenciales["http"]["method"] = "DELETE";
 $config = stream_context_create($credenciales);
 

 $url = "https://648386ddf2e76ae1b95c9ebf.mockapi.io/crud/" . urlencode($id);
 $response = file_get_contents($url, false, $config);
 

 if ($response !== false) {
 echo "Los datos se eliminaron correctamente.";
 } else {
 echo "Error al eliminar los datos.";
 }
 } else {
 echo "No se encontraron datos para la cédula ingresada.";
 }
 }elseif (isset($_POST['editar'])){
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $horarioEntrada = $_POST['horarioEntrada'];
    $team = $_POST['team'];
    $trainer = $_POST['trainer'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];

    // Construir la URL de actualización
    $url = "https://648386ddf2e76ae1b95c9ebf.mockapi.io/crud/" . urlencode($cedula);

    // Configurar los datos a enviar en la solicitud PUT
    $data = array(
        'nombre' => $nombre,
        'apellido' => $apellido,
        'direccion' => $direccion,
        'horarioEntrada' => $horarioEntrada,
        'team' => $team,
        'trainer' => $trainer,
        'edad' => $edad,
        'email' => $email
    );

    // Configurar las opciones de la solicitud
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'PUT',
            'content' => http_build_query($data)
        )
    );

    // Crear el contexto de la solicitud
    $context = stream_context_create($options);

    // Realizar la solicitud PUT a la URL de actualización
    $result = file_get_contents($url, false, $context);

    if ($result !== false) {
        echo "Los datos se han actualizado correctamente.";
    } else {
        echo "Ocurrió un error al actualizar los datos.";
    }

    
}
?>

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
        <h1><?php echo $nombre;?></h1>
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
                    <input type="text" name="horarioEntrada" placeholder="6.Horario de entrada" value="<?php echo isset($horarioEntrada) ? $horarioEntrada : ''; ?>">
                </div>
                <br>
                <div class="row">
                    <input type="text" name="team" placeholder="7.Team" value="<?php echo isset($team) ? $team : ''; ?>">
                </div>
                <br>
                <div class="row">
                    <input type="text" name="trainer" placeholder="8.Trainer" value="<?php echo isset($trainer) ? $trainer : ''; ?>">
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
                        <input type="submit" value="🔍" name="buscar" >
                    </div>
                </div>
                <input type="text" name="cedula" placeholder="cedula"
                       value="<?php echo isset($cedula) ? $cedula : ''; ?>">
            </div>
        </div>
    </form>
    
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
            <?php
    $url = "https://648386ddf2e76ae1b95c9ebf.mockapi.io/crud";
    $response = file_get_contents($url);
    
    
    $data = json_decode($response, true);
    
    if (!empty($data)) {
        foreach ($data as $item) {
            echo "<tr>";
            echo "<td>" . $item['nombre'] . "</td>";
            echo "<td>" . $item['apellido'] . "</td>";
            echo "<td>" . $item['direccion'] . "</td>";
            echo "<td>" . $item['edad'] . "</td>";
            echo "<td>" . $item['email'] . "</td>";
            echo "<td>" . $item['horarioEntrada'] . "</td>";
            echo "<td>" . $item['team'] . "</td>";
            echo "<td>" . $item['trainer'] . "</td>";
            echo "<td><button name='mostrar'>⬆️</button></td>";
            
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No hay datos.</td></tr>";
    }
    ?>
    </tbody>
</table>

</div>
</body>
</html>
