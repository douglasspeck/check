// OBS: O formulário será adicionado ao banco de dados
const form = [
  {
    type: 'radio',
    question: 'Você é: <strong>*</strong>',
    options: [
      'Professor',
      'Aluno',
      'Outro'
    ],
    values: [
      'Professor',
      'Aluno',
      'Outro'
    ],
    buttonText: 'Próximo'},
  {
    type: 'select',
    question: 'Ano de nascimento: <strong>*</strong>',
    options: [
      'Selecione'
    ],
    values: [
      'null'
    ],
    buttonText: 'Próximo'},
  {
    type: 'radio',
    question: 'Sexo: <strong>*</strong>',
    options: [
      'Feminino',
      'Masculino',
      'Prefiro não informar'
    ],
    values: [
      'Feminino',
      'Masculino',
      'Prefiro não informar'
    ],
    buttonText: 'Próximo'},
  {
    type: 'radio',
    question: 'Você é professor de matemática ou professor de anos iniciais (1º a 5º ano)? <strong>*</strong>',
    options: [
      'Professor de matemática',
      'Professor de anos iniciais'
    ],
    values: [
      'Matemática',
      'Anos iniciais'
    ],
    buttonText: 'Próximo'},
  {
    type: 'checkbox',
    question: 'Quais anos você leciona? <strong>*</strong>',
    options: [
      '1º ano do Ensino Fundamental',
      '2º ano do Ensino Fundamental',
      '3º ano do Ensino Fundamental',
      '4º ano do Ensino Fundamental',
      '5º ano do Ensino Fundamental'
    ],
    values: [
      '1º EF',
      '2º EF',
      '3º EF',
      '4º EF',
      '5º EF'
    ],
    buttonText: 'Próximo'},
  {
    type: 'checkbox',
    question: 'Quais anos você leciona? <strong>*</strong>',
    options: [
      '6º ano do Ensino Fundamental',
      '7º ano do Ensino Fundamental',
      '8º ano do Ensino Fundamental',
      '9º ano do Ensino Fundamental',
      '1º ano do Ensino Médio',
      '2º ano do Ensino Médio',
      '3º ano do Ensino Médio',
      'EJA'
    ],
    values: [
      '6º EF',
      '7º EF',
      '8º EF',
      '9º EF',
      '1º EM',
      '2º EM',
      '3º EM',
      'EJA'
    ],
    buttonText: 'Próximo'},
  {
    type: 'radio',
    question: 'Em quantas escolas você leciona? <strong>*</strong>',
    options: [
      '1',
      '2',
      '3+'
    ],
    values: [
      '1',
      '2',
      '3+'
    ],
    buttonText: 'Próximo'},
  {
    type: 'checkbox',
    question: 'Selecione todos os tipos de instituição: <strong>*</strong>',
    options: [
      [
        'Escola pública com processo seletivo',
        'Municipal',
        'Estadual',
        'Federal'
      ],
      [
        'Escola pública sem processo seletivo',
        'Municipal',
        'Estadual',
        'Federal'
      ],
      [
        'Escola privada'
      ]
    ],
    values: [
      'Pública com PS',
      'Pública sem PS',
      'Privada'
    ],
    buttonText: 'Próximo'},
  {
    type: 'radio',
    question: 'Há quantos anos você é professor? <strong>*</strong>',
    options: [
      'Menos de 2 anos',
      '2 a 5 anos',
      '5 a 10 anos',
      '10 a 20 anos',
      'Mais de 20 anos'
    ],
    values: [
      '-2',
      '2-5',
      '5-10',
      '10-20',
      '20+'
    ],
    buttonText: 'Próximo'},
  {
    type: 'radio',
    question: 'Você possui curso de graduação completo? <strong>*</strong>',
    options: [
      'Sim',
      'Não'
    ],
    values: [
      'Sim',
      'Não'
    ],
    buttonText: 'Próximo'},
  {
    type: 'checkbox',
    question: 'Em qual(is) curso(s) você possui graduação completa? <strong>*</strong>',
    options: [
      'Pedagogia',
      'Licenciatura em Matemática',
      'Licenciatura em outro curso',
      'Bacharelado em Matemática ou Matemática Aplicada',
      'Outro'
    ],
    values: [
      'Pedagogia',
      'Licenciatura Matemática',
      'Licenciatura outro curso',
      'Bacharelado Matemática ou Matemática Aplicada',
      'Outro'
    ],
    buttonText: 'Próximo'},
  {
    type: 'radio',
    question: 'Na sua primeira graduação, qual foi o tipo de instituição? <strong>*</strong>',
    options: [
      'Municipal',
      'Estadual',
      'Federal',
      'Privada'
    ],
    values: [
      'Municipal',
      'Estadual',
      'Federal',
      'Privada'
    ],
    buttonText: 'Próximo'},
  {
    type: 'radio',
    question: 'Na sua primeira graduação, qual foi o principal método de ensino? <strong>*</strong>',
    options: [
      'Presencial',
      'EAD'
    ],
    values: [
      'Presencial',
      'EAD'
    ],
    buttonText: 'Próximo'},
  {
    type: 'radio',
    question: 'Qual é a sua titulação máxima? <strong>*</strong>',
    options: [
      'Graduação',
      'Mestrado',
      'Doutorado'
    ],
    values: [
      'Graduação',
      'Mestrado',
      'Doutorado'
    ],
    buttonText: 'Enviar tudo'},
  // {
  //   type: 'select',
  //   question: 'Local da formação acadêmica: <strong>*</strong>',
  //   options: [
  //     'Selecione'
  //   ],
  //   values: [
  //     'null'
  //   ],
  //   buttonText: 'Enviar tudo'},
  {
    type: 'radio',
    question: 'Raça/Cor: <strong>*</strong>',
    options: [
      'Branco',
      'Preto',
      'Pardo',
      'Amarelo',
      'Indígena'
    ],
    values: [
      'Branco',
      'Preto',
      'Pardo',
      'Amarelo',
      'Indígena'
    ],
    buttonText: 'Próximo'},
  {
    type: 'radio',
    question: 'Você estuda em uma escola: <strong>*</strong>',
    options: [
      'Pública',
      'Privada'
    ],
    values: [
      'Pública',
      'Privada'
    ],
    buttonText: 'Próximo'},
  {
    type: 'select',
    question: 'Selecione o seu ano escolar: <strong>*</strong>',
    options: [
      'Selecione',
      '1º ano do Ensino Fundamental',
      '2º ano do Ensino Fundamental',
      '3º ano do Ensino Fundamental',
      '4º ano do Ensino Fundamental',
      '5º ano do Ensino Fundamental',
      '6º ano do Ensino Fundamental',
      '7º ano do Ensino Fundamental',
      '8º ano do Ensino Fundamental',
      '9º ano do Ensino Fundamental',
      '1º ano do Ensino Médio',
      '2º ano do Ensino Médio',
      '3º ano do Ensino Médio',
      'EJA'
    ],
    values: [
      'null',
      '1º EF',
      '2º EF',
      '3º EF',
      '4º EF',
      '5º EF',
      '6º EF',
      '7º EF',
      '8º EF',
      '9º EF',
      '1º EM',
      '2º EM',
      '3º EM',
      'EJA'
    ],
    buttonText: 'Próximo'},
  {
    type: 'range',
    question: 'Você se considera bom em matemática? <strong>*</strong>',
    options: [
      '1',
      '2',
      '3',
      '4',
      '5'
    ],
    values: [
      '1',
      '2',
      '3',
      '4',
      '5'
    ],
    buttonText: 'Enviar tudo'}
];

