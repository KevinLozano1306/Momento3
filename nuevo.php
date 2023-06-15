<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="py-3">
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

    <main class="container">
            <div class="row">
                <div class="col">
                    <h4>Añade tu deliciosa receta aquí</h4>
                    
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="guarda.php" method="post" class="row g-3"  autocomplete="off">
                        
                          <div class="form-group">
                                <label for="">Nombre de la receta</label>
                                <input type="text" name="Nombre" id="Nombre" class="form-control">

                            </div>

                            <div class="form-group">
                                <label for="">Ingredientes</label>
                                <input type="text" name="Ingredientes" id="Ingredientes" class="form-control">

                            </div>

                            <div class="form-group">
                                <label for="">Preparación</label>
                                <textarea  name="Preparacion" id="Preparacion" class="form-control"></textarea>

                            </div>

                            <div class="form-group">
                                <label for="">Resultados</label>
                                <input type="text" name="Resultados" id="Resultados" class="form-control">
                         </div>
                         <div class="modal-footer">
                            <a href="index.php" class="btn btn-secondary">Regresar</a>
                            <button type="submit" class="btn btn-success">Guardar Receta❤</button>
                         </div>
                    </form>
                </div>
            </div>
           
  </main>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>