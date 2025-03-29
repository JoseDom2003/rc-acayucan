// ../../../js/sweetalert_alert.js
document.addEventListener("DOMContentLoaded", function() {
    console.log("sweetalert_alert.js cargado");
    const urlParams = new URLSearchParams(window.location.search);
    console.log("Parámetros en la URL:", window.location.search);
    if(urlParams.get('success') === '1'){
        console.log("Parámetro success detectado");
        Swal.fire({
            title: "¡Registro Exitoso!",
            text: "El registro se ha ingresado correctamente.",
            icon: "success",
            confirmButtonText: "Aceptar"
        }).then(() => {
            // Remueve el parámetro de la URL para evitar que se vuelva a mostrar al refrescar
            const url = new URL(window.location);
            url.searchParams.delete('success');
            window.history.replaceState({}, document.title, url.toString());
        });
    }
});