const questionContainer = document.getElementById('form-question');
const questionElement = document.getElementById('form-question-text');
const optionsElement = document.getElementById('form-question-options');
const nextButton = document.getElementById('form-question-button-next');
const afterButton = document.getElementById('form-question-button-after');
const selectedAnswers = [];
let currentQuestionIndex = 0;
let endQuestion = form.length;

function showQuestion() {
  const currentQuestion = form[currentQuestionIndex];
  questionElement.innerHTML = currentQuestion.question;
  optionsElement.innerHTML = '';

  if (currentQuestion.type === 'radio' || currentQuestion.type === 'checkbox') {
    if (Array.isArray(currentQuestion.options[0])) {
      // Se currentQuestion.options[0][0] for um array
      for (let i = 0; i < currentQuestion.options.length; i++) {
        const option = currentQuestion.options[i][0];
        const value = currentQuestion.values[i];
        
        const label = document.createElement('label');
        label.setAttribute('for', 'form-option-' + i);
        
        const input = document.createElement('input');
        input.type = currentQuestion.type;
        input.id = 'form-option-' + i;
        input.name = 'form-option';
        input.value = value;
        input.setAttribute('required', 'required');
        
        const labelText = document.createTextNode(option);
        label.appendChild(input);
        label.appendChild(labelText);

        // Monitoramento dos inputs que contenham as opções Municipal, Estadual e Federal
        input.addEventListener('change', function() {
          if (currentQuestion.options[i][1]) {
            const otherOptions = document.createElement('div');
            for (x = 1; x < currentQuestion.options[i].length; x++) {
              otherInput = document.createElement('input');
              otherInput.type = currentQuestion.type;
              otherInput.id = 'form-option-' + i + '-' + x;
              otherInput.name = 'form-otherOptions';
              otherInput.value = value;
              otherOptions.appendChild(otherInput);
              label.appendChild(otherOptions);
            }
          }
        });
        
        optionsElement.appendChild(label);
      }
    } else {
      // Se currentQuestion.options[0][0] não for um array
      for (let i = 0; i < currentQuestion.options.length; i++) {
        const option = currentQuestion.options[i];
        const value = currentQuestion.values[i];
        
        const label = document.createElement('label');
        label.setAttribute('for', 'form-option-' + i);
    
        const input = document.createElement('input');
        input.type = currentQuestion.type;
        input.id = 'form-option-' + i;
        input.name = 'form-option';
        input.value = value;
        input.setAttribute('required', 'required');
    
        const labelText = document.createTextNode(option);
        label.appendChild(input);
        label.appendChild(labelText);
    
        optionsElement.appendChild(label);
      }
    }
  } else if (currentQuestion.type === 'select') {
    const select = document.createElement('select');
    select.setAttribute('required', 'required');
    
    for (let i = 0; i < currentQuestion.options.length; i++) {
      const option = currentQuestion.options[i];
      const value = currentQuestion.values[i];
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
  } else if (currentQuestion.type === 'range') {
    const input = document.createElement('input');
    input.type = currentQuestion.type;
    input.min = '1';
    input.max = '5';
    input.value = '3';
    optionsElement.appendChild(input);

    const spans = document.createElement('div');
    spans.classList.add('performance-opinion-spans');
    for (let i = 0; i < currentQuestion.options.length; i++) {
      const span = document.createElement('span');
      span.textContent = currentQuestion.options[i];
      spans.appendChild(span);
      optionsElement.appendChild(spans);
    }
  }
  if (currentQuestionIndex === 0) {
    afterButton.style.display = 'none';
  } else {
    afterButton.style.display = '';
  }
  nextButton.textContent = currentQuestion.buttonText;
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
    alert('Por favor, selecione uma opção.');  // ver isso aqui
    return true;
  }
}

