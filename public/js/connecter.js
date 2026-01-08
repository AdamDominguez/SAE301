document.querySelector('#menuConnexion').addEventListener("click", menuToggle);
document.querySelector('.cross').addEventListener("click", menuToggle);
document.querySelector('.fond').addEventListener("click", menuToggle);

function menuToggle() {

    document.querySelector('.ConnecterMenu').classList.toggle('ConnecterMenu-active');
    document.querySelector('.cross').classList.toggle('cross-active');
    document.querySelector('.stick').classList.toggle('stick-active');
    document.querySelector('.stick2').classList.toggle('stick2-active');
    document.querySelector('.fond').classList.toggle('fond-active');
};
