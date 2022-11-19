    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UNIkart - Home</title>
        <link rel="stylesheet" href="Home.css">
        <link rel="stylesheet" href="../AddModal/Plus.css">
        <link rel="stylesheet" href="../AddModal/Cart.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
        <link rel="icon" href="../ExtraDocs/Ukart.png">
    </head>
    <body>
        <?php require "C:/xampp/htdocs/unikart2/PhpDocs/Nav.php"; ?>

        <div class="box">
            <input type="text" id="inputSearch" name="search" class="src" placeholder="¿Qué quieres comer hoy?" autocomplete="off">
        </div>
        <ul id="boxSearch"> <!--Filtro por facultades y por comidas-->
            <li><a href="../Producto/Producto.php"><i class="fas fa-search"></i>Chilaquiles</a></li>
            <li><a href="../Producto/Producto.php"><i class="fas fa-search"></i>Hamburguesa</a></li>
            <li><a href="../Producto/Producto.php"><i class="fas fa-search"></i>Pizza</a></li>
            <li><a href="../Producto/Producto.php"><i class="fas fa-search"></i>Sushi</a></li>
            <li><a href="../Producto/Producto.php"><i class="fas fa-search"></i>Pasta</a></li>
            <li><a href="../Producto/Producto.php"><i class="fas fa-search"></i>Hot-dog</a></li>
            <li><a href="../Producto/Producto.php"><i class="fas fa-search"></i>Tacos</a></li>
            <li><a href="../UserPerfil/UserPerfil.php"><i class="fas fa-search"></i>Usuario</a></li>
        </ul>
        <div id="coverCtnSearch"></div>
        
        <a href="#" id="Plus" class="plus"><i class="fa-solid fa-circle-plus"></i></a>
        
        <div>
        <!--Categorias-->
        <div class="categorias">
            <div id="caty" class="categorias cat">
                <a href="../Category/category.php"><div class="card">
                    <div>
                        <img src="../ExtraDocs/Productos+Black.png" width="150px" height="150px">
                    </div>
                    <h3>FCFM</h3>
                    </div>
                </a>
                <a href="../Category/category.php"><div class="card">
                    <div>
                        <img src="../ExtraDocs/Productos+Black.png" width="150px" height="150px">
                    </div>
                    <h3>FIME</h3>
                    </div>
                </a>
                <a href="../Category/category.php"><div class="card">
                    <div>
                        <img src="../ExtraDocs/Productos+Black.png" width="150px" height="150px">
                    </div>
                    <h3>Civil</h3>
                    </div>
                </a>
                <a href="../Category/category.php"><div class="card">
                    <div>
                        <img src="../ExtraDocs/Productos+Black.png" width="150px" height="150px">
                    </div>
                    <h3>Biológicas</h3>
                    </div>
                </a>
                <a href="../Category/category.html"><div class="card">
                    <div>
                        <img src="../ExtraDocs/Productos+Black.png" width="150px" height="150px">
                    </div>
                    <h3>Químicas</h3>
                    </div>
                </a>
                <a href="../Category/category.php"><div class="card">
                    <div>
                        <img src="../ExtraDocs/Productos+Black.png" width="150px" height="150px">
                    </div>
                    <h3>FACPYA</h3>
                    </div>
                </a>
                <a href="../Category/category.php"><div class="card">
                    <div>
                        <img src="../ExtraDocs/Productos+Black.png" width="150px" height="150px">
                    </div>
                    <h3>Filosofía</h3>
                    </div>
                </a>
                <a href="../Category/category.php"><div class="card">
                    <div>
                        <img src="../ExtraDocs/Productos+Black.png" width="150px" height="150px">
                    </div>
                    <h3>FACDYC</h3>
                    </div>
                </a>
                <a href="../Category/category.php"><div class="card">
                    <div>
                        <img src="../ExtraDocs/Productos+Black.png" width="150px" height="150px">
                    </div>
                    <h3>Estación Universidad</h3>
                    </div>
                </a>
                
            </div>
        </div>

        <!--Más vendidos/recomendados/populares-->
        <div class="prodSimi">
            <h3>Productos más vendidos</h3>
            <div class="prodSimi">
                <div class="card">
                    <img src="../ExtraDocs/SoupBlack.png" width="150px" height="150px">
                    <h4>Producto</h4>
                    <br>
                    <a href="../Producto/Producto.php">Leer más</a>
                </div>
                <div class="card">
                    <img src="../ExtraDocs/SoupBlack.png" width="150px" height="150px">
                    <h4>Producto</h4>
                    <br>
                    <a href="../Producto/Producto.php">Leer más</a>
                </div>
                <div class="card">
                    <img src="../ExtraDocs/SoupBlack.png" width="150px" height="150px">
                    <h4>Producto</h4>
                    <br>
                    <a href="../Producto/Producto.php">Leer más</a>
                </div>
            </div>
        </div>

        <div class="prodSimi">
            <h3>Productos recomendados</h3>
            <div class="prodSimi">
                <div class="card">
                    <img src="../ExtraDocs/SoupBlack.png" width="150px" height="150px">
                    <h4>Producto</h4>
                    <br>
                    <a href="../Producto/Producto.php">Leer más</a>
                </div>
                <div class="card">
                    <img src="../ExtraDocs/SoupBlack.png" width="150px" height="150px">
                    <h4>Producto</h4>
                    <br>
                    <a href="../Producto/Producto.php">Leer más</a>
                </div>
                <div class="card">
                    <img src="../ExtraDocs/SoupBlack.png" width="150px" height="150px">
                    <h4>Producto</h4>
                    <br>
                    <a href="../Producto/Producto.php">Leer más</a>
                </div>
            </div>
        </div>

        <div class="prodSimi">
            <h3>Productos populares</h3>
            <div class="prodSimi">
                <div class="card">
                    <img src="../ExtraDocs/SoupBlack.png" width="150px" height="150px">
                    <h4>Producto</h4>
                    <br>
                    <a href="../Producto/Producto.php">Leer más</a>
                </div>
                <div class="card">
                    <img src="../ExtraDocs/SoupBlack.png" width="150px" height="150px">
                    <h4>Producto</h4>
                    <br>
                    <a href="../Producto/Producto.php">Leer más</a>
                </div>
                <div class="card">
                    <img src="../ExtraDocs/SoupBlack.png" width="150px" height="150px">
                    <h4>Producto</h4>
                    <br>
                    <a href="../Producto/Producto.php">Leer más</a>
                </div>
            </div>
        </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="Home.js"></script>
    </body>
    </html>