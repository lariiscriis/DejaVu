const container = document.querySelector('.container');
const cadastroBtn = document.querySelector('.cadastro_btn');
const loginBtn = document.querySelector('.login_btn');


cadastroBtn.addEventListener('click', () => {
    container.classList.add('active');

});

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');

});