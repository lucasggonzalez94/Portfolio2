document.addEventListener('DOMContentLoaded', () => {
    
    owlCarousel();
    esconderMenu();
    copyright();
    // resetFormulario();
    typed();
    // enviarEmail();
    
})

// function resetFormulario() {
//     const formularioContacto = document.querySelector('#formulario');
//     formularioContacto.reset();
// }

function copyright() {
    const copyright = document.querySelector('#copyright');

    copyright.innerHTML = `Todos los Derechos Reservados ${new Date().getFullYear()} - Lucas Gonzalez &copy;`;
}

function esconderMenu() {
    links = [
        linkInicio = document.querySelector('#link-inicio'),
        linkSobreMi = document.querySelector('#link-sobre-mi'),
        linkProyectos = document.querySelector('#link-proyectos'),
        linkContacto = document.querySelector('#link-contacto')
    ]

    links.forEach(link => {
        link.addEventListener('click', changeInput);
    });
}

function changeInput() {
    const inputActive = document.querySelector('#active');

    if (inputActive.checked === true) {
        inputActive.checked = false;
    } else {
        inputActive.checked = true;
    }
}

async function agregarProyectos() {

    const path = '/proyectos.json';

    const respuesta = await fetch(path);
    const proyectos = await respuesta.json();

    agregarHTML(proyectos);
}

function agregarHTML(proyectos) {

    const divProyectos = document.querySelector('.proyectos');
    
    proyectos.forEach(proyecto => {
        const {titulo, imagen, descripcion, link, repositorio} = proyecto;

        const articleProyecto = document.createElement('article');
        articleProyecto.classList.add('card', 'item');

        const divPortada = document.createElement('div');
        divPortada.classList.add('portada-proyecto');

        const img = document.createElement('img');
        img.src = `/build/img/${imagen}`;
        img.alt = titulo;
        img.loading = 'lazy';

        const divTitulo = document.createElement('div');
        divTitulo.classList.add('titulo-proyecto');

        const tituloH3 = document.createElement('h3');
        tituloH3.innerText = titulo;

        divTitulo.appendChild(tituloH3);

        divPortada.appendChild(img);
        divPortada.appendChild(divTitulo);

        const divDescripcion = document.createElement('div');
        divDescripcion.classList.add('descripcion-proyecto');

        const pDescripcion = document.createElement('p');
        pDescripcion.innerText = descripcion;

        const contenedorBtn = document.createElement('div');
        contenedorBtn.classList.add('contenedor-btn');

        const linkSitio = document.createElement('a');
        linkSitio.href = link;
        linkSitio.classList.add('btn');
        linkSitio.target = '_blank';
        linkSitio.innerText = 'Ir al Sitio';

        const linkRepositorio = document.createElement('a');
        linkRepositorio.href = repositorio;
        linkRepositorio.classList.add('btn');
        linkRepositorio.target = '_blank';
        linkRepositorio.innerText = 'Repositorio';

        contenedorBtn.appendChild(linkSitio);
        contenedorBtn.appendChild(linkRepositorio);

        divDescripcion.appendChild(pDescripcion);
        divDescripcion.appendChild(contenedorBtn);

        articleProyecto.appendChild(divPortada);
        articleProyecto.appendChild(divDescripcion);

        divProyectos.appendChild(articleProyecto);
    });

}

// Animaciones

// Sliders
async function owlCarousel() {

    await agregarProyectos();

    $(document).ready(function () {
        $('#habilidades .owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            autoWidth: true,
            center: true
        })

        $('.proyectos').owlCarousel({
            nav: true,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                530: {
                    items: 2
                },
                800: {
                    items: 3
                },
                1700: {
                    items: 5
                }
            }
        })
    });
}

// Texto tipeado
function typed() {
    let typed = new Typed('.typing', {
        strings: ['Junior', 'Web', 'Front End', 'Back End'],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true,
    })
}

// Envío de email
// function enviarEmail() {
//     const formulario = document.querySelector('#formulario');

//     emailjs.init("user_8qf1JRuCro6YqSOiaiM5B");

//     formulario.addEventListener('submit', e => {
//         e.preventDefault();

//         const nombre = document.querySelector('#nombre');
//         const apellido = document.querySelector('#apellido');
//         const email = document.querySelector('#email');
//         const tel = document.querySelector('#tel');
//         const empresa = document.querySelector('#empresa');
//         const asunto = document.querySelector('#asunto');
//         const mensaje = document.querySelector('#mensaje');

//         const parametros = {
//             name: nombre + ' ' + apellido,
//             email: email,
//             phone: tel,
//             organization: empresa,
//             subject: asunto,
//             message: mensaje
//         };

//         emailjs.send('service_mailjet', 'form-contacto', parametros)
//             .then(() => {
//                 Swal.fire({
//                     icon: 'success',
//                     title: 'Email enviado correctamente',
//                     showConfirmButton: false,
//                     timer: 2500
//                 })
//             }, () => {
//                 Swal.fire({
//                     icon: 'error',
//                     title: 'Error al enviar email',
//                     showConfirmButton: false,
//                     timer: 2500
//                 })
//             });
//     })
// }