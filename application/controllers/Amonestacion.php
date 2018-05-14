<?php

require_once("DefaultController.php");
class Amonestacion extends DefaultController {
    
    public function __construct() {
    parent::__construct(); //Necesario para que carge el controlador y tambien valide si hay sesión o no
        //Aqui cargaremos linrerial, helpes y modelo
        //Ejemplo de cargar modelo
        // $this->load->model('nombreModelo');
        $this->load->model('Importacio_model');
    }
    
    
    public function index($pagina = 1) {
        $datos['titulo'] = "Amonestaciones"; //Le damos titulo a la vista
            //En este punto contactaremos con el modelo para cargar datos de la base de datos
            //Ejemplo:
            //$datos['nombreDato'] = nombreModelo->nombreFuncion()
        $datos['grupos'] = $this->Importacio_model->selectorGrupos();
        //print_r($datos['grupos']);
        $this->cargarVista('amonestacion', $datos); //Cargamos las vista mandandole los datos
    }

    public function importar() {
        $resultado = $this->Importacio_model->importarGrupoProfesor();

    }

    public function cargarAlumnos() {
        echo "hola";
        $grupo = $this->input->post('grupo');
        $datos['alumnos'] = $this->Importacio_model->selectorAlumnosPorGrupo($grupo);
        //print_r($datos['alumnos']);
        $this->cargarVista('observacionesAlumnos', $datos);
    }
}