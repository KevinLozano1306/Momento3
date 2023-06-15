<?php
require 'config/conexion.php';
$db = new Database();
$con = $db->conectar();
$correcto = false;

if (isset($_POST['ID'])) {
    $ID = $_POST['ID'];
    $Nombre = $_POST['Nombre'];
    $Ingredientes = $_POST['Ingredientes'];
    $Preparacion = $_POST['Preparacion'];
    $Resultados = $_POST['Resultados'];
    $query = $con->prepare("UPDATE delicias SET Nombre=?, Ingredientes=?, Preparacion=?, Resultados=? WHERE ID=?");
    $resultado = $query->execute(array($Nombre, $Ingredientes, $Preparacion, $Resultados, $ID));
    if ($resultado) {
        $correcto = true;
    }
} else {
    $Nombre = $_POST['Nombre'];
    $Ingredientes = $_POST['Ingredientes'];
    $Preparacion = $_POST['Preparacion'];
    $Resultados = $_POST['Resultados'];
    $query = $con->prepare("INSERT INTO delicias (Nombre, Ingredientes, Preparacion, Resultados, activo) VALUES (:Nombre, :Ingredientes, :Preparacion, :Resultados, 1)");
    $resultado = $query->execute(array('Nombre' => $Nombre, 'Ingredientes' => $Ingredientes, 'Preparacion' => $Preparacion, 'Resultados' => $Resultados));
    if ($resultado) {
        $correcto = true;
        echo $con->lastInsertId();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="py-3">
    <main class="container">
        <div class="row">
            <div class="col">
                <?php if ($correcto) { ?>
                    <h3>Receta Guardada</h3>
                <?php } else { ?>
                    <h3>Error al Guardar</h3>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </main>
</body>
</html>