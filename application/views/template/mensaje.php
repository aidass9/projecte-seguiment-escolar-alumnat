<?php
/* Si la sesion no esta iniciada, iniciala */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<script>
    var mensaje;
<?php
if (isset($_SESSION['mensaje'])) {
    echo "var mensaje = '" + $_SESSION['mensaje'] + "';"; // PASAR LA VARIABLE PHP A VARIABLE JS
    echo "var tipoMensaje = '" + $_SESSION['tipo_mensaje'] + "';";
    unset($_SESSION['mensaje']);
    unset($_SESSION['tipo_mensaje']);
}
?>
</script> 