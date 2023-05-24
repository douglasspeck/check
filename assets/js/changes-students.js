// Monitora as alterações nos inputs fraction
function sendChange() {
  var inputsPage = document.getElementsByTagName("input");

  for (var i = 0; i < inputsPage.length; i++) {
    var input = inputsPage[i];
    var inputId = input.id;

    if (inputId.includes("den-fraction-") || inputId.includes("num-fraction-")) {
      input.addEventListener("blur", function() {
        var inputName = this.id;
        var inputValue = this.value;

        if (inputValue.trim() !== "") {
          if (inputValue !== this.dataset.previousValue) {
            sendChanges(inputName, inputValue);
          }
        }
        this.dataset.previousValue = inputValue;
      });
    }
  }
}

// Enviar as alterações ao servidor
function sendChanges(inputName, inputValue) {
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '/assets/php/changes-students.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log('Alteração enviada com sucesso!');
    }
  };
  xhr.send('inputName=' + encodeURIComponent(inputName) + '&inputValue=' + encodeURIComponent(inputValue));
}