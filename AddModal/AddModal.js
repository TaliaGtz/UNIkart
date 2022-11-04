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
    + contenido +'</form><div id="modButtons"><a id="mclose" href="#">'
    + bc +'</a>' 
    + boton + '</div></div></div>';
    document.querySelector(".newModal").style.height = document.getElementById("mc").offsetHeight + 150 + 'px';
    document.getElementById('mclose').onclick = function(){ 
        borrarModal('modal'); 
    };
    document.getElementById('modal-back').onclick = function(){ 
        borrarModal('modal'); 
    }
}

/*
Modal('Agregar Lista', 
    '<p> Nombre de la lista: <input type="text" name="nombre" class="nombre" contenteditable="true" required/></p>' + 
    '<br>' + '<br>' + 
    '<p> Categoría: <input type="radio" name="Categoria" value="Categoría 1" required/> Categoría 1 <input type="radio" name="Categoria" value="Categoría 2" required/> Categoría 2 </p>' + 
    '<br>' + '<br>' + 
    '<p> Privacidad: <input type="radio" name="Privacidad" value="Privado" required/> Privado <input type="radio" name="Privacidad" value="Público" required/> Público </p>' + 
    '<br>' + '<br>' + 
    '<p>Descripción:</p>' + '<br>' + 
    '<div id="commentBox" contenteditable="true" dir="auto" class="commentBox" placeholder="Agrega un comentario..."></div>', 
    'Aceptar');
*/