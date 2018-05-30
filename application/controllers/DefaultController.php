<?php

class DefaultController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //session_start();

        $this->load->library('session');

        if (!isset($_SESSION['usuario'])) {
            self::mostrarAlert("Per a accedir, has de estar registrat", 'error');
            redirect('login');
        }
        $this->load->library('grocery_CRUD');
    }

    public function cargarVista($vista, $datos) {
        $this->load->view('template/header', $datos);
        $this->load->view('template/navbar');
        $this->load->view('template/mensaje');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    public static function mostrarAlert($mensaje, $tipo_mensaje) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['mensaje'] = $mensaje;
        $_SESSION['tipo_mensaje'] = $tipo_mensaje;
    }

}
