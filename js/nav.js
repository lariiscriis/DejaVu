var ul = document.querySelector('nav ul');
var menuBtn = document.querySelector('.menu-btn img');
var menuLinks = document.querySelector('.menuLista li a')

function menuShow(){

    if (ul.classList.contains('open')){
        ul.classList.remove('open');
    }else{
        ul.classList.add('open');

    }

}

menuLinks.forEach(link => {
    link.addEventListener('click', () => {
        ul.classList.remove('open');
    });
});
