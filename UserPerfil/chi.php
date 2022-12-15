<?php

    include("../PhpDocs/Conexion.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - Perfil</title>
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../ExtraDocs/Ukart.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  
    <?php
        if(isset($_REQUEST['guardar'])){
            if(isset($_FILES['archivo']['name'])){
                $tipoArchivo = $_FILES['archivo']['type'];
                $nombreArchivo = $_FILES['archivo']['name'];
                $sizeArchivo = $_FILES['archivo']['size'];
                $imagenSubida = fopen($_FILES['archivo']['tmp_name'], 'r');
                $binImagen = fread($imagenSubida, $sizeArchivo);
                $binImagen=mysqli_escape_string($conexion, $binImagen);
                
                $query = "INSERT INTO media (nombre, imagen, tipo)
                        VALUES('".$nombreArchivo."', '".$binImagen."', '".$tipoArchivo."')";
                
                if(mysqli_query($conexion, $query)){  //Ejecutamos el query y verificamos si se guardaron los datos
                    ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        Registro insertado exitosamente
                    </div>
                    
                    <?php
                    //echo "alert('Tu foto ha sido guardada')";
                    //header("Location: http://localhost:8080/e-class2/PhpFks/leerImg.php");
                }else{
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        Error <?php echo mysqli_error($con); ?>
                    </div>
                    <?php
                    //echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                }

            }
        }
    ?>
    <form runat="server" method="POST" class="image" enctype="multipart/form-data">
        <input type="file" name="archivo" />  <!--disabled-->
        <button type="submit" name="guardar">Enviar</button>
       
    </form>
             
 


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>