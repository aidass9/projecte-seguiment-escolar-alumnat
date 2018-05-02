<?php

//La clase de CI_Controller la tienen que heredar todos los controllers
//Pondremos las funciones que queremos utilizar en todos los controladores para no repetir codigo
class DefaultController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();

        if (!isset($_SESSION['usuario'])) {
            //Muestras errores (ejemplo
            self::mostrarAlert("Para acceder debes de estar registrado", 'error');
            redirect('Login');
        }
    }

    public function cargarVista($vista, $datos) {
        $this->load->view('template/header', $datos);
        $this->load->view('template/navbar');
        $this->load->view('template/mensaje');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    //Si no esta la sesion iniciada, la inicia 
    public static function mostrarAlert($mensaje, $tipo_mensaje) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['mensaje'] = $mensaje;
        $_SESSION['tipo_mensaje'] = $tipo_mensaje;
    }

}
