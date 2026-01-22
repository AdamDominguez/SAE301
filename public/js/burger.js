const burger = document.querySelector('.Burger');
const nav = document.querySelector('.Liens');

if (burger) {
    burger.addEventListener('click', () => {
        burger.classList.toggle('active');
        nav.classList.toggle('active');
        document.body.classList.toggle('no-scroll');
    });
}
