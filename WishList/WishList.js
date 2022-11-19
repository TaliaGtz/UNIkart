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
    Modal('Agregar Lista', 
    '<div class="user"><img src="../ExtraDocs/Menu.png" height="100" width="100" id="image" alt="Imagen" class="file"></div>' + 
    '<form runat="server" action class="image"><div class="image"><label id="archivo" for="archivo">Cambiar imagen</label><input type="file" id="userPic" name="archivo" onclick="read()"/></div></form>' + 
    '<p> Nombre de la lista: <input type="text" name="nombre" class="nombre" contenteditable="true" required/></p>' + 
    '<br>' + '<br>' + 
    '<p> Categoría: <input type="radio" name="Categoria" value="Categoría 1" required/> Categoría 1 <input type="radio" name="Categoria" value="Categoría 2" required/> Categoría 2 </p>' + 
    '<br>' + '<br>' + 
    '<p> Privacidad: <input type="radio" name="Privacidad" value="Privado" required/> Privado <input type="radio" name="Privacidad" value="Público" required/> Público </p>' + 
    '<br>' + '<br>' + 
    '<p>Descripción:</p>' + '<br>' + 
    '<div id="commentBox" contenteditable="true" dir="auto" class="commentBox" placeholder="Agrega un comentario..."></div>' +
    '</div><div><button id="buy" onclick="agregar()">Agregar</button></div><div id="modButtons"><a id="mclose" href="#">', 
    'Aceptar');
});

function agregar(){
    i = i + 1;
    var html = document.querySelector("#contenido");

    panel = document.createElement('article');
    panel.setAttribute('id', 'article' + i);
    panel.setAttribute('class', 'article');
    panel.setAttribute('style', 'display: block');
    html.appendChild(panel);

    var icon = document.createElement('img');
    icon.setAttribute('src', '../ExtraDocs/Menu.png');
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
    name.textContent = "Lista" + i;
    divisor.appendChild(name);

    var msgRB = document.createElement('p');
    msgRB.textContent = "categoría";
    divisor.appendChild(msgRB);

    var msgRB = document.createElement('p');
    msgRB.textContent = "privada/pública";
    divisor.appendChild(msgRB);
    
    msg = document.createElement('p');
    msg.textContent = "Descripción";
    divisor.appendChild(msg);

    var view = document.createElement('a');
    view.setAttribute('id', 'arrow');
    view.setAttribute('href', '../ListN/ListN.php');
    divisor.appendChild(view);

    var arrow = document.createElement('i');
    arrow.setAttribute('id', 'view');
    arrow.setAttribute('class', 'fa-solid fa-circle-chevron-right');
    view.appendChild(arrow);

    var br = document.createElement('br');
    divisor.appendChild(br);

    var hr = document.createElement('hr');
    divisor.appendChild(hr);

    borrar('modal');
}

$("#eliminar").click(function(){
    j = j + 1;
    $("#article" + j).remove();       //Quita todo el código que tenga que ver con la lista
});

/*Alert*/
function borrar(id) {
    var elem = document.getElementById(id); 
    return elem.parentNode.removeChild(elem);
}

function msj(titulo, contenido, idioma) {
var padre = document.createElement('div');
padre.id = 'modal';
document.body.appendChild(padre);
var bc = idioma ? idioma : 'Aceptar';
var ModalData = document.getElementById("modal");
var boton = "";
ModalData.innerHTML = '<div id="modal-back"></div><div class="modal"><div id="modal-c"><h3>'+titulo+'</h3><span id="mc">'+contenido+'</span><div id="buttons"><a id="mclose" href="#">'+bc+'</a>'+boton+'</div></div></div>';
document.querySelector(".modal").style.height = document.getElementById("mc").offsetHeight+100 + 'px';
document.getElementById('mclose').onclick=function(){ borrar('modal'); };
document.getElementById('modal-back').onclick=function(){ borrar('modal'); }
}

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
    '</div>'+
    '</form><div><a href="../SisPago/SisPago.php"><button id="buy">Ir a pagar</button></a></div><div id="modButtons"><a id="mclose" href="#">',   
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
    + titulo +'</h3><div id="mc">'
    + contenido
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

/*Cambio de imagen*/
var reader;
var input2;
var texto;

function readURL(input) {
    input2 = input;
    if (input.files && input.files[0]) { //Revisamos que el input tenga contenido
      reader = new FileReader(); //Leemos el contenido
      
      reader.onload = function(e) { //Al cargar el contenido lo pasamos como atributo de la imagen de arriba
        $('#image').attr('src', e.target.result);
        
      }
      
      reader.readAsDataURL(input.files[0]);
    }
}

function read(){
    $("#userPic").change(function() { //change: Cuando el input cambie (se cargue un nuevo archivo) se va a ejecutar de nuevo el cambio de imagen y se verá reflejado.
        /*console.log("sg");*/
        readURL(this);
        
    });
}