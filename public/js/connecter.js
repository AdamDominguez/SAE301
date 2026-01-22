const menuConnexion = document.querySelector('#menuConnexion');
const cross = document.querySelector('.cross');
const fond = document.querySelector('.fond');

if (menuConnexion) menuConnexion.addEventListener("click", menuToggle);
if (cross) cross.addEventListener("click", menuToggle);
if (fond) fond.addEventListener("click", menuToggle);

function menuToggle() {
    const connecterMenu = document.querySelector('.ConnecterMenu');
    const cross = document.querySelector('.cross');
    const stick = document.querySelector('.stick');
    const stick2 = document.querySelector('.stick2');
    const fond = document.querySelector('.fond');

    if (connecterMenu) connecterMenu.classList.toggle('ConnecterMenu-active');
    if (cross) cross.classList.toggle('cross-active');
    if (stick) stick.classList.toggle('stick-active');
    if (stick2) stick2.classList.toggle('stick2-active');
    if (fond) fond.classList.toggle('fond-active');
};
