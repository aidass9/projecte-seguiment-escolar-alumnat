<?php

require_once("DefaultController.php");
class Amonestacion extends DefaultController {
    
    public function __construct() {
    parent::__construct();
        $this->load->model('Importacio_model');
        $this->load->library('session');

        $selectEvaluacion = $this->input->post('selectEvaluacion');

        if($selectEvaluacion == "") {
            $selectEvaluacion = '0';
        }

        $this->session->set_userdata('evaluacionActiva', $selectEvaluacion);

    }
    
    
    public function index($pagina = 1) {
        $datos['titulo'] = "Amonestaciones";

        $datos['grupos'] = $this->Importacio_model->selectorGrupos();

        $this->cargarVista('amonestacion', $datos);
    }

    public function login()
    {
        $this->load->view('template/header', ['titulo' => 'Login']);
        $this->load->view('template/mensaje');
        $this->load->view('login');
        $this->load->view('template/footer');
    }

    public function importar() {
        $resultado = $this->Importacio_model->importarGrupoProfesor();

    }

    public function cargarAlumnos() {
        $grupo = $this->input->post('grupo');


        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if(!isset($grupo)) {
            $grupo = $_SESSION['grupo'];
        }
        else {
            $_SESSION['grupo'] = $grupo;

        }

        $buscadorAlumno = $this->input->post('buscadorAlumno');

        $_SESSION['buscadorAlumno'] = $buscadorAlumno;

        $datos['alumnos'] = $this->Importacio_model->selectorAlumnosPorGrupo($grupo, $buscadorAlumno);

        $datos['titulo'] = "Llistat alumnat: " . $grupo;

        $this->cargarVista('observacionesAlumnos', $datos);
    }

    public function importarAsignaturas() {
        $resultado = $this->Importacio_model->importarAsignaturas();

    }

    /*public function importarProfesor() {
        $resultado = $this->Importacio_model->importarProfesor();

    }

    public function importarAlumnos() {
        $resultado = $this->Importacio_model->importarAlumnos();

    }*/
}