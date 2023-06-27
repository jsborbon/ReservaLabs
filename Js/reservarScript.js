
let cells = document.getElementsByTagName('tr');

for(let i = 0; i<cells.length; i++){
    cells[i].addEventListener('click', function(){
        confirmar(cells[i].firstChild.innerHTML, cells[i].lastChild.innerHTML);
    });
}
function confirmar(id, estado){
    if(estado ==="D"){
Swal.fire({
  title: '¿Deseas confirmar la reserva?',
  text: "Estás reservando el laboratorio " + id,
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText:'Cancelar',
  confirmButtonText: '¡Confirmar reserva!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      '¡Reservado!',
      'Has reservado el laboratorio '+id+'.',
      'success'
      )
      window.location.href = 'reservado.php?id='+id;
  }
})
}else{
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'El laboratorio '+id+' ya está reservado',
  footer: 'Selecciona otro laboratorio'
})
}
}