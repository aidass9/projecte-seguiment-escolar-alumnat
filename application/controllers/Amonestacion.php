<?php

require_once("DefaultController.php");
class Amonestacion extends DefaultController {
    
    public function __construct() {
    parent::__construct(); //Necesario para que carge el controlador y tambien valide si hay sesión o no
        //Aqui cargaremos linrerial, helpes y modelo
        //Ejemplo de cargar modelo
        // $this->load->model('nombreModelo');
    }
    
    
    public function index($pagina = 1) {
        $datos['titulo'] = "Amonestaciones"; //Le damos titulo a la vista
            //En este punto contactaremos con el modelo para cargar datos de la base de datos
            //Ejemplo:
            //$datos['nombreDato'] = nombreModelo->nombreFuncion()
        $this->cargarVista('amonestacion', $datos); //Cargamos las vista mandandole los datos
    }
}