//button sign-in/sign-up
var container = document.querySelector('.container')
var formSignin = document.querySelector('#signin')
var formSignup = document.querySelector('#signup')
var btnColor = document.querySelector('.btnColor')

document.querySelector('#btnSignin')
  .addEventListener('click', () => {
    container.style.height = "345px"
    formSignin.style.left = "25px"
    formSignup.style.left = "450px"
    btnColor.style.left = "0px"
})

document.querySelector('#btnSignup')
  .addEventListener('click', () => {
    container.style.height = "490px"
    formSignin.style.left = "-450px"
    formSignup.style.left = "25px"
    btnColor.style.left = "110px"
})

//username validation
const usernameInput = document.getElementById("username");
usernameInput.addEventListener("input", function(event) {
  const regex = /^[a-zA-Z0-9]+$/;
  if (regex.test(usernameInput.value)) {
    usernameInput.setCustomValidity("");
  } else {
    const errorMessage = "Nome de usuário inválido. Use apenas letras e números sem espaços.";
    usernameInput.setCustomValidity(errorMessage);
  }
});

// password validation in sign up
const password = document.getElementById('password');
const confirm = document.getElementById('confirm');

function validate(item) {
    item.setCustomValidity('');
    item.checkValidity();

    if (item == confirm) {
        if (item.value === password.value) item.setCustomValidity('');
        else item.setCustomValidity('As senhas não coincidem.');
    }
}

password.addEventListener('input', function(){validate(password)});
confirm.addEventListener('input', function(){validate(confirm)});