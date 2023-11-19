// Todo: aleta para validar q se subieron los datos

if (document.querySelector(".exitoAggVivienda")) {
  let timerInterval;
  Swal.fire({
    icon: "success",
    title: "Se creo la vivienda con exito",
    timer: 1500,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading();
      const b = Swal.getHtmlContainer().querySelector("b");
      timerInterval = setInterval(() => {
        b.textContent = Swal.getTimerLeft();
      }, 100);
    },
    willClose: () => {
      clearInterval(timerInterval);
    },
    allowOutsideClick: false, // ? Evita que se cierre haciendo clic fuera de la alerta
    allowEscapeKey: false, // ? Evita que se cierre presionando la tecla Esc
    allowEnterKey: false, // ? Evita que se cierre presionando la tecla Enter
  }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
      window.location.href =
        "http://localhost/serviciocomunitario/registrarviviendas";
    }
  });
}
//Todo: alerta para asegurarse de querer eliminar
let formViviendas = document.querySelectorAll(".form-viviendas");
let eliminarButtom = document.querySelectorAll(".delete-vivienda");
let vivienda = document.querySelectorAll(".vivienda-name");
for (let i = 0; i < eliminarButtom.length; i++) {
  eliminarButtom[i].addEventListener("click", function (event) {
    formViviendas[i].addEventListener("submit", function (event) {
      event.preventDefault();
      Swal.fire({
        title: `Estas seguro de querer eliminar la vivienda ${vivienda[i].value}?`,
        text: "Esto no se puede revertir",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, quiero eliminarla",
      }).then((result) => {
        if (result.isConfirmed) {
          formViviendas[i].submit();
        }
      });
    });
  });
}

// Todo: alerta para verificar q se elimino la vivienda
if (document.querySelector(".exitoDeleteVivienda")) {
  let timerInterval;
  Swal.fire({
    icon: "success",
    title: "Vivienda eliminada",
    timer: 1500,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading();
      const b = Swal.getHtmlContainer().querySelector("b");
      timerInterval = setInterval(() => {
        b.textContent = Swal.getTimerLeft();
      }, 100);
    },
    willClose: () => {
      clearInterval(timerInterval);
    },
    allowOutsideClick: false, // ? Evita que se cierre haciendo clic fuera de la alerta
    allowEscapeKey: false, // ? Evita que se cierre presionando la tecla Esc
    allowEnterKey: false, // ? Evita que se cierre presionando la tecla Enter
  }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
      window.location.href =
        "http://localhost/serviciocomunitario/registrarviviendas";
    }
  });
}
