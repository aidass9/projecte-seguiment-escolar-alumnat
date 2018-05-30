$(() => {
    
	/*Si el mesaje de error es diferente a vacio, dependiento del mensaje mostrará un tipo de error u otro*/
	if (mensaje) {
		if (tipoMensaje === 'error') toastr.error(mensaje);
		else if (tipoMensaje === 'success')	toastr.success(mensaje);
		else if (tipoMensaje === 'warning')	toastr.warning(mensaje);
		else if (tipoMensaje === 'info') toastr.info(mensaje);
	}
})

function mostrarLogin() {
    if ($('#login').css('display') !== 'block') {
        $('#login').slideToggle();
        $('.boton-iniciar-sesion').css('display', "none");
    }
}

function borrarBuscador() {
    $('#formulario-buscador input').val('');
}
