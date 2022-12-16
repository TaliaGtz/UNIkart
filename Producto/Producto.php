<!DOCTYPE html>
<?php

include("../PhpDocs/PhpInclude.php");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - Producto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="Producto.css">
    <link rel="stylesheet" href="../AddModal/Cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../ExtraDocs/Ukart.png">
</head>
<body>
    <?php require "../PhpDocs/Nav.php"; ?>

    <?php 
        $idBtn = $_GET['IDBtn'];
        $consulta  = mysqli_query($conexion,'CALL sp_4Var(4, "'.$idBtn.'");');
        $consulta = mysqli_fetch_array($consulta);  //Devuelve un array o NULL
        while(mysqli_next_result($conexion)){;}
        $_SESSION['Producto'] = $consulta['Nombre'];
        $_SESSION['ID_Producto'] = $idBtn;

        $Views = $consulta['Views'];
        $Views = $Views + 1;

        $query  ='CALL sp_upProd(1, "'.$Views.'", "'.$idBtn.'");';

        mysqli_query($conexion, $query);
        
    ?>

    <section class="grid">
        <div class="square">
            <h1 class="h1"><?php echo $_SESSION['Producto']; ?></h1>
        </div>

        <!-- sección de Producto -->

        <?php
            include("../PhpDocs/imgCode.php");

            
            if(isset($_REQUEST['guardar'])){
                if(isset($_FILES['archivo']['name'])){
                    $tipoArchivo = $_FILES['archivo']['type'];
                    $nombreArchivo = $_FILES['archivo']['name'];
                    $sizeArchivo = $_FILES['archivo']['size'];
                    $imagenSubida = fopen($_FILES['archivo']['tmp_name'], 'r');
                    $binImagen = fread($imagenSubida, $sizeArchivo);
                    $binImagen = mysqli_escape_string($conexion, $binImagen);

                    $IDMedia = rand(10000, 32766);
                    
                    $query = 'CALL sp_AddVariables5(1, 
                    "'.$IDMedia.'", "'.$now.'", "'.$binImagen.'", "'.$tipoArchivo.'", 
                    "", "", 
                    "", "", "", 
                    "", "", "", "");';
                    
                    $query1 = 'CALL sp_AddVariables5(2, 
                    "", "", "", "", 
                    "'.$idBtn.'", "'.$IDMedia.'", 
                    "", "", "", 
                    "", "", "", "");';
                    
                    if(mysqli_query($conexion, $query)){  //Ejecutamos el query y verificamos si se guardaron los datos
                        mysqli_query($conexion, $query1);
                    }else{
                        echo "Error: " . $query . "<br>" . mysqli_error($conexion);
                    }
                }
            }
        ?>

        <section id="contenidoImg">
            <div id="carouselExampleIndicators" class="carousel slide productImg" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <?php  include("../Producto/indic.php");  ?>
                </div>
                <div class="carousel-inner">
                    <?php  include("../Producto/imgs.php");  ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="description">
                <p>Valoración actual: <?php echo $consulta['Valoracion']; ?></p>
                <form class="formul" method="POST" action="../Pedido/Valorar.php?IDBtn=<?php echo $idBtn ?>">
                    <div class="valoracion valProd"> 
                        <div class="stars">
                            <button type="submit" name="valoracion">Valorar</button>
                            <input type="radio" name="estrellas" id="rate5" value="5" <?php if($consulta['Valoracion'] == 5) echo 'checked="checked"'; ?>>
                            <label for="rate5" class="fas fa-star"></label>
                            <input type="radio" name="estrellas" id="rate4" value="4" <?php if($consulta['Valoracion'] == 4) echo 'checked="checked"'; ?>>
                            <label for="rate4" class="fas fa-star"></label>
                            <input type="radio" name="estrellas" id="rate3" value="3" <?php if($consulta['Valoracion'] == 3) echo 'checked="checked"'; ?>>
                            <label for="rate3" class="fas fa-star"></label>
                            <input type="radio" name="estrellas" id="rate2" value="2" <?php if($consulta['Valoracion'] == 2) echo 'checked="checked"'; ?>>
                            <label for="rate2" class="fas fa-star"></label>
                            <input type="radio" name="estrellas" id="rate1" value="1" <?php if($consulta['Valoracion'] == 1) echo 'checked="checked"'; ?>>
                            <label for="rate1" class="fas fa-star"></label>
                        </div>    
                        <br>
                    </div>
                </form>
                <?php
                    if($consulta['Precio'] == 0){
                        ?><label><a id="cotiz" href="../Mensajes/mensajes.php?IDProd=<?php echo $idBtn; ?>">Cotización </a></label><label> ($<?php echo $consulta['PrecioCant']; ?>)</label><?php
                    }else{
                        ?><p>$<?php echo $consulta['PrecioCant']; ?></p><?php
                    }
                ?>
                <p>Categoría/s:</p>
                <?php 
                    $consultaCatProd  = mysqli_query($conexion,'CALL sp_4Var(5, "'.$idBtn.'");');
                    while(mysqli_next_result($conexion)){;}
                    while($fila = $consultaCatProd->fetch_array()):
                        ?><label>°<?php echo $fila['Categoria'] ?></label><?php 
                    endwhile;
                ?>
                <?php
                    $Disp = $consulta['Disponibilidad'];
                    if($consulta['Disponibilidad'] == 0){
                        ?><p><?php echo $consulta['Disponibilidad']; ?> artículos disponibles, no sabemos cúando volverá a estar a la venta</p><?php
                    }else{
                        $Rol = $_SESSION['rol'];
                        if ($Rol == '2'){
                        ?><br>
                        <form class="formul" method="POST" action="../Producto/Edit.php?IDBtn=<?php echo $idBtn?>&Cant=<?php echo $consulta['Disponibilidad']?>">
                            <button type="submit" name="less" class="menos">-</button>
                            <label><?php echo $consulta['Disponibilidad']; ?> artículos disponibles</label>
                            <button type="submit" name="more" class="menos">+</button>
                        </form>
                        <?php
                        }
                        if ($Rol != '2'){
                        ?><br>
                            <label><?php echo $consulta['Disponibilidad']; ?> artículos disponibles</label>
                        <?php
                        }
                    }
                ?>
                <p><?php echo $consulta['Descripcion']; ?></p>
                <a href="../WishList/WishList.php"></a>
                
                <div class="dropdown">
                    <i id="add" class="fa-solid fa-heart-circle-plus" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                    <ul class="dropdown-menu">
                        <?php include("../Producto/WLists.php"); ?>
                    </ul>
                </div>
                <?php
                    $User = "$_SESSION[user]";
                    //Queremos el ID del usuario
                    $consultar  = mysqli_query($conexion,'CALL sp_1Var(1, "'.$User.'");');
                    $consultar = mysqli_fetch_array($consultar);  //Devuelve un array o NULL
                    while(mysqli_next_result($conexion)){;}
                    $User = $consultar['ID_Registro'];
                ?>
                <?php
                    if($Disp != 0){
                        ?><a href="../Producto/AddProduct.php?IDBtn=<?php echo $User?>&IDProd=<?php echo $idBtn;?>" ><i id="addCart" class="fa-solid fa-cart-plus"></i></a><!--onclick="addCart()"--><?php
                    }
                ?>
            </div>
        </section>

        <div class="video">
            <form action="../videos/save_video.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
					<label class="form">Subir Video</label><br>
					<input type="file" name="video" class="form-control-file form"/><br>
                    <button name="save" class="btn btn-primary form"><span class="glyphicon glyphicon-save"></span> Guardar</button>
				</div>
            </form>
            <div class="col-md-6 well">
                <?php
                    include("../PhpDocs/Conexion.php");
                    
                    $query  = mysqli_query($conexion,'CALL sp_4Var(6, "'.$idBtn.'");');
                    while(mysqli_next_result($conexion)){;}
                    
                    while($fetch = mysqli_fetch_array($query)){
                ?>
                <div class="col-md-12">
                    <div class="col-md-8">
                        <video width="600px" height="auto" controls>
                            <source src="<?php echo $fetch['location']?>">
                        </video>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div> 

        <!-- fin sección de Producto -->

        <!-- sección de Comentarios -->

        <div class="comments">
            <h1>Comentarios</h1>
            
            <section id="publicacion">
                <div id="commentBoxP" contenteditable="true" dir="auto" class="commentBoxP" placeholder="Agrega un comentario..."></div>
                <br>
                <div class="valoracion"> 
                    <div class="stars">
                        <input type="radio" name="estrellas" id="rate5" value="5">
                        <label for="rate5" class="fas fa-star"></label>
                        <input type="radio" name="estrellas" id="rate4" value="4">
                        <label for="rate4" class="fas fa-star"></label>
                        <input type="radio" name="estrellas" id="rate3" value="3">
                        <label for="rate3" class="fas fa-star"></label>
                        <input type="radio" name="estrellas" id="rate2" value="2">
                        <label for="rate2" class="fas fa-star"></label>
                        <input type="radio" name="estrellas" id="rate1" value="1">
                        <label for="rate1" class="fas fa-star"></label>
                    </div>    
                    <br>
                </div>
                <input type="date" id="datepkd" class="datepkd" value="2022-01-01">
                <button type="button" id="publicar" class="button">Publicar</button>
            </section>

            <section id="contenido">
                <section class="paginacion">
                    <ul id="ulli">
                        <li type="button" id="li1" onclick="nPags(1)">1</li>

                    </ul>
                </section>

                <div id="pag1">
                </div>
                
            </section>

            <div id="searchList" class="searchList">
                <ul id="searchUl">
                </ul>
            </div>
        
        </div>

        <!-- fin sección de Comentarios -->

        <!--Recomendaciones y productos similares-->
        <div class="prodSimi">
            <h3>Productos similares</h3>
            <div class="prodSimi">
                <?php include("../PhpDocs/ProductosPlus.php"); ?>
            </div>
        </div>

        <!-- sección de footer -->

        <div class="other">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top:0px"><path fill="#000" fill-opacity="1" d="M0,96L80,101.3C160,107,320,117,480,128C640,139,800,149,960,144C1120,139,1280,117,1360,106.7L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
        </div>
        <div class="footer"></div>
        <div class="imgFtr"><img src="../ExtraDocs/UK.png" height="70" width="70" class="logo"></div>
        <ul class="textContent">
            <li><i class="fa-solid fa-at"></i>   talia.gutierrezal@uanl.edu.mx</li>
            <li><i class="fa-solid fa-at"></i>   talia.gutierrezal@uanl.edu.mx</li>
        </ul>
        <ul class="socialMedia">
            <li><i class="fa-brands fa-instagram"></i>   Instagram</li>
            <li><i class="fa-brands fa-twitter"></i>   Twitter</li>
        </ul>

        <!-- fin sección de footer -->

    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Producto.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>