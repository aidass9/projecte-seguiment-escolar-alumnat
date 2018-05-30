<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');

    }

    public function index()
    {
        $this->load->view('template/header', ['titulo' => 'Login']);
        $this->load->view('template/mensaje');
        $this->load->view('login');
        $this->load->view('template/footer');
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

        $this->form_validation->set_rules('documento', '', 'required');
        $this->form_validation->set_rules('pass', '', 'required');

        if (!$this->form_validation->run()) {

            self::mostrarAlert("Has d'introduir l'usuari i la contrasenya", "error");
            $_SESSION['abrirLogin'] = true;
            redirect('/login');
        } else {

            $documento = $this->input->post('documento');
            $pass = $this->input->post('pass');

            $resultado = $this->usuario_model->iniciarSesion($documento, $pass);

            if($resultado == true) {
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

    public function volverElegirGrupo() {
        redirect('/');
    }

}
