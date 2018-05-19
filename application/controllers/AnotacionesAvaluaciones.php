<?php

require_once("DefaultController.php");
class AnotacionesAvaluaciones extends DefaultController
{

    public function __construct()
    {
        parent::__construct(); //Necesario para que carge el controlador y tambien valide si hay sesión o no
        //Aqui cargaremos linrerial, helpes y modelo
        //Ejemplo de cargar modelo
        // $this->load->model('nombreModelo');
        $this->load->model('AnotacionesAvaluaciones_model');
    }

    function index() {
        echo "controlador anotaciones evaluaciones";
    }
    function guardarAnotaciones() {
        $comentario = "";
        $numEvaluacion = "";

        $nia = $this->input->post("nia");
        print_r($nia);

        $avalInicial = $this->input->post("0avaluacio", 0);
        if($avalInicial != 0) {
            $numEvaluacion = 0;
            $comentario = $avalInicial;

            $datos = array(
                'alumne' => $nia,
                'avaluacio' => $numEvaluacion,
                'comentari' => $comentario

            );
            print_r($datos);


        }

        $primeraAval = $this->input->post("1avaluacio", 0);

        if($primeraAval != "") {
            $numEvaluacion = 1;
            $comentario = $primeraAval;

            $datos = array(
                'alumne' => $nia,
                'avaluacio' => $numEvaluacion,
                'comentari' => $comentario

            );

            self::actualizarAvaluacio($datos, $nia);

        }

        $segonaAval = $this->input->post("2avaluacio", 0);
        if($segonaAval != "") {
            $numEvaluacion = 2;
            $comentario = $segonaAval;

            $datos = array(
                'alumne' => $nia,
                'avaluacio' => $numEvaluacion,
                'comentari' => $comentario

            );
            print_r($datos);

            self::actualizarAvaluacio($datos, $nia);
        }
        $terceraAval = $this->input->post("3avaluacio", 0);
        if($terceraAval != "") {
            $numEvaluacion = 3;
            $comentario = $terceraAval;

            $datos = array(
                'alumne' => $nia,
                'avaluacio' => $numEvaluacion,
                'comentari' => $comentario

            );
            print_r($datos);

            self::actualizarAvaluacio($datos, $nia);
        }

        $datos = array(
            'alumne' => $nia,
            'avaluacio' => $numEvaluacion,
            'comentari' => $comentario

        );


        self::actualizarAvaluacio($datos, $nia);
    }

    function actualizarAvaluacio($datos, $nia) {

        if( $this->AnotacionesAvaluaciones_model->guardarAnotaciones($datos, $nia)) {
            self::mostrarAlert("Avaluació actualizada amb èxit", "success");
        }
        else {
            self::mostrarAlert("Error al actualizar l'avaluació", "error");
        }


        redirect('/cargarAlumnos');
    }
}