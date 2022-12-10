const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");
var num = 2;
navToggle.addEventListener("click", ()=>{
    //navMenu.classList.toggle("nav-menu_visible");
    
    if(num == 1){
        toggle(2);
        num = 2;
        return;
    }
    if(num == 2){
        toggle(1);
        num = 1;
        return;
    }
});

function toggle(num){
    if(num == 1){
        document.getElementById("navList").style = "display: flex";
        document.getElementById("iBars").classList.add("moveBars");
        document.getElementById("iBars").classList.remove("resetBars");
    }

    if(num == 2){
        document.getElementById("navList").style = "display: none";
        document.getElementById("iBars").classList.add("resetBars");
        document.getElementById("iBars").classList.remove("moveBars");
    }
}

$(window).on("load",function checkPosition(){
    if($(window).width() > 843)
    {
        document.getElementById("navList").removeAttribute("style");
    }
});

////////////////////////////////////////////////////////////////

/*Cart*/
$("#cart").click(function(){
    Modal('Carrito de compras', 
    '<div class="user">'+
        '<img src="../ExtraDocs/Soup.png" height="70" width="70" id="image" alt="Imagen" class="file">'+
        '<p class="productName">Producto</p>'+
        '<i class="fa-solid fa-square-minus quantity"></i>'+
        '<p class="quantityNum">1</p>'+
        '<i class="fa-solid fa-square-plus quantity"></i>'+
    '</div>'+
    '<div class="user">'+
        '<img src="../ExtraDocs/Soup.png" height="70" width="70" id="image" alt="Imagen" class="file">'+
        '<p class="productName">Producto</p>'+
        '<i class="fa-solid fa-square-minus quantity"></i>'+
        '<p class="quantityNum">1</p>'+
        '<i class="fa-solid fa-square-plus quantity"></i>'+
    '</div>',   
    'Cerrar');
});

function addCart(){
    Modal('Carrito de compras', 
    '<div class="user">'+
        '<img src="../ExtraDocs/Soup.png" height="70" width="70" id="image" alt="Imagen" class="file">'+
        '<p class="productName">Producto</p>'+
        '<i class="fa-solid fa-square-minus quantity"></i>'+
        '<p class="quantityNum">1</p>'+
        '<i class="fa-solid fa-square-plus quantity"></i>'+
    '</div>'+
    '<div class="user">'+
        '<img src="../ExtraDocs/Soup.png" height="70" width="70" id="image" alt="Imagen" class="file">'+
        '<p class="productName">Producto</p>'+
        '<i class="fa-solid fa-square-minus quantity"></i>'+
        '<p class="quantityNum">1</p>'+
        '<i class="fa-solid fa-square-plus quantity"></i>'+
    '</div>',   
    'Cerrar');
};

/*Modal*/
function borrarModal(id) {
    var elem = document.getElementById(id); 
    return elem.parentNode.removeChild(elem);
}

function Modal(titulo, contenido, idioma) {
    var padre = document.createElement('div');
    padre.id = 'modal';
    document.body.appendChild(padre);
    var bc = idioma ? idioma : 'Aceptar';
    var ModalData = document.getElementById("modal");
    var boton = "";
    ModalData.innerHTML = '<div id="modal-back"></div><div class="newModal"><div id="modal-new"><h3>'
    + titulo +'</h3><form id="mc">'
    + contenido +'</form><div><a href="../SisPago/SisPago.html"><button id="buy">Ir a pagar</button></a></div><div id="modButtons"><a id="mclose" href="#">'
    + '<i id="close" class="fa-solid fa-circle-xmark"></i>' +'</a>' 
    + boton + '</div></div></div>';
    document.querySelector(".newModal").style.height = document.getElementById("mc").offsetHeight + 200 + 'px';
    document.getElementById('mclose').onclick = function(){ 
        borrarModal('modal'); 
    };
    document.getElementById('modal-back').onclick = function(){ 
        borrarModal('modal'); 
    }
}

////////////////////////////////////////////////////////////////
var select = 2;

/*Eleccion radio buttons*/
const payToggle = document.querySelector("#eleccion");
payToggle.addEventListener("click", ()=>{
    var selCategory;
    selCategory = RBSelected();
    if(selCategory == 1){
        document.getElementById("Efectivo").style = "display: block";
        document.getElementById("Tarjeta").style = "display: none";
        document.getElementById("PayPal").style = "display: none";
        document.getElementById("pay").innerText = "Aceptar";
        document.getElementById("pay").style = "display: block";
        var strLink = "../Pagado/pagado.php?Key=" + selCategory;
        document.getElementById("link").setAttribute("href",strLink);
    }
    if(selCategory == 2){
        document.getElementById("Efectivo").style = "display: none";
        document.getElementById("Tarjeta").style = "display: block";
        document.getElementById("PayPal").style = "display: none";
        document.getElementById("pay").innerText = "Pagar";
        document.getElementById("pay").style = "display: block";
        var strLink = "../Pagado/pagado.php?Key=" + selCategory;
        document.getElementById("link").setAttribute("href",strLink);
    }
    if(selCategory == 3){
        document.getElementById("Efectivo").style = "display: none";
        document.getElementById("Tarjeta").style = "display: none";
        document.getElementById("PayPal").style = "display: block";
        document.getElementById("pay").style = "display: none";
        //document.getElementById("pay").innerText = "Pagar";
        var strLink = "../Pagado/pagado.php?Key=" + selCategory;
        document.getElementById("link").setAttribute("href",strLink);
    }
});

function RBSelected(){
    if(document.getElementById('efectivo').checked){
        select = 1;
        return 1;
    }
    if(document.getElementById('tarjeta').checked){
        select = 2;
        return 2;
    }
    if(document.getElementById('paypal').checked){
        select = 3;
        return 3;
    }
}