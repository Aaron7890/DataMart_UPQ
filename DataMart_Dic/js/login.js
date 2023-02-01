// archivo para mostrar/ocultar los inputs del registro, dependiendo del tipo de registro seleccionado

// select donde se define el tipo de registro ('integrante', 'lider)
const selectRegistro = document.querySelector("#selectRegistro");
// div contenedor del select de tipo de registro
const divSelectRegistro = document.querySelector("#form1");

// div contenedor para el registro de lideres
const divRegistroLider = document.querySelector(".registroLideres");

// div que contiene los inputs para el registro de un integrante
const divIntegrante = document.querySelector(".registroIntegrante");

selectRegistro.addEventListener('change', (e) => {
    if (e.target.value == 'Integrante') { 

        divSelectRegistro.classList.add('altura10');

        if (divIntegrante.classList.contains('mostrarRegistroIntegrantes')) {
            divIntegrante.classList.remove('mostrarRegistroIntegrantes');
        } else {
            divIntegrante.classList.add('mostrarRegistroIntegrantes');
            divRegistroLider.classList.remove('mostrarRegistroLideres');
            divIntegrante.style.display = 'block';
        }
    } else if (e.target.value == 'Lider') {

        divSelectRegistro.classList.add('altura10');
        
        if (divRegistroLider.classList.contains('mostrarRegistroLideres')) {
            divRegistroLider.classList.remove('mostrarRegistroLideres');
        } else {
            divRegistroLider.classList.add('mostrarRegistroLideres');
            divIntegrante.classList.remove('mostrarRegistroIntegrantes');
            divIntegrante.style.display = 'none';
        }
    } else {
        divSelectRegistro.classList.remove('altura10');
        divRegistroLider.classList.remove('mostrarRegistroLideres');
        divIntegrante.classList.remove('mostrarRegistroIntegrantes');
        divSelectRegistro.style.heigth = '100%';
    }

})

const containerSignin = document.querySelector('.container--signin');
const containerSignup = document.querySelector('.container--signup');



