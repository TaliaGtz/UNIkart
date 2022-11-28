<?php

include("../PhpDocs/PhpInclude.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIkart - Chat</title>
    <link rel="icon" href="../ExtraDocs/Ukart.png">
    <link rel="stylesheet" href="chat.css">
    <link rel="stylesheet" href="../AddModal/Cart.css">
    <link rel="stylesheet" href="../ExtraDocs/Nav.css">
    <link rel="stylesheet" href="../ExtraDocs/responsive.css">
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require "../PhpDocs/Nav.php"; ?>

    <section class="body-chat">
        <!--<div class="seccion-titulo">
            <h3><i class="fas fa-comments"></i>Sistema de mensajería</h3>
        </div>
        <div class="seccion-usuarios">
            <div class="seccion-buscar">
                <div class="input-buscar">
                    <input type="search" placeholder="Buscar usuario">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <div class="seccion-lista-usuarios">
                <div class="usuario">
                    <div class="avatar">
                        <img src="../ExtraDocs/croissantBlack.png" alt="img">
                        <span class="estado-usuario enlinea"></span>
                    </div>
                    <div class="cuerpo">
                        <span> Nombre apellido</span>
                        <span>detalles de mensaje</span>
                    </div>
                    <span class="notificacion">
                        3
                    </span>
                </div>
                <div class="usuario">
                    <div class="avatar">
                        <img src="../ExtraDocs/tacoBlack.png" alt="img">
                        <span class="estado-usuario ocupado"></span>
                    </div>
                    <div class="cuerpo">
                        <span> Nombre apellido</span>
                        <span>detalles de mensaje</span>
                    </div>
                    <span class="notificacion">
                        1
                    </span>
                </div>
                <div class="usuario">
                    <div class="avatar">
                        <img src="../ExtraDocs/pretzelBlack.png" alt="img">
                        <span class="estado-usuario desconectado"></span>
                    </div>
                    <div class="cuerpo">
                        <span> Nombre apellido</span>
                        <span>detalles de mensaje</span>
                    </div>
                    <span class="notificacion">
                        1
                    </span>
                </div>
            </div>
        </div>-->
        <div class="seccion-chat">
            <div class="usuario-seleccionado">
                <div class="avatar">
                    <img src="../ExtraDocs/pizzaBlack.png" alt="img">
                </div>
                <div class="cuerpo">
                    <span>Nombre de usuario</span>
                    <span>Activo - Escribiendo...</span>
                </div>
                <div class="opciones">
                    <ul>
                        <li>
                            <button type="button"><i class="fas fa-video"></i></button>
                        </li>
                        <li>
                            <button type="button"><i class="fas fa-phone-alt"></i></button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-chat">
                <div class="mensaje">
                    <div class="avatar">
                        <img src="../ExtraDocs/pizzaBlack.png" alt="img">
                    </div>
                    <div class="cuerpo">
                        <div class="texto">
                            Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Dolor eligendi voluptatum dolore voluptas iure.
                            <span class="tiempo">
                                <i class="far fa-clock"></i>
                                Hace 5 min
                            </span>
                        </div>
                        <ul class="opciones-msj">
                            <li>
                                <button type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button">
                                    <i class="fas fa-share-square"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mensaje">
                    <div class="avatar">
                        <img src="../ExtraDocs/pizzaBlack.png" alt="img">
                    </div>
                    <div class="cuerpo">
                        <div class="texto">
                            Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Dolor eligendi voluptatum dolore voluptas iure.
                            <span class="tiempo">
                                <i class="far fa-clock"></i>
                                Hace 3 min
                            </span>
                        </div>
                        <ul class="opciones-msj">
                            <li>
                                <button type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button">
                                    <i class="fas fa-share-square"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- derecha -->
                <div class="mensaje left">
                    <div class="cuerpo">
                        <div class="texto">
                            Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Dolor eligendi voluptatum dolore voluptas iure.
                            <span class="tiempo">
                                <i class="far fa-clock"></i>
                                Hace 3 min
                            </span>
                        </div>
                        <ul class="opciones-msj">
                            <li>
                                <button type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button">
                                    <i class="fas fa-share-square"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="avatar">
                        <img src="../ExtraDocs/donaBlack.png" alt="img">
                    </div>
                </div>
                <div class="mensaje">
                    <div class="avatar">
                        <img src="../ExtraDocs/pizzaBlack.png" alt="img">
                    </div>
                    <div class="cuerpo">
                        <div class="texto">
                            Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Dolor eligendi voluptatum dolore voluptas iure.
                            <span class="tiempo">
                                <i class="far fa-clock"></i>
                                Hace 2 min
                            </span>
                        </div>
                        <ul class="opciones-msj">
                            <li>
                                <button type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button">
                                    <i class="fas fa-share-square"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- derecha -->
                <div class="mensaje left">
                    <div class="cuerpo">
                        <div class="texto">
                            Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Dolor eligendi voluptatum dolore voluptas iure.
                            <span class="tiempo">
                                <i class="far fa-clock"></i>
                                Hace 1 min
                            </span>
                        </div>
                        <ul class="opciones-msj">
                            <li>
                                <button type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button">
                                    <i class="fas fa-share-square"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="avatar">
                        <img src="../ExtraDocs/donaBlack.png" alt="img">
                    </div>
                </div>
                <!-- derecha -->
                <div class="mensaje left">
                    <div class="cuerpo">
                        <div class="texto">
                            Lorem ipsum dolor sit, amet consectetur adipisicing, elit.
                            <span class="tiempo">
                                <i class="far fa-clock"></i>
                                Recién
                            </span>
                        </div>
                        <ul class="opciones-msj">
                            <li>
                                <button type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button">
                                    <i class="fas fa-share-square"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="avatar">
                        <img src="../ExtraDocs/donaBlack.png" alt="img">
                    </div>
                </div>
            </div>
            <div class="panel-escritura">
                <form class="textarea">
                    <div class="opcines">
                        <button type="button">
                            <i class="fas fa-file"></i>
                            <label for="file"></label>
                            <input type="file" id="file">
                        </button>
                        <button type="button">
                            <i class="far fa-image"></i>
                            <label for="img"></label>
                            <input type="file" id="img">
                        </button>
                    </div>
                    <textarea placeholder="Escribir mensaje"></textarea>
                    <button type="button" class="enviar">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="chat.js"></script>
</body>
</html>