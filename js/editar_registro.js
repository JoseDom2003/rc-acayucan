// ../../../js/sweetalert_alert.js
document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);

    // Alerta de éxito en edición
    if(urlParams.get('success') === '2'){
        Swal.fire({
            title: "¡Registro Actualizado!",
            text: "El registro se ha actualizado correctamente.",
            icon: "success",
            confirmButtonText: "Aceptar"
        }).then(() => {
            // Remueve el parámetro de la URL para evitar reejecución al refrescar
            const url = new URL(window.location);
            url.searchParams.delete('success');
            window.history.replaceState({}, document.title, url.toString());
        });
    }

    // Alerta de error en edición
    if(urlParams.get('error') === '1'){
        Swal.fire({
            title: "Error",
            text: "Hubo un error al actualizar el registro.",
            icon: "error",
            confirmButtonText: "Aceptar"
        }).then(() => {
            const url = new URL(window.location);
            url.searchParams.delete('error');
            window.history.replaceState({}, document.title, url.toString());
        });
    }
});
