const menu = document.querySelector('#mobile-menu')
const menuLinks = document.querySelector('.navbar__menu')
menu.addEventListener('click', function () {
    menu.classList.toggle('is-active')
    menuLinks.classList.toggle('active')
});

const loginButton = document.querySelector('login--submit')
function login() {
    const email = document.getElementsByName("email").value
    const password = document.getElementsByName("password").value
}
loginButton.addEventListener('click', login) 

const usrRemember = document.querySelector('#remember')
if (usrRemember.checked) {
}