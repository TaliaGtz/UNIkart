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
        /*document.getElementById("regSpBtns").style = "height: 80px";*/
        document.getElementById("iBars").classList.add("moveBars");
        document.getElementById("iBars").classList.remove("resetBars");
    }

    if(num == 2){
        document.getElementById("navList").style = "display: none";
        /*document.getElementById("regSpBtns").style = "height: 80px";*/
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

///////////////////////////////////////

    var i = 0;
    var iCat = 1;
    var valCat;
    var panel;
    var btn;
    var msg;
    var msg2;
    var msg3;
    var text2;
    var date2;
    var html2 = document.querySelector("#option");
    var selected;
    var selectedDate;
    var selected2;
    var selectedRB;
    var a = [];
    var pags = 1;
    var actualPage = 0;
    var date;
    var day;
    var month;
    var year;
    var dayAux;
    var monthAux;
    var yearAux;
    var div;
    var divCB


const debounce = (fn) => {
    let frame;
    return (...params) => {
      if (frame) { 
        cancelAnimationFrame(frame);
      }
      frame = requestAnimationFrame(() => {
        fn(...params);
      });
    } 
};
const storeScroll = () => {
    document.documentElement.dataset.scroll = window.scrollY;
}
document.addEventListener('scroll', debounce(storeScroll), { passive: true });
storeScroll();

$("#publicar").click(function(){
    
    var text = document.getElementById("commentBoxP");   //Toma el texto del commentBox
    date = document.querySelector('input[type="date"]');   //Toma el texto del DateTimePicker
    //var selCategory = RBSelected();
    //if(selCategory == "Categoría 1" || selCategory == "Categoría 2" || selCategory == "Categoría 3"){
        //console.log(text.innerHTML);
        //console.log(date.value);
        //console.log(date.value);

        if(i == 5 || i == 10 || i == 15){
            pags = pags + 1;

            var html2 = document.querySelector("#contenido");
            var panel2 = document.createElement('div');
            panel2.setAttribute('id', 'pag' + pags);
            html2.appendChild(panel2);

            var html3 = document.querySelector("#ulli");
            var panel3 = document.createElement('li');
            panel3.setAttribute('type', "button");
            panel3.setAttribute('id', "li" + pags);
            panel3.setAttribute('onclick', `nPags(${pags})`);
            panel3.textContent = pags;
            html3.appendChild(panel3);

        }

        displayPost(text.innerHTML, date.value, pags);
        savePost(text.innerHTML);
        //displayDate(i, date.value, msg2);selCategory
        
        document.getElementById("commentBoxP").innerHTML = "";     //Limpia el commentBox
        document.getElementById("datepkd").value = "2022-01-01";     //Limpia el DateTimePicker
        /*document.getElementById("IDCat1").checked = false;     //Limpia los RadioButtons
        document.getElementById("IDCat2").checked = false;     //Limpia los RadioButtons
        document.getElementById("IDCat3").checked = false;     //Limpia los RadioButtons*/
        i = i + 1;
        //iCat = iCat + 1;

    //}//else{
        /*if(date.value == "2022-01-01"){
            alert("La categoría es obligatoria");
        }*/
        //msj('TestBlog', 'La categoría es obligatoria', 'Cerrar');
        //alert("La categoría es obligatoria");
    //}

});
//category
function displayPost(msgText, date, pag) {
    var html = document.querySelector(`#pag${pag}`);

    panel = document.createElement('article');
    panel.setAttribute('class', 'article');
    panel.setAttribute('id', 'article' + i);
    panel.setAttribute('style', 'display: block');
    html.appendChild(panel);

    var name = document.createElement('h2');
    name.textContent = "User";
    panel.appendChild(name);
    /*
    var msgRB = document.createElement('p');
    msgRB.setAttribute('id', 'IDCatArt' + iCat);
    msgRB.setAttribute('class', 'CatIDC');
    msgRB.setAttribute('value', valCat);
    msgRB.textContent = category;
    panel.appendChild(msgRB);*/
    
    msg = document.createElement('p');
    msg.setAttribute('id', 'postID' + i);
    msg.textContent = msgText;
    panel.appendChild(msg);

    var datmsg = document.createElement('input');
    datmsg.setAttribute('type', 'date');
    datmsg.setAttribute('id', 'dateID' + i);
    datmsg.setAttribute('class', 'datepkdP');
    //console.log(date);
    datmsg.setAttribute('value', date);
    datmsg.setAttribute('disabled', 'true');
    panel.appendChild(datmsg);

    btn = document.createElement('button');
    btn.setAttribute('class', 'editBtn');
    btn.setAttribute('onclick', `editar(${i})`);
    btn.setAttribute('id', 'idEditBtn' + i);
    btn.innerHTML = "<img src='../ExtraDocs/editar.png' id='editImg'/>";
    panel.appendChild(btn);

    var btn2 = document.createElement('button');
    btn2.setAttribute('class', 'deleteBtn');
    btn2.setAttribute('onclick', 'eliminar()');     //`eliminar(${i})`
    btn2.setAttribute('id', i);
    btn2.innerHTML = "<img src='../ExtraDocs/delete.png' id='deleteImg'/>";
    panel.appendChild(btn2);
    
}

function editar(IDedit){

    document.getElementById("idEditBtn" + IDedit).innerHTML = "<img src='../ExtraDocs/listo.png' id='doneImg'/>";

    document.getElementById("dateID" + IDedit).disabled = false;

    document.getElementById("postID" + IDedit).hidden = false;
    
    divCB = document.querySelector(`#article${IDedit}`);
    div = document.createElement('div'); 
    div.setAttribute('id', 'commentBox2');
    div.setAttribute('name', 'commentBoxWaste');
    div.setAttribute('contenteditable', 'true');
    div.setAttribute('dir', 'auto');
    div.setAttribute('class', 'commentBox2');
    div.setAttribute('placeholder', 'Edita tu comentario...');      //msg.textContent
    divCB.appendChild(div);

    text2 = document.getElementById("commentBox2");       //Toma el texto del commentBox

    document.getElementById("idEditBtn" + IDedit).removeAttribute('onclick');
    document.getElementById("idEditBtn" + IDedit).setAttribute('onclick', `listo(${IDedit})`);
}

function listo(IDedit){
    divCB = document.querySelector(`#article${IDedit}`);

    $("img[id=doneImg]").click(function() {
        document.getElementById("postID" + IDedit).textContent = text2.innerHTML;

        var artDate = document.getElementById("dateID" + IDedit);
        divCB.removeChild(div);

        $("div").click(function() {
            $("#commentBox2").remove();       //Quita todo el código que tenga que ver con la lista
            document.getElementById("idEditBtn" + IDedit).innerHTML = "<img src='../ExtraDocs/editar.png' id='editImg'/>";
            document.getElementById("dateID" + IDedit).disabled = true;
            //console.log("dateID" + editBtn);
            document.getElementById("idEditBtn" + IDedit).removeAttribute('onclick');
            document.getElementById("idEditBtn" + IDedit).setAttribute('onclick', `editar(${IDedit})`);
            //return;
        });
    });

}

function eliminar(){
    var waste;
    $("img[id=deleteImg]").click(function() {
        $("button").click(function() {
            waste = $(this).attr("id");
            //console.log("id:" + " " + waste);
            //console.log("dateIDPK" + waste);
            
            displayDateDis(waste);
            $("#article" + waste).remove();       //Quita todo el código que tenga que ver con la lista
            
        });
    });

}
/*
function displayDate(num, date, msgN) {     //ID, fecha, msg

    if(i == 0){

        msgN = document.createElement('option');
        msgN.setAttribute('id', 'dateIDPK' + num);
        msgN.setAttribute('value', num);
        msgN.textContent = date;
        html2.appendChild(msgN);
        a.push(i);
        a[i] = [date]
        //day = date.substring(8, 10);     //Categoría x: x
        //month = date.substring(5, 7);     //Categoría x: x
        //year = date.substring(0, 4);     //Categoría x: x

    }else{
        var check = true;
        //dayAux = day;
        //monthAux = month;
        //yearAux = year;

        //day = date.substring(8, 10);     //Categoría x: x
        //month = date.substring(5, 7);     //Categoría x: x
        //year = date.substring(0, 4);     //Categoría x: x

        //var f1 = new Date(year, month, day);
        //var f2 = new Date(yearAux, monthAux, dayAux);
        //if (f1.getTime() == f2.getTime()){
            //console.log("Son la misma fecha");
        //}else{
            //console.log("No son la misma fecha");
            for (var j = 0; j <= a.length; j++) {
                //console.log(a[j]);
                if (a[j] == date){
                    check = false;
                    return;
                }else{
                    j = j + 1;
                }
            }
            if(check){
                msgN = document.createElement('option');
                msgN.setAttribute('id', 'dateIDPK' + num);
                msgN.setAttribute('value', num);
                msgN.textContent = date;
                html2.appendChild(msgN);
                a.push(i);
                a[i] = [date]  
            }
            
        //}
        
    }
}*/

function displayDateMod(editID, artDate) {      //ID, fecha
    
    var selectobject = document.getElementById('dateIDPK' + editID);
    //console.log(selectobject.id);
    html2.removeChild(selectobject);
    
    displayDate(editID, artDate, msg3);
   
}

function displayDateDis(trashID) {      //ID
    
    var selectobject = document.getElementById('dateIDPK' + trashID);
    var selectobjectRB = document.getElementById('Categoría ' + trashID);
    //console.log(selectobject.id);
    html2.remove(selectobject);
    html2.remove(selectobjectRB);
   
}

function ShowSelected(num){
    if(num == 1){
        //Para obtener el texto
        var combo = document.getElementById("option");
        selectedDate = combo.options[combo.selectedIndex].text;
        selected = combo.options[combo.selectedIndex].value;
        //console.log(selectedDate);
        //console.log(selected);
        return selectedDate;
    }

    if(num == 2){
        //Para obtener el texto
        var combo2 = document.getElementById("optionRB");
        selectedRB = combo2.options[combo2.selectedIndex].text;
        selected2 = combo2.options[combo2.selectedIndex].value;
        //console.log(selectedRB);
        //console.log(selected2);
        return selected2;
    }
    
}
/*
function filtrar(num){

    const article0 = document.getElementById("article0");
    if (!article0) {
        return;
    }
        
    
    if(num == 1){

        if($('#pag1').css('display') === 'block'){
            actualPage = 1;
        }else{
            actualPage = 2;
        }

        var idPag1 = "pag1";
        document.getElementById(idPag1).style = 'display: block'; 
        const pag2 = document.getElementById("pag2");
        if (pag2) {
            var idPag2 = "pag2";
            document.getElementById(idPag2).style = 'display: block'; 
        }

        var dateFilter = ShowSelected(1);

        for(var k = 0; k <= i; k++){
            if(k == i){
                break;
            }
            //var dateFilter = ShowSelected(1);
            var dateArticle = document.getElementById("dateID" + k);
            if(dateFilter == dateArticle.value){
                document.getElementById('article' + k).style = 'display: block';
            }else{
                document.getElementById('article' + k).style = 'display: none';
            }
        }
    }
    
    if(num == 2){ 

        if($('#pag1').css('display') === 'block'){
            actualPage = 1;
        }else{
            actualPage = 2;
        }

        var idPag1 = "pag1";
        document.getElementById(idPag1).style = 'display: block'; 
        const pag2 = document.getElementById("pag2");
        if (pag2) {
            var idPag2 = "pag2";
            document.getElementById(idPag2).style = 'display: block'; 
        }
        
        var CatFilter = ShowSelected(2);

        //valores de los artículos
        for(var r = 1; r <= i; r++){        //Recorre los elementos totales
            var attr = document.getElementById("IDCatArt" + (r));
            //console.log(attr.innerText);      //Trae el texto de p: "Categoría x"
            var attr2 = attr.innerText.substring(10, 11);       //Devuelve del caracter 10 al 11, o sea el número
            //console.log(attr2);
            //console.log(C1);
            if(attr2 == CatFilter){     // artículo == selección
                var idArt = "article" + (r - 1);
                document.getElementById(idArt).style = 'display: block';    //Muestra la selección en la página
            }else{
                var idArt = "article" + (r - 1);
                document.getElementById(idArt).style = 'display: none';    //Oculta la no selección en la página
            }
        }
    }

}

function desfiltrar(num){

    const article0 = document.getElementById("article0");
    if (!article0) {
        return;
    }

    var totalPags = pags;

    for(var r = 1; r <= totalPags; r++){
        var idArt = "pag" + (r);
        document.getElementById(idArt).style = 'display: none';
    }

    for(var r = 1; r <= totalPags; r++){
        var idArt = "pag" + (r);
        document.getElementById(idArt).style = 'display: block';
    }
    
    for(var r = 0; r <= i; r++){
        if(r == i)
        break;
        var idArt = "article" + (r);
        document.getElementById(idArt).style = 'display: block';
    }

    nPags(actualPage);

    /*
    if(num == 1){
        for(var k = 0; k <= i; k++){
            if(k == i)
                break;
            var clean = document.getElementById('article' + k);
            //console.log(clean.id);
            var cleaned = clean.id;
            document.getElementById(cleaned).style = 'display: block';
        }
    }

    if(num == 2){
        for(var k = 0; k <= i; k++){
            if(k == i)
                break;
            var clean = document.getElementById('article' + k);
            //console.log(clean.id);
            var cleaned = clean.id;
            document.getElementById(cleaned).style = 'display: block';
        }
    }
    *
}*/

/*
function RBSelected(){
    if(document.getElementById('IDCat1').checked){
        valCat = 1;
        return "Categoría 1";
    }
    if(document.getElementById('IDCat2').checked){
        valCat = 2;
        return "Categoría 2";
    }
    if(document.getElementById('IDCat3').checked){
        valCat = 3;
        return "Categoría 3";
    }
}
*/
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
    document.getElementById('modal-back').onclick = function(){ borrar('modal'); }
}

