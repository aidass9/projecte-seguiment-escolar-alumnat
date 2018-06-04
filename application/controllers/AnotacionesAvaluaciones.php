<?php

require_once("DefaultController.php");

class AnotacionesAvaluaciones extends DefaultController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AnotacionesAvaluaciones_model');
    }

    function guardarAnotaciones()
    {
        $comentarios = [];

        $nia = $this->input->post("nia");

        $avalInicial = $this->input->post("0avaluacio", 0);
        if ($avalInicial != "") {
            $comentarios['0'] = $avalInicial;

        }

        $primeraAval = $this->input->post("1avaluacio", 0);
        if ($primeraAval != "") {
            $comentarios['1'] = $primeraAval;
        }

        $segonaAval = $this->input->post("2avaluacio", 0);
        if ($segonaAval != "") {
            $comentarios['2'] = $segonaAval;
        }

        $terceraAval = $this->input->post("3avaluacio", 0);
        if ($terceraAval != "") {
            $comentarios['3'] = $terceraAval;
        }

        $datos = array('alumne' => $nia, 'comentario' => $comentarios);
		
        if (count($comentarios) !== 0) self::actualizarAvaluacio($datos, $nia);
    }

    function actualizarAvaluacio($datos, $nia)
    {
        if ($this->AnotacionesAvaluaciones_model->guardarAnotaciones($datos, $nia)) {
            self::mostrarAlert("Avaluació actualizada amb èxit", "success");
        } else {
            self::mostrarAlert("Error al actualizar l'avaluació", "error");
        }
        redirect('/cargarAlumnos');
    }
}
