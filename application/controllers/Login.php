<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
            // Index -> es la primera funcion que se ejecuta
            // SI queremos otra pondremos Index/buscarUsuario
	public function index() 
	{   //Para cargar archivos CSS o poner datos como el titulo de la vist, el segundo es un array asociativo con los datos
            $this->load->view('template/header', ['titulo' => 'Login']); // El primer parametro es el php 
            $this->load->view('template/mensaje'); //Plantilla que mostrará mensajes de error o correcto
            $this->load->view('Login'); //Cargar la vista application/view/login.php
            $this->load->view('template/footer'); //Cargar archivos JS 
	}
}
