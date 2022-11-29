const trigger = document.querySelector('#kart');
const offcanvas = document.querySelector('#menu');

trigger.addEventListener('click', aparecer);

function aparecer(){
    offcanvas.classList.toggle('menu-activo');
}