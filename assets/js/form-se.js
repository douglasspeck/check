// Opções dos anos de nascimento
function selectYear() {
    var currentYear = new Date().getFullYear();
    var options = "";
    for (var i = currentYear; i >= 2000; i--) {
        options += "<option value='" + i + "'>" + i + "</option>";
    }
    document.getElementById("select-year").innerHTML += options;
}
selectYear()

// Oculta e desoculta as opções Municipal, Estadual e Federal
const institutionType = document.querySelector('.institution-type');
const institutionOptions = document.querySelector('.institution-options');
const institutionOptionsRadios = institutionOptions.querySelectorAll('input[type="radio"]');

institutionType.addEventListener('change', function() {
  const publicOption = document.querySelector('#institution-public');
  if (publicOption.checked) {
    institutionOptions.style.display = 'block';
    institutionOptionsRadios.forEach(function(option) {
      option.setAttribute('required', 'required');
    });
  } else {
    institutionOptions.style.display = 'none';
    institutionOptionsRadios.forEach(function(option) {
      option.checked = false;
      option.removeAttribute('required');
    });
  }
});