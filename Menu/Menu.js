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
    + contenido +'</form><div><a href="../SisPago/SisPago.php"><button id="buy">Ir a pagar</button></a></div><div id="modButtons"><a id="mclose" href="#">'
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

/*PlusSomething*/
$("#Plus").click(function(){
    Plus('Agregar producto', 
    '<p>(Podrás editar la ventana de tu producto pero éste aún deberá de ser aprobado por el administrador)</p><br>'+
    '<p>Nombre del producto: </p>'+
    '<input id="prodName" type="text"><br><br>'+
    '<p>Precio: </p>'+
    '<input type="radio" name="precio" class="precio"><input type="number" class="precio" placeholder="00.00">'+
    '<label><input type="radio" name="precio" class="precio">A cotizar</label><br><br>'+
    '<label>Categoría(s):</label><br><br>'+
    '<input type="checkbox" class="CB" name="checkbox"><label for="demoCheckbox"> Check me!</label>'+
    '<br><br><label>Disponibilidad: </label><input type="number" class="precio" placeholder="0"><br><br>'+
    '<label>Descripción:</label><br><textarea id="txtid" name="txtname" rows="4" cols="50" maxlength="200"></textarea>',   
    'Cerrar');
});

function Plus(titulo, contenido, idioma) {
    var padre = document.createElement('div');
    padre.id = 'modal';
    document.body.appendChild(padre);
    var bc = idioma ? idioma : 'Aceptar';
    var ModalData = document.getElementById("modal");
    var boton = "";
    ModalData.innerHTML = '<div id="modal-back"></div><div class="newModal"><div id="modal-new"><h3>'
    + titulo +'</h3><form id="mc">'
    + contenido +'<div><button id="buy" type="submit" method="POST" action="../Home/AddCat.php">Agregar</button></div></form><div id="modButtons"><a id="mclose" href="#">'
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

function agregar_cat(){
    var name = document.getElementById("prodName").value;
    var html = document.querySelector("#menu");

    if(name == ""){
        return;
    }

    var panel = document.createElement('div');
    panel.setAttribute('class', 'card');
    html.appendChild(panel);

    var a = document.createElement('a');
    a.setAttribute('href', '../Producto/Producto.php');
    panel.appendChild(a);

    var div2 = document.createElement('div');
    a.appendChild(div2);

    var img = document.createElement('img');
    img.setAttribute('src', '../ExtraDocs/HDBlack.png');
    img.setAttribute('width', '80px');
    img.setAttribute('height', '80px');
    div2.appendChild(img);

    var h3 = document.createElement('h3');
    h3.innerText = name;
    div2.appendChild(h3);

    var a2 = document.createElement('a');
    a2.setAttribute('href', '../WishList/WishList.php');
    a2.innerHTML = '<i id="add" class="fa-solid fa-heart-circle-plus"></i>';
    div2.appendChild(a2);

    var a3 = document.createElement('a');
    a3.setAttribute('href', '#');
    a3.setAttribute('onclick', 'addCart()');
    a3.innerHTML = '<i id="addCart" class="fa-solid fa-cart-plus"></i>';
    div2.appendChild(a3);

    borrarModal('modal');
}