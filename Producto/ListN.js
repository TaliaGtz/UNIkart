const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");
var num = 2;
var i = 0;
var j = 0;
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

$("#publicar").click(function(){
    i = i + 1;
    var html = document.querySelector("#contenido");

    panel = document.createElement('article');
    panel.setAttribute('id', 'article' + i);
    panel.setAttribute('class', 'article');
    panel.setAttribute('style', 'display: block');
    html.appendChild(panel);

    var icon = document.createElement('img');
    icon.setAttribute('src', '../ExtraDocs/Soup.png');
    icon.setAttribute('height', '70');
    icon.setAttribute('width', '70');
    icon.setAttribute('id', 'image');
    icon.setAttribute('alt', 'Imagen');
    icon.setAttribute('class', 'file');
    panel.appendChild(icon);

    divisor = document.createElement('div');
    divisor.setAttribute('class', 'contDiv');
    panel.appendChild(divisor);

    var name = document.createElement('h2');
    name.textContent = "Nombre del producto";
    divisor.appendChild(name);

    var msgRB = document.createElement('p');
    msgRB.textContent = "Descripción";
    divisor.appendChild(msgRB);

    var msgRB = document.createElement('p');
    msgRB.textContent = "precio/a negociar";
    divisor.appendChild(msgRB);
    
    msg = document.createElement('p');
    msg.textContent = "Media(img,mp4)";
    divisor.appendChild(msg);

    var view = document.createElement('a');
    view.setAttribute('id', 'arrow');
    view.setAttribute('href', '../Producto/Producto.php');
    divisor.appendChild(view);

    var arrow = document.createElement('i');
    arrow.setAttribute('id', 'view');
    arrow.setAttribute('class', 'fa-solid fa-circle-chevron-right');
    view.appendChild(arrow);

    var xmark = document.createElement('i');
    xmark.setAttribute('id', 'xmark');
    xmark.setAttribute('class', 'fa-solid fa-circle-xmark quitar visQuitar2');
    divisor.appendChild(xmark);

    var br = document.createElement('br');
    divisor.appendChild(br);

    var hr = document.createElement('hr');
    divisor.appendChild(hr);

});

$("#xmark").click(function(){
    j = j + 1;
    $("#article" + j).remove();       //Quita todo el código que tenga que ver con la lista
    //document.getElementById("xmark").classList.add("visQuitar");
    //document.getElementById("xmark").classList.remove("visQuitar2");
});

$("#eliminar").click(function(){
    //j = j + 1;
    //$("#article" + j).remove();       //Quita todo el código que tenga que ver con la lista
    document.getElementsByClassName("quitar").classList.remove("visQuitar2");
    document.getElementsByClassName("quitar").classList.add("visQuitar");
});

$("#listo").click(function(){
    //j = j + 1;
    //$("#article" + j).remove();       //Quita todo el código que tenga que ver con la lista
    document.getElementById("quitar").classList.remove("visQuitar");
    document.getElementById("quitar").classList.add("visQuitar2");
});

/*Cart
$("#cart").click(function(){
    Modal('Carrito de compras', 
    '<div class="user">'+
        '<i id="xmark" class="fa-solid fa-circle-xmark quitar visQuitar2"></i>'+
        '<img src="../ExtraDocs/Soup.png" height="70" width="70" id="image" alt="Imagen" class="file">'+
        '<p class="productName">Producto</p>'+
        '<i class="fa-solid fa-square-minus quantity borrar"></i>'+
        '<p class="quantityNum">1</p>'+
        '<i class="fa-solid fa-square-plus quantity"></i>'+
    '</div>'+
    '<div class="user">'+
        '<i id="xmark" class="fa-solid fa-circle-xmark quitar visQuitar2"></i>'+
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
};*/

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