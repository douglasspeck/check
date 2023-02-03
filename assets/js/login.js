//botão entrar/cadastrar
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

//validação de ano de nascimento e senhas
const selectYear = document.getElementById('selectYear');
const password = document.getElementById('password');
const confirm = document.getElementById('confirm');

function validate(item) {
    item.setCustomValidity('');
    item.checkValidity();

    if (item == selectYear) {
        if (selectYear.value === '') {
          item.setCustomValidity('Selecione um ano de nascimento.');
        }
    } else if (item == confirm) {
        if (item.value === password.value) item.setCustomValidity('');
        else item.setCustomValidity('As senhas não coincidem.');
    }
}

validate(selectYear);

selectYear.addEventListener('input', function(){validate(selectYear)});
password.addEventListener('input', function(){validate(password)});
confirm.addEventListener('input', function(){validate(confirm)});