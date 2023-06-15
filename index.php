<?php
//dado el caso de que quieras ver como se ve funcional
    //   https://youtu.be/cjSZXWJTxzk    ese es el link del video 

require 'config/conexion.php';

$db = new Database();
$con = $db->conectar();

$activo = 1;

$comando= $con->prepare("SELECT ID, Nombre, Ingredientes, Preparacion, Resultados FROM delicias WHERE activo=:mi_activo ORDER BY ID ASC");
$comando->execute(['mi_activo' => $activo]);
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>WikiRecetas</title>
</head>
<body>
    <header class="header">
        <div class="logo-header">
            <img src="img/logo.png" alt="">
        </div>
        <nav class="nav-menu">
            <ul>
                <li> <a href="index.php">Inicio</a></li>
                <li> <a href="juego.php">Descubre el ingrediente secreto</a></li>
                <li> <a href="nuevo.php">Aportanos tú receta❤</a></li>
              
            </ul>
        </nav>
    </header>
     <main>
        <div class="container-imagen">
                <h1 class="title">WikiRecetas</h1>
                <div class="contenedor">
                        <img src="./img/rrrr.jpg" alt="" class="ensalada">
                        <p class="text">Está es una pagina la cual hablara sobre ensaladas, las cuales serán nutritivas u engordantes. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus ducimus, commodi iure ipsam voluptas necessitatibus dolor accusamus quae quos libero provident eum id adipisci culpa. Minus iure rerum unde aspernatur?
                        Perspiciatis consequatur deserunt reprehenderit eius, eos laudantium odio enim. Nisi laboriosam maxime, reiciendis dignissimos veniam quas
                        quos temporibus odit necessitatibus soluta cum quasi impedit dolore itaque explicabo assumenda consequuntur nulla.
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus ducimus, commodi iure ipsam voluptas necessitatibus dolor accusamus quae quos libero provident eum id adipisci culpa. Minus iure rerum unde aspernatur?
                        Perspiciatis consequatur deserunt reprehenderit eius, eos laudantium odio enim. Nisi laboriosam maxime, reiciendis dignissimos veniam quas
                        quos temporibus odit necessitatibus soluta cum quasi impedit dolore itaque explicabo assumenda consequuntur nulla.</p>
                    </div>
        </div>
        <div class="container-title">
            <div class="titletable">
            <h1 >
                Nuestras Delicias
            </h1>

            </div>
            
        </div>
        <div class="row py-3">
                <div class="col">
                    <table >
                        <thead>
                            <tr>
                                <th >ID</th>
                                <th >Nombre</th>
                                <th >Ingredientes</th>
                                <th >Preparación</th>
                                <th >Resultados</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            foreach ($resultado as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $row['ID']; ?></td>
                                    <td><?php echo $row['Nombre']; ?></td>
                                    <td><?php echo $row['Ingredientes'];?></td>
                                    <td><?php echo $row['Preparacion'];?></td>
                                    <td><?php echo $row['Resultados'];?></td>
                                </tr>
                            <?php } ?>
                          
                        </tbody>
                    </table>
                </div>
            </div>

        
     </main>
     <footer>
        <p>Desarrollador: Kevin Stiven Lozano Ochoa</p>
        <p>Correo: kevinlozano.1306@gmail.com</p>
        <p>Hecho por Kev</p>
       
     </footer>
    
</body>
</html>