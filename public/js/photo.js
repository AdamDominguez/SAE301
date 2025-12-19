document.querySelector(".photo-profil").addEventListener('click', afficherUploadPhoto);

function afficherUploadPhoto(){
    document.querySelector(".formPhoto").classList.toggle('menu-photo-profil');
}