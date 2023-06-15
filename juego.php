<?php
session_start();

// Verificar si la palabra ya está almacenada en la sesión
if (!isset($_SESSION['palabra'])) {
    // Array de ingredientes de recetas
    $ingredientes = array(
        "tomate",
        "cebolla",
        "ajo",
        "pimiento",
        "zanahoria",
        "papa",
        "pollo",
        "carne",
        "pescado",
        "arroz",
        "fideos",
        "sal",
        "pimienta",
        "aceite",
        "vinagre"
    );

    // Seleccionar una palabra al azar del array de ingredientes
    $_SESSION['palabra'] = strtoupper($ingredientes[array_rand($ingredientes)]);
}

$palabra = $_SESSION['palabra'];

// Arreglo para almacenar las letras adivinadas
if (!isset($_SESSION['adivinadas'])) {
    $_SESSION['adivinadas'] = array_fill(0, strlen($palabra), false);
}

$adivinadas = $_SESSION['adivinadas'];

// Contador de intentos fallidos
if (!isset($_SESSION['intentosFallidos'])) {
    $_SESSION['intentosFallidos'] = 0;
}

$intentosFallidos = $_SESSION['intentosFallidos'];

// Verificar si se ha enviado una letra o una palabra completa
if (isset($_POST['letra'])) {
    $adivinanza = '';
    if (isset($_POST['letra'])) {
        $adivinanza = strtoupper($_POST['letra']);
    }

    if (strlen($adivinanza) === 1) {
        // Se ha enviado una letra para adivinar

        // Verificar si la letra adivinada está en la palabra
        $letraEncontrada = false;
        for ($i = 0; $i < strlen($palabra); $i++) {
            if (strtoupper($palabra[$i]) === strtoupper($adivinanza)) {
                $adivinadas[$i] = true;
                $letraEncontrada = true;
            }
        }

        // Incrementar el contador de intentos fallidos solo si la letra no se encuentra en la palabra
        if (!$letraEncontrada) {
            $_SESSION['intentosFallidos']++;
        }
    } elseif (strlen($adivinanza) === strlen($palabra)) {
        // Se ha enviado una palabra completa para adivinar
        if (strlen(trim($adivinanza)) === strlen($palabra)) {
            // Adivinó la palabra completa
            $adivinadas = array_fill(0, strlen($palabra), true);
        } else {
            // Incrementar el contador de intentos fallidos
            $_SESSION['intentosFallidos']++;
        }
    }
}

// Verificar si todas las letras de la palabra han sido adivinadas
function todasAdivinadas($adivinadas)
{
    foreach ($adivinadas as $adivinada) {
        if (!$adivinada) {
            return false;
        }
    }
    return true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="logo-header">
            <img src="img/logo.png" alt="">
        </div>
        <nav class="nav-menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="juego.php">Descubre el ingrediente secreto</a></li>
                <li><a href="nuevo.php">Aportanos tú receta❤</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <?php if ($intentosFallidos < 6 && !todasAdivinadas($adivinadas)) { ?>
            <h2>Adivina el ingrediente de una receta</h2>

            <p>Pista: La palabra tiene <?php echo strlen($palabra); ?> letras</p>

            <p>
                <?php
                // Mostrar las letras adivinadas y espacios en blanco
                foreach ($adivinadas as $i => $adivinada) {
                    if ($adivinada) {
                        echo $palabra[$i] . " ";
                    } else {
                        echo "_ ";
                    }
                }
                ?>
            </p>

            <form method="post" class="guess-form">
                    <label for="letra">Ingresa una letra:</label>
                    <input type="text" name="letra" maxlength="1" required>
                    <button type="submit">Adivinar</button>
            </form>

            <form method="post" class="guess-form">
                <label for="palabra">O intenta adivinar la palabra completa:</label>
                <input type="text" name="palabra" required>
                <button type="submit">Adivinar palabra</button>
            </form>
        <?php } ?>

        <?php if (todasAdivinadas($adivinadas)) { ?>
            <h2>¡Has adivinado la palabra!</h2>
            <p>La palabra era: <?php echo $palabra; ?></p>
            <?php
            // Reiniciar el juego eliminando las variables de sesión
            unset($_SESSION['palabra']);
            unset($_SESSION['adivinadas']);
            unset($_SESSION['intentosFallidos']);
            ?>
        <?php } ?>

        <?php if ($intentosFallidos >= 6) { ?>
            <h2>¡Perdiste!</h2>
            <p>La palabra era: <?php echo $palabra; ?></p>
            <?php
            // Reiniciar el juego eliminando las variables de sesión
            unset($_SESSION['palabra']);
            unset($_SESSION['adivinadas']);
            unset($_SESSION['intentosFallidos']);
            ?>
        <?php } ?>
    </main>
</body>
</html>



