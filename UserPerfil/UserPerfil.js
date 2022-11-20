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

var reader;
var input2;
var texto;
//var alm;
function readURL(input) {
    input2 = input;
    if (input.files && input.files[0]) { //Revisamos que el input tenga contenido
      reader = new FileReader(); //Leemos el contenido
      
      reader.onload = function(e) { //Al cargar el contenido lo pasamos como atributo de la imagen de arriba
        $('#image').attr('src', e.target.result);
        
        // Simulate a click every second
        setInterval(clickButton, 1000);

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Registro insertado exitosamente',
            showConfirmButton: true,
            timer: 10500
        });
      }
      
      reader.readAsDataURL(input.files[0]);
    }
}
  
$("#userPic").change(function() { //Cuando el input cambie (se cargue un nuevo archivo) se va a ejecutar de nuevo el cambio de imagen y se verá reflejado.
    /*console.log("sfd");*/
    readURL(this);
});

// Simulate click function
function clickButton() {
    document.querySelector('#sendImg').click();
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
    document.getElementById('modal-back').onclick = function(){ borrar('modal'); }
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

function validatePriv() {
    if (document.getElementById('toggle').checked) {
        $('.private').css('display','none');
        $('.no-private').css('display','block');
    } else {
        $('.private').css('display','block');
        $('.no-private').css('display','none');
    }
}

/*Eleccion radio buttons*/
/*const roleToggle = document.querySelector("#select");
roleToggle.addEventListener("click", ()=>{
    var selRole;
    selRole = RBSelected();
    if(selRole == 1){
        document.getElementById("toggle").disabled = false;
        $('.vendedor').css('display','none');
        $('.admin').css('display','none');
    }
    if(selRole == 2){
        document.getElementById("toggle").checked = true;
        $('.private').css('display','none');
        $('.no-private').css('display','block');
        $('.vendedor').css('display','block');
        $('.admin').css('display','none');
        document.getElementById("toggle").disabled = true;
    }
    if(selRole == 3){
        document.getElementById("toggle").checked = true;
        $('.private').css('display','none');
        $('.no-private').css('display','block');
        $('.vendedor').css('display','none');
        $('.admin').css('display','block');
        document.getElementById("toggle").disabled = true;
    }
});*/
/*
function RBSelected(){
    if(document.getElementById('comp').checked){
        select = 1;
        return 1;
    }
    if(document.getElementById('vend').checked){
        select = 2;
        return 2;
    }
    if(document.getElementById('admin').checked){
        select = 3;
        return 3;
    }
}*/