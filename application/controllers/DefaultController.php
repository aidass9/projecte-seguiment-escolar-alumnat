<?php
 //La clase de CI_Controller la tienen que heredar todos los controllers
//Pondremos las funciones que queremos utilizar en todos los controladores para no repetir codigo
class DefaultController extends CI_Controller {
    public function __construct() {
        parent::__construct();
//        if (! $_SESSION['profesor']) {
//            $_SESSION['error'] = "Para acceder debes de tener usuario";
//            redirect('Login');
//        }
    }
    public function cargarVista($vista, $datos){
        $this->load->view('template/header', $datos);
        $this->load->view('template/navbar');
        $this->load->view('template/mensaje');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }
}