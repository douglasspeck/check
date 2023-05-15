// trasitions signin<->signup and student<->teacher
var container = document.querySelector('.form-container')
var formSignin = document.querySelector('#signin')
var buttonsForm = document.querySelector('.form-buttons')
var formSignupStudent = document.querySelector('#signup-student')
var formSignupTeacher = document.querySelector('#signup-teacher')
var btnColor = document.querySelector('.btn-color')

document.querySelector('#create-account')
  .addEventListener('click', () => {
    container.style.width = "350px"
    container.style.height = "520px"
    formSignin.style.left = "-450px"
    buttonsForm.style.left = "0px"
    formSignupStudent.style.left = "25px"
    formSignupTeacher.style.left = "450px"
})

document.querySelector('#btn-student')
  .addEventListener('click', () => {
    container.style.width = "350px"
    container.style.height = "520px"
    formSignupStudent.style.left = "25px"
    formSignupTeacher.style.left = "450px"
    btnColor.style.left = "0px"
})

document.querySelector('#btn-teacher')
  .addEventListener('click', () => {
    container.style.width = "675px"
    container.style.height = "365px"
    formSignupStudent.style.left = "-450px"
    formSignupTeacher.style.left = "25px"
    btnColor.style.left = "103px"
})

document.querySelectorAll('#enter-account-1, #enter-account-2')
  .forEach(element => {
    element.addEventListener('click', () => {
      container.style.width = "350px"
      container.style.height = "380px"
      formSignin.style.left = "25px"
      buttonsForm.style.left = "425px"
      formSignupStudent.style.left = "450px"
      formSignupTeacher.style.left = "900px"
      btnColor.style.left = "0px"
    })
  })

// alert error login
function alertErrorLogin(messageError) {
  const message = document.createElement("div");
  message.classList.add("error-login-message");
  message.innerText = messageError;
  document.body.appendChild(message);
}

// show/hide password
function showHide(id_input, id_icon) {
  const inputPassword = document.getElementById(id_input);
  const iconShowPassword = document.getElementById(id_icon);
  
  if(inputPassword.type === 'password'){
    inputPassword.setAttribute('type', 'text');
    iconShowPassword.innerText = 'visibility_off'
  } else {
    inputPassword.setAttribute('type', 'password');
    iconShowPassword.innerText = 'visibility'
  }
}

// username validation in sign up
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
const password = document.getElementById('password-student');
const confirm = document.getElementById('confirm-student');

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