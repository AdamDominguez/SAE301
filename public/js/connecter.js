document.querySelector('#menuConnexion').addEventListener("click", menuToggle);

function menuToggle() {

    document.querySelector('.menu').classList.toggle('menu-active');
    document.querySelector('.john').classList.toggle('stick-active');
    document.querySelector('.joe').classList.toggle('stick2-active');
    document.querySelector('.fond').classList.toggle('fond-active');
}