<?php

class AnotacionesAvaluaciones_model extends CI_Model {

    public function __construct() {
        parent::__construct(); //Necesario para que carge el controlador y tambien valide si hay sesión o no
        //Aqui cargaremos linrerial, helpes y modelo
        //Ejemplo de cargar modelo
        // $this->load->model('nombreModelo');

        $this->load->database();
        $this->load->helper('url');
    }

    function guardarAnotaciones($datos, $nia) {
        //$sql = "INSERT INTO notesavaluacio WHERE alumne = $alumno->NIA"
        $this->db->where('alumne', $nia);
        $this->db->where('avaluacio', 3);
        return $this->db->update('notesavaluacio', $datos);



        //$this->db->insert('notesavaluacio', $datos);

    }

}
