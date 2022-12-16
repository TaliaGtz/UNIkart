<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>UNIkart - Landing Page</title>
    <link rel="stylesheet" href="Landing.css">
    <script src="https://kit.fontawesome.com/29079834be.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../ExtraDocs/Ukart.png">
</head>
<body>
    <header class="header">
        <nav class="nav">
            <img src="../ExtraDocs/UK.png" height="70" width="70" class="logo">
            <div class="empty"></div>
            <div class="empty"></div>
            <div class="empty"></div>
            <div class="empty"></div>
            <div class="empty"></div>
            <button type="button" id="SpBtns" class="SpBtns">Iniciar Sesión</button>
            <button type="button" id="regSpBtns" id="SpBtns" class="SpBtns">Registrarse</button>
            <ul id="navList" class="nav-menu" >
                <a href="https://google.mx" class="nav-menu-link nav-link"><li class="nav-menu-item">Acerca de</li></a>
                <a href="../ExtraDocs/Contact.html" class="nav-menu-link nav-link"><li class="nav-menu-item">Contacto</li></a>
                <a href="https://peacefuloak2020.wixsite.com/peaceful-oak" class="nav-menu-link nav-link"><li class="nav-menu-item">Blog</li></a>
                <a href="../ExtraDocs/FAQ.html" class="nav-menu-link nav-link"><li class="nav-menu-item">Ayuda</li></a>
                <a href="../loginyregistro/login.html" class="nav-menu-link nav-link"><li class="nav-menu-item liSpBtns">Iniciar Sesión</li></a>
                <a href="../loginyregistro/register.html" class="nav-menu-link nav-link"><li class="nav-menu-item liSpBtns" id="register">Registrarse</li></a>
            </ul>  
            <button id="bars" class="nav-toggle"><i id="iBars" class="fas fa-bars"></i></button>
        </nav>
    </header>

    <section class="grid">
        
        <div class="grid_texts">
            <h2 class="grid_title">UNI kart</h2>
            <h2 class="grid_title grid_title--transform">Llegamos a donde quieras</h2>
            <!--<h2>50 personas ya decidieron tener una vida más sencilla ¿Y tú?</h2>-->
        </div>
        
        <!--<center>
        <div class="plain_text">
            <p>Apoyando tus negocios locales favoritos como:</p>
        </div>
        </center>-->

        <div class="space"></div>
        <div class="space2"></div>

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
    <script src="Landing.js"></script>
</body>
</html>