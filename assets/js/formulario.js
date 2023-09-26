const questionContainer = document.getElementById('form-question');
const questionElement = document.getElementById('form-question-text');
const optionsElement = document.getElementById('form-question-options');
const nextButton = document.getElementById('form-question-button-next');
const afterButton = document.getElementById('form-question-button-after');

const selectedAnswers = [];
let currentQuestionIndex = 0;
let endQuestion = Object.keys(form).length;

function showQuestion() {
  const currentQuestion = form[currentQuestionIndex];
  const options = JSON.parse(currentQuestion.options_question);
  const values = JSON.parse(currentQuestion.values_question);
  questionElement.innerHTML = currentQuestion.title_question;
  optionsElement.innerHTML = '';

  if (currentQuestionIndex === 0) {
    afterButton.style.display = 'none';

    if (user[0] === 'Aluno') {
      options.splice(0, 1);
      values.splice(0, 1);
    } else if (user[0] === 'Professor') {
      options.splice(1, 1);
      values.splice(1, 1);
    }
  } else {
    afterButton.style.display = '';
  }

  if (currentQuestion.type_question === 'radio' || currentQuestion.type_question === 'checkbox') {
      for (let i = 0; i < options.length; i++) {
        const option = options[i];
        const value = values[i];
        
        const label = document.createElement('label');
        label.setAttribute('for', 'form-option-' + i);
    
        const input = document.createElement('input');
        input.type = currentQuestion.type_question;
        input.id = 'form-option-' + i;
        input.name = 'form-option';
        input.value = value;
        input.setAttribute('required', 'required');
    
        const labelText = document.createTextNode(option);
        label.appendChild(input);
        label.appendChild(labelText);
    
        optionsElement.appendChild(label);
    }

  } else if (currentQuestion.type_question === 'select') {
    const select = document.createElement('select');
    select.setAttribute('required', 'required');
    
    for (let i = 0; i < options.length; i++) {
      const option = options[i];
      const value = values[i];
      const selectOption = document.createElement('option');
      selectOption.text = option;
      selectOption.value = value;
    
      select.appendChild(selectOption);
    }

    if (currentQuestionIndex === 1) {
      const currentYear = new Date().getFullYear();
      for (let i = currentYear; i >= 1920; i--) {
        const option = document.createElement('option');
        option.text = i.toString();
        option.value = i.toString();
        select.appendChild(option);
      }
    }

    optionsElement.appendChild(select);
  } else if (currentQuestion.type_question === 'range') {
    const input = document.createElement('input');
    input.type = currentQuestion.type_question;
    input.min = '1';
    input.max = options.length.toString();
    input.value = '3';
    optionsElement.appendChild(input);

    const spans = document.createElement('div');
    spans.classList.add('range-opinion-spans');
    for (let i = 0; i < options.length; i++) {
      const span = document.createElement('span');
      span.textContent = options[i];
      spans.appendChild(span);
      optionsElement.appendChild(spans);
    }
  }
}

function alertError(messageError) {
  const message = document.createElement("div");
  message.classList.add("error-message");
  message.innerText = messageError;
  document.body.appendChild(message);
}

function validationQuestion() {
  var radioOptions = document.querySelectorAll('input[type="radio"][required]');
  var checkboxOptions = document.querySelectorAll('input[type="checkbox"][required]');
  var selectOptions = document.querySelectorAll('select[required]');
  
  var isValid = true;
  
  radioOptions.forEach(function(option) {
    var name = option.getAttribute('name');
    if (!document.querySelector('input[name="' + name + '"]:checked')) {
      isValid = false;
    }
  });
  
  checkboxOptions.forEach(function(option) {
    var name = option.getAttribute('name');
    if (!document.querySelector('input[name="' + name + '"]:checked')) {
      isValid = false;
    }
  });

  selectOptions.forEach(function(select) {
    if (select.selectedIndex === 0) {
      isValid = false;
    }
  });

  if (!isValid) {
    alertError('Selecione uma opção!');
    return true;
  }
}

