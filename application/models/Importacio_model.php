<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 11/05/2018
 * Time: 18:07
 */

class Importacio_model extends CI_Model
{
    private $xml_file;//="importar/llxgesc.xml";
    private $count;//=0;
    private $countAct;//=0;
    private $xml;// = file_get_contents($xml_file);
    private $sxe;// = new SimpleXMLElement($xml);

    public function __construct()
    {
        // parent::__construct();
        $this->xml_file = "C:\\xampp\htdocs\amonestacion\importar\imexalum_alumnos_cursos_grupos_horario_docentes.xml";
        $this->count = 0;
        $this->xml = file_get_contents($this->xml_file);
        $this->sxe = new SimpleXMLElement($this->xml);

        $this->load->database();
        $this->load->helper('url');


    }

    public function importarGrupoProfesor()
    {

        $NIA = Array();
        $this->count = 0;
        $this->countAct = 0;
        $fecha;
        //funcio per a obrir fitxer xml
        foreach ($this->sxe->xpath('//horario_grupo') as $horarioGrupo) {
            //print_r($horarioGrupo);

            echo "---------<hr>";

            $dia_semana = $horarioGrupo['dia_semana'];
            $sesion_orden = $horarioGrupo['sesion_orden'];
            $hora_desde = $horarioGrupo['hora_desde'];
            $hora_hasta = $horarioGrupo['hora_hasta'];
            $grupo = $horarioGrupo['grupo'];
            $contenido = $horarioGrupo['contenido'];
            $docente = $horarioGrupo['docente'];

            echo $docente;

            $data = array(
                'dia_semana' => $dia_semana,
                'sesion_orden' => $sesion_orden,
                'hora_desde' => $hora_desde,
                'hora_hasta' => $hora_hasta,
                'grupo' => $grupo,
                'contenido' => $contenido,
                'docente' => $docente

            );

            $this->db->insert('grupo_profesor', $data);

            //select distinct grupo from grupo_profesor where docente = '070984654F'

        }
    }

    function selectorGrupos()
    {
        $dni = $_SESSION['dni'];
        $sql = "select distinct grupo from grupo_profesor where docente = ?";

        $query = $this->db->query($sql, $dni);

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function selectorAlumnosPorGrupo($grupo, $nombre)
    {
        //$sql = "SELECT * FROM alumno WHERE grupo = ?  AND nombre LIKE '%$nombre%' ORDER BY apellido1";

        $sql = "select a.*, (select comentari from notesavaluacio n where n.alumne = a.NIA AND n.avaluacio = 3) AS tercera,
	            (select comentari from notesavaluacio n where n.alumne = a.NIA AND n.avaluacio = 2) AS segona,
                (select comentari from notesavaluacio n where n.alumne = a.NIA AND n.avaluacio = 1) AS primera,
                (select comentari from notesavaluacio n where n.alumne = a.NIA AND n.avaluacio = 0) AS inicial
                from alumno a WHERE grupo = ?  AND nombre LIKE '%$nombre%' ORDER BY a.apellido1";


        /*$sql = "SELECT * FROM alumno a
                   , notesavaluacio n
                   WHERE grupo = ? AND  a.NIA = n.alumne
                   ORDER BY 'apellido1'";*/


        $query = $this->db->query($sql, $grupo);

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    /*function selectorObservaciones($nia)
    {
        //$sql = "SELECT * FROM notesavaluacio WHERE alumne = ?";

        /*$sql = "select a.*, (select comentari from notesavaluacio n where n.alumne = a.NIA AND n.avaluacio = 3) AS tercera,
	            (select comentari from notesavaluacio n where n.alumne = a.NIA AND n.avaluacio = 2) AS segona,
                (select comentari from notesavaluacio n where n.alumne = a.NIA AND n.avaluacio = 1) AS primera,
                (select comentari from notesavaluacio n where n.alumne = a.NIA AND n.avaluacio = 0) AS inicial
                from alumno a ORDER BY a.apellido1";*/

        //$sql = "select * from alumno a, notesavaluacio n where n.alumne = a.NIA ORDER BY a.apellido1";

        //$query = $this->db->query($sql, $nia);

        //if ($query->num_rows() > 0) {
          //  return $query->result();
        //}
    //}
}