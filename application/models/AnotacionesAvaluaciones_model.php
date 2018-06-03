<?php

class AnotacionesAvaluaciones_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
    }

    function guardarAnotaciones($datos, $nia) {

        $evaluacion = $this->session->userdata('evaluacionActiva');
        $this->db->where('alumne', $nia);
        $this->db->where('avaluacio', $evaluacion);
        print_r($datos);
        print_r($evaluacion);

        return $this->db->update('notesavaluacio', ['comentari' => $datos['comentario'][$evaluacion]] );

    }

}
