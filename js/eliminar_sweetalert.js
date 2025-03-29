// Captura el clic en cualquier elemento con la clase btn-eliminar
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.btn-eliminar');
    deleteButtons.forEach(function(button) {
      button.addEventListener('click', function(e) {
        e.preventDefault(); // Previene la redirección inmediata
        const link = this.getAttribute('href'); // Obtiene la URL del enlace
        Swal.fire({
          title: '¿Seguro que desea eliminar el registro?',
          text: "¡Esta acción eliminará el registro!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, eliminar!',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            // Si se confirma, redirige a la URL de eliminación
            window.location.href = link;
          }
        });
      });
    });
  });