function nPags(pag){

    if(actualPage == 0 || pag == 0){
        actualPage = 1;
        pag = 1;
    }

    var totalPags = pags;

    for(var r = 1; r <= totalPags; r++){
        var idArt = "pag" + (r);
        document.getElementById(idArt).style = 'display: none';
    }

    var idArt = "pag" + (pag);
    document.getElementById(idArt).style = 'display: block'; 
}

function savePost(Text){
    var html = document.querySelector("#searchUl");
    
    msg = document.createElement('li');
    msg.setAttribute('id', 'Li' + i);
    msg.textContent = Text;
    html.appendChild(msg);
}
/*
function busqueda(){
    var list;
    var buscar = document.getElementById("search").value.toUpperCase();
    for(var u = 0; u < i; u++){
        list = document.getElementById("Li" + u).innerText;
        list = list.toUpperCase();
        if(buscar == list){
            //alert("Yup:" + u)
            document.getElementById('article' + u).style = 'display: block';
        }else{
            //alert(u)
            document.getElementById('article' + u).style = 'display: none';
        }
    }
    
}
*/
function limpiar(){
    for(var u = 0; u < i; u++){
        //alert("Yup:" + u)
        document.getElementById('article' + u).style = 'display: block'; 
        document.getElementById("search").value = "";
    }
}

