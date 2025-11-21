document.querySelector('#menuConnexion').addEventListener("click", menuToggle);
document.querySelector('.cross').addEventListener("click", crossToggle);

function menuToggle() {

    document.querySelector('.menu').classList.toggle('menu-active');
    document.querySelector('.cross').classList.toggle('cross-active');
    document.querySelector('.stick').classList.toggle('stick-active');
    document.querySelector('.stick2').classList.toggle('stick2-active');
    document.querySelector('.fond').classList.toggle('fond-active');
};

function crossToggle(){
    document.querySelector('.menu').classList.toggle('menu-active');
    document.querySelector('.cross').classList.toggle('cross-active');
    document.querySelector('.stick').classList.toggle('stick-active');
    document.querySelector('.stick2').classList.toggle('stick2-active');
    document.querySelector('.fond').classList.toggle('fond-active');
}

