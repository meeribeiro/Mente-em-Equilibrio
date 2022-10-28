let radios = document.querySelectorAll('input[type=radio][name="praquem"]');
let nomeDiv = document.querySelector('#nome-div')
let dtNascDiv = document.querySelector('#dtNasc-div')
let sexoDiv = document.querySelector('#sexo-div')
let nomeText = document.querySelector('#nome-text')
let desc = document.querySelector('#desc')
let nomeInput = document.querySelector('#nome-input')
let dtNascInput = document.querySelector('#dtNasc-input')
let sexoInput = document.querySelector('#sexo-input')

function changeHandler(event) {
   if ( this.value === 'Para mim' ) {
        nomeDiv.style.display = 'none'
        dtNascDiv.style.display = 'none'
        sexoDiv.style.display = 'none'
        desc.textContent = 'Diga o motivo da sua procura pela profissional e, caso já tenha ido em alguma, conte sua expêriencia:'
        nomeInput.removeAttribute('required')
        dtNascInput.removeAttribute('required')
        sexoInput.removeAttribute('required')
   } else if ( this.value === 'Para outra pessoa' ) {
          desc.textContent = 'O que está acontecendo com a pessoa? insira informações relevantes sobre o paciente:'
        nomeDiv.style.display = ''
        dtNascDiv.style.display = ''
        sexoDiv.style.display = ''
        nomeText.textContent = 'Nome do paciente'
        nomeInput.element.setAttribute("required", "");
        dtNascInput.element.setAttribute("required", "");
        sexoInput.element.setAttribute("required", "");
       
   } else if ( this.value === 'Casal' ) {
          desc.textContent = 'O que você espera da consulta? quais problemas está tendo ?:'
        nomeDiv.style.display = ''
        dtNascDiv.style.display = 'none'
        sexoDiv.style.display = 'none'
        nomeText.textContent = 'Nome do conjuge'
        dtNascInput.removeAttribute('required')
        sexoInput.removeAttribute('required')
        nomeInput.element.setAttribute("required", "");
       
    }   else if ( this.value === 'Familiar' ) {
        nomeDiv.style.display = 'none'
        dtNascDiv.style.display = 'none'
        sexoDiv.style.display = 'none'
        desc.textContent = 'O que vem acontecendo com sua familia ? o que você espera da consulta:'
        nomeInput.removeAttribute('required')
        dtNascInput.removeAttribute('required')
        sexoInput.removeAttribute('required')
        
    }  
}

Array.prototype.forEach.call(radios, function(radio) {
   radio.addEventListener('change', changeHandler);
});