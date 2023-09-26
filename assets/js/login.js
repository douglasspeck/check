// transitions and responsiveness
const container = document.querySelector('.form-container');
const formSignin = document.querySelector('#signin');
const buttonsForm = document.querySelector('.form-buttons');
const formSignupStudent = document.querySelector('#signup-student');
const formSignupTeacher = document.querySelector('#signup-teacher');
const btnColor = document.querySelector('.btn-color');

function setContainerSize(width, height) {
  container.style.width = width;
  container.style.height = height;
}

function adjustResponsiveness() {
  const windowWidth = window.innerWidth;

  if (windowWidth < 700) {
    setContainerSize('350px', '555px');
    document.querySelector('#form-column-2').style.removeProperty('position');
    document.querySelector('#form-column-2').style.removeProperty('left');
  } else {
    setContainerSize('675px', '350px');
    document.querySelector('#form-column-2').style.position='absolute';
    document.querySelector('#form-column-2').style.left='325px';
  }
}

document.querySelector('#create-account').addEventListener('click', () => {
  window.removeEventListener('resize', adjustResponsiveness);
  
  formSignin.style.display = 'none';
  formSignupStudent.style.display = 'flex';
  buttonsForm.style.display = 'flex';
  btnColor.style.display = 'flex';

  setContainerSize('350px', '505px');
});

document.querySelector('#btn-student').addEventListener('click', () => {
  window.removeEventListener('resize', adjustResponsiveness);
  
  formSignupStudent.style.display = 'flex';
  formSignupTeacher.style.display = 'none';
  btnColor.style.left = '0px';

  setContainerSize('350px', '505px');
});

document.querySelector('#btn-teacher').addEventListener('click', () => {
  formSignupStudent.style.display = 'none';
  formSignupTeacher.style.display = 'flex';
  btnColor.style.left = '103px';
  
  adjustResponsiveness()
  window.addEventListener('resize', adjustResponsiveness);
});

document.querySelectorAll('#enter-account-1, #enter-account-2').forEach(element => {
  element.addEventListener('click', () => {
    window.removeEventListener('resize', adjustResponsiveness);

    formSignin.style.display = 'flex';
    formSignupStudent.style.display = 'none';
    formSignupTeacher.style.display = 'none';
    buttonsForm.style.display = 'none';
    btnColor.style.left= '0px';

    setContainerSize('350px', '335px');
  });
});

// alert error login
function alertErrorLogin(messageError) {
  const message = document.createElement("div");
  message.classList.add("error-login-message");
  message.innerText = messageError;
  document.body.appendChild(message);
}

// icon show/hide password
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
document.querySelectorAll("#username-1, #username-2")
.forEach(function(usernameInput) {
    usernameInput.addEventListener("input", function(event) {
      const regex = /^[a-z0-9_]{6,}$/;
      if (regex.test(usernameInput.value)) {
        usernameInput.setCustomValidity("");
      } else {
        const errorMessage = "Mínimo 6 caracteres. Utilize apenas letras minúsculas, números e underline";
        usernameInput.setCustomValidity(errorMessage);
      }
    });
});

// email validation in sign up
document.querySelectorAll("#email_student, #email_teacher")
.forEach(function(emailInput) {
  emailInput.addEventListener("input", function(event) {
    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (regex.test(emailInput.value)) {
      emailInput.setCustomValidity("");
    } else {
      const errorMessage = "Formato de email inválido";
      emailInput.setCustomValidity(errorMessage);
    }
  });
});
  
// password validation in sign up
const passwordStudent = document.getElementById('password-student');
const confirmStudent = document.getElementById('confirm-student');
const passwordTeacher = document.getElementById('password-teacher');
const confirmTeacher = document.getElementById('confirm-teacher');

function validatePassword(item, confirmItem) {
  item.setCustomValidity('');
  item.checkValidity();

  if (item.value !== confirmItem.value) {
    confirmItem.setCustomValidity('As senhas não coincidem');
  } else {
    confirmItem.setCustomValidity('');
  }
}

passwordStudent.addEventListener('input', function() {
  validatePassword(passwordStudent, confirmStudent);
});

confirmStudent.addEventListener('input', function() {
  validatePassword(confirmStudent, passwordStudent);
});

passwordTeacher.addEventListener('input', function() {
  validatePassword(passwordTeacher, confirmTeacher);
});

confirmTeacher.addEventListener('input', function() {
  validatePassword(confirmTeacher, passwordTeacher);
});