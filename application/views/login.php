<div class="view full-page-intro" style="background-image: url('<?= base_url() ?>assets/img/background.jpg'); background-repeat: no-repeat; background-size: cover;">

<div class="mask rgba-black-light d-flex justify-content-center align-items-center">

  <div class="container">

	<div class="row wow fadeIn">

	  <div class="col-md-6 mb-4 white-text text-center text-md-left" id="mensajeBienvenida">

		<h1 class="display-4 font-weight-bold titulo-login">Seguiment alumnat IES Maria Enriquez</h1>

		<hr class="hr-light">

		<p>
		  <strong>Seguiment escolar</strong>
		</p>

		<p class="mb-4 d-none d-md-block">
		  <strong>Benvinguts a l'aplicación del institut IES Maria Enriquez per al seguiment escolar del alumnat.</strong>
          </p>

		<button class="btn btn-indigo btn-lg boton-iniciar-sesion" onclick="mostrarLogin()">Iniciar sessió
              <i class="fa fa-graduation-cap ml-2"></i>
        </button>

	  </div>

	  <div class="col-md-6 col-xl-5 mb-4 <?php if(isset($_SESSION['abrirLogin'])) echo 'mostrarLogin'?>" id="login" >
            <?php if(isset($_SESSION['abrirLogin'])) unset($_SESSION['abrirLogin']) ?>

		<div class="card div-login">

		  <div class="card-body">

              <?= form_open('Login/validarUsuario') ?>

			  <h3 class="dark-grey-text text-center">
				<strong>INICIAR SESSIÓ</strong>
			  </h3>
			  <hr>

			  <div class="md-form">
				<i class="fa fa-user prefix grey-text"></i>
				<input type="text" id="documento" name="documento" class="form-control">
				<label for="documento">Usuari</label>
			  </div>
			  <div class="md-form">
				<i class="fa fa-key prefix grey-text"></i>
				<input type="password" id="pass" name="pass" class="form-control">
				<label for="pass">Contrasenya</label>
			  </div>

			  <div class="text-center">
				<button class="btn btn-indigo" id="boton-iniciar-sesion">Iniciar</button>
			  </div>

			</form>

		  </div>

		</div>

	  </div>

	</div>

  </div>

</div>

</div>
