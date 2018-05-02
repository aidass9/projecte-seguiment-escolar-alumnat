<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    // Index -> es la primera funcion que se ejecuta
    // SI queremos otra pondremos Index/buscarUsuario
	public function index() {   //Para cargar archivos CSS o poner datos como el titulo de la vist, el segundo es un array asociativo con los datos
        $this->load->view('template/header', ['titulo' => 'Login']); // El primer parametro es el php 
        $this->load->view('template/mensaje'); //Plantilla que mostrará mensajes de error o correcto
        $this->load->view('login'); //Cargar la vista application/view/login.php
        $this->load->view('template/footer'); //Cargar archivos JS 
    }

    public static function mostrarAlert($mensaje, $tipo_mensaje) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['mensaje'] = $mensaje;
        $_SESSION['tipo_mensaje'] = $tipo_mensaje;
    }

    public function validarUsuario() {
        session_start();

        $this->form_validation->set_rules('usuario', '','required');
        $this->form_validation->set_rules('pass', '','required');

        if(!$this->form_validation->run()) {
            //self:: -> Llamar a una funcion estatica definida en la mis clase
            self::mostrarAlert("Has d'introduir l'usuari i la contrasenya", "error");
            $_SESSION['abrirLogin'] = true;
            redirect('/Login');
        }

    }

}