function showAfterQuestion() {
  // Verifica qual é a pergunta anterior e a exibe
  if (currentQuestionIndex-- > -1) {
    selectedAnswers.pop();
    switch (currentQuestionIndex) {
      case 4:
        // Redireciona para a pergunta 4
        currentQuestionIndex = 3;
      case 5:
        if (selectedAnswers[3] === 'Anos iniciais') {
          selectedAnswers.pop();
          // Redireciona para a pergunta 5
          currentQuestionIndex = 4;
        }
        break;
      case 13:
        if (selectedAnswers[0] === 'Aluno') {
          // Redireciona para a pergunta 3
          currentQuestionIndex = 2;
        }
        break;
      case 14:
        if (selectedAnswers[0] === 'Aluno') {
          for (let i = 0; i < 11; i++) {
          selectedAnswers.pop();
          }
        }
        break;
    }
    console.log(selectedAnswers);
    showQuestion();
  }
}

function showNextQuestion() {
  // Verifica se o campo obrigatório está preenchido antes de mostrar a próxima pergunta
  if (!validationQuestion()) {

    // Adiciona a resposta à selectedAnswers[]
    if (currentQuestionIndex >= 0 && currentQuestionIndex < form.length) {
      if (form[currentQuestionIndex].type === 'radio') {
        const selectedOption = document.querySelector('input[name="form-option"]:checked');
        selectedAnswers[currentQuestionIndex] = selectedOption.value;
      } else if (form[currentQuestionIndex].type === 'checkbox') {
        const selectedOptions = Array.from(document.querySelectorAll('input[name="form-option"]:checked'));
        const selectedValues = selectedOptions.map(option => option.value);
        selectedAnswers[currentQuestionIndex] = selectedValues;
      } else if (form[currentQuestionIndex].type === 'select') {
        const selectElement = document.querySelector('select');
        const selectedOption = selectElement.value;
        selectedAnswers.push(selectedOption);
      } else if (form[currentQuestionIndex].type === 'range') {
        const input = document.querySelector('input[type="range"]');
        selectedAnswers[currentQuestionIndex] = input.value;
      }
    }

    console.log(selectedAnswers);

    currentQuestionIndex++;

    // Verifica os casos e encaminha o usuário para as perguntas definidas
    if (currentQuestionIndex < endQuestion) {
      switch (currentQuestionIndex) {
        case 3:
          if (selectedAnswers[0] === 'Aluno') {
            // Redireciona para a pergunta 15
            currentQuestionIndex = 14;
          } else if (selectedAnswers[0] === 'Outro') {
            // Define o fim na pergunta 3
            endQuestion = 3;
          }
          break;
        case 4:
          if (selectedAnswers[3] === 'Matemática') {
            // Redireciona para a pergunta 6
            currentQuestionIndex = 5;
          }
          break;
        case 5:
          if (selectedAnswers[3] === 'Anos iniciais') {
            // Redireciona para a pergunta 7
            currentQuestionIndex = 6;
          }
          break;
        case 10:
          if (selectedAnswers[9] === 'Não') {
            // Define o fim na pergunta 10
            endQuestion = 10;
          } else if (selectedAnswers[9] === 'Sim') {
            // Define o fim na pergunta 14
            endQuestion = 14;
          }
          break;
      }
    }
    if (currentQuestionIndex < endQuestion) {
      showQuestion();
    } else {
      questionContainer.innerHTML = '<h2>Obrigado por responder!</h2><div id="form-question-button-container"><a class="button" href="painel.php">Ir ao Painel</a></div>';
    }
  }
}

showQuestion();
afterButton.addEventListener('click', showAfterQuestion);
nextButton.addEventListener('click', showNextQuestion);