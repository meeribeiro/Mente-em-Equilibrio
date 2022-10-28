 const senha = document.getElementById('senha');
 const confirsenha = document.getElementById('confirsenha');

function validate(item){
    item.setCustomValidity('');
    item.checkValidity();

    if(item ==confirsenha){
        if(item.value === senha.value) item.setCustomValidity('');
        else item.setCustomValidity('As senhas não são iguais');
    }
}
senha.addEventListener('input', function () {validatePassowrd(senha)});
confirsenha.addEventListener('input', function () {validatePassowrd(confirsenha)});

 const validatePassowrd = (event) => {
        const input = event.currentTarget;

        if(input.value.length < 8) {
            submitButton.setAttribute("disabled", "disabled");
            input.nextElementSibling.classList.add('error');
        } else {
            submitButton.removeAttribute("disabled");
            input.nextElementSibling.classList.remove('error');
        }
    }
    
    const inputPassword = document.querySelector('input[type="password"]');

   