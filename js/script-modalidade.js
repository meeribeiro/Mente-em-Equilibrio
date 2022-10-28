let radios = document.querySelectorAll('input[type=radio][name="modalidade"]');
let escolhas = document.querySelector('#escolhas-online');

function changeHandler(event) {
    if ( this.value === 'Presencial' ) {
         escolhas.style.display = 'none'
    } else if ( this.value === 'Online' ) {
        escolhas.style.display = ''
    }
}
 
 Array.prototype.forEach.call(radios, function(radio) {
    radio.addEventListener('change', changeHandler);
 });