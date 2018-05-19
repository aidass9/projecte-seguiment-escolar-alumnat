<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    // Index -> es la primera funcion que se ejecuta
    // SI queremos otra pondremos Index/buscarUsuario
    public function index()
    {   //Para cargar archivos CSS o poner datos como el titulo de la vist, el segundo es un array asociativo con los datos
        $this->load->view('template/header', ['titulo' => 'Login']); // El primer parametro es el php 
        $this->load->view('template/mensaje'); //Plantilla que mostrará mensajes de error o correcto
        $this->load->view('login'); //Cargar la vista application/view/login.php
        $this->load->view('template/footer'); //Cargar archivos JS 
    }

    public static function mostrarAlert($mensaje, $tipo_mensaje)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['mensaje'] = $mensaje;
        $_SESSION['tipo_mensaje'] = $tipo_mensaje;
    }

    public function validarUsuario()
    {
        session_start();

        //Aplicar reglas de validacion en el formulario
        $this->form_validation->set_rules('documento', '', 'required');
        $this->form_validation->set_rules('pass', '', 'required');

        //Si el formulario da error entra en el if, si es correcto en el else
        if (!$this->form_validation->run()) {
            //self:: -> Llamar a una funcion estatica definida en la mis clase
            self::mostrarAlert("Has d'introduir l'usuari i la contrasenya", "error");
            $_SESSION['abrirLogin'] = true;
            redirect('/login');
        } else {
            //Recoger datos formulario
            $documento = $this->input->post('documento');
            $pass = $this->input->post('pass');

            //Llamar function modelo - Le paso el documento y el pass
            //Si devuelte true el documento y la contraseña coinciden, si es false no
            $resultado = $this->usuario_model->iniciarSesion($documento, $pass);

            if($resultado == true) { //Redirijo al controller Amonestacion
                self::mostrarAlert($_SESSION['usuario']['nombre']." has iniciat sessió amb èxit!", "success");
                redirect('/');


            }

            else {
                self::mostrarAlert("No has introduït bé l'usuari o la contrasenya", "error");
                redirect('/login');
            }
        }

    }

    public function cerrarSesion() {
        session_start();
        session_destroy();
        self::mostrarAlert($_SESSION['usuario']['nombre']." has tancat sessió correctament", "success");
        redirect('/login');
    }

}
