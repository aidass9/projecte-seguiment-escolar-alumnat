<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">
            <strong>MDB</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <a href="<?= site_url('Login/cerrarSesion') ?>">
                <button class="btn btn-light my-2 my-sm-0" id="boton-cerrar-sesion" type="submit">Tancar sessió</button>
            </a>

        </div>

    </div>
</nav>
