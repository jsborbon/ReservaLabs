<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

function mostrarError(){
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString)
    let idError =urlParams.get('error');
    if(idError == 1){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡No se pudo iniciar sesión!',
            footer: 'El usuario no se encuentra activo.'
          });
        }
    if(idError == 2){
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '¡No se pudo iniciar sesión!',
        footer: 'Usuario o contraseña incorrectos.'
      });
    }
}