function showPreviousQuestion() {
  // Checks what the previous question is and displays it
  if (currentQuestionIndex-- > -1) {
    selectedAnswers.pop();
    switch (currentQuestionIndex) {
      case 0:
        endQuestion = Object.keys(form).length;
        break;
      case 4:
        currentQuestionIndex = 3;
        break;
      case 5:
        if (selectedAnswers[3] === 'AI') {
          selectedAnswers.pop();
          currentQuestionIndex = 4;
        } else if (selectedAnswers[3] === 'MAT') {
          selectedAnswers.pop();
        }
        break;
      case 13:
        currentQuestionIndex = 2;
        break;
      case 14:
        for (let i = 0; i < 11; i++) {
        selectedAnswers.pop();
        }
        break;
      case 18:
        currentQuestionIndex = 16;
        selectedAnswers.pop();
        break;
      case 20:
        currentQuestionIndex = 14;
        for (let i = 0; i < 11; i++) {
          selectedAnswers.pop();
        }
        break;
    }
    console.log(selectedAnswers);
    showQuestion();
  }
}

function showNextQuestion() {
  if (!validationQuestion()) {
    // Adds the answer to the selectedAnswers[]
    if (form[currentQuestionIndex].type_question === 'radio') {
      const selectedOption = document.querySelector('input[name="form-option"]:checked');
      selectedAnswers[currentQuestionIndex] = selectedOption.value;
    } else if (form[currentQuestionIndex].type_question === 'checkbox') {
      const selectedOptions = Array.from(document.querySelectorAll('input[name="form-option"]:checked'));
      const selectedValues = selectedOptions.map(option => option.value);
      selectedAnswers[currentQuestionIndex] = selectedValues;
    } else if (form[currentQuestionIndex].type_question === 'select') {
      const selectElement = document.querySelector('select');
      const selectedOption = selectElement.value;
      selectedAnswers.push(selectedOption);
    } else if (form[currentQuestionIndex].type_question === 'range') {
      const input = document.querySelector('input[type="range"]');
      selectedAnswers[currentQuestionIndex] = input.value;
    }

    console.log(selectedAnswers);

    currentQuestionIndex++;

    // Checks the cases and forwards the user to the defined questions
    if (currentQuestionIndex < endQuestion) {
      switch (currentQuestionIndex) {
        case 3:
          if (selectedAnswers[0] === 'Aluno' || selectedAnswers[0] === 'Outro') {
            currentQuestionIndex = 14;
          }
          break;
        case 4:
          if (selectedAnswers[3] === 'MAT') {
            currentQuestionIndex = 5;
          }
          break;
        case 5:
          if (selectedAnswers[3] === 'AI') {
            currentQuestionIndex = 6;
          }
          break;
        case 10:
          if (selectedAnswers[9] === 'Não') {
            endQuestion = 10;
          } else if (selectedAnswers[9] === 'Sim') {
            endQuestion = 14;
          }
          break;
        case 15:
          if (selectedAnswers[0] === 'Outro') {
            currentQuestionIndex = 21;
          }
          break;
        case 17:
          if ((user[1] % 2) === 1) {
            endQuestion = 19;
          } else if ((user[1] % 2) === 0) {
            currentQuestionIndex = 19;
            endQuestion = 21;
          }
          break;
      }
    }
    if (currentQuestionIndex < endQuestion) {
      showQuestion();
    } else if (currentQuestionIndex == endQuestion) {
      optionsElement.innerHTML = '';
      questionContainer.innerHTML = '<div id="form-submit"><h2>Obrigado por responder!</h2><button id="form-submit-button">Enviar Formulário</button></div>';
    }
  }
}

function sendFormDataToPHP() {
  const formData = {
    selectedAnswers: selectedAnswers
  };

  const jsonData = JSON.stringify(formData);

  const xhr = new XMLHttpRequest();
  xhr.open('POST', '../../formulario.php', true);
  xhr.setRequestHeader('Content-type', 'application/json');

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const response = JSON.parse(xhr.responseText);
      if (response.success) {
        window.location.href = response.redirect;
      } else {
        alert(response.message);
      }
    }
  };

  xhr.send(jsonData);
}

afterButton.addEventListener('click', showPreviousQuestion);
nextButton.addEventListener('click', showNextQuestion);

questionContainer.addEventListener('click', function (event) {
  const clickedElement = event.target;
  if (clickedElement.matches('#form-submit-button')) {
    sendFormDataToPHP();
  }
 });

showQuestion();