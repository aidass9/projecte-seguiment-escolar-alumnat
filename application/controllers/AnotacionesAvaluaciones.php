<?php

class AnotacionesAvaluaciones extends CI_Controller
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

            $this->AnotacionesAvaluaciones_model->guardarAnotaciones($datos);
            //redirect('/login');
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
            print_r($datos);

            $this->AnotacionesAvaluaciones_model->guardarAnotaciones($datos);
            //redirect('/login');
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

            $this->AnotacionesAvaluaciones_model->guardarAnotaciones($datos);
            //redirect('/login');
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

            $this->AnotacionesAvaluaciones_model->guardarAnotaciones($datos, $nia);
            //redirect('/login');
        }



        /*$nia = "10002960";
        $terceraAval = "no trabaja";*/

    echo $nia."<br>";
    echo $avalInicial."<br>";
    //echo $primeraAval."<br>";
    //echo $segonaAval."<br>";
    //echo $terceraAval."<br>";
    //echo $comentario;
        $datos = array(
            'alumne' => $nia,
            'avaluacio' => $numEvaluacion,
            'comentari' => $comentario

        );
        print_r($datos);

        $this->AnotacionesAvaluaciones_model->guardarAnotaciones($datos, $nia);
        //redirect('/login');
    }
}