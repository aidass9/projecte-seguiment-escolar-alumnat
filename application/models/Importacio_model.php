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

        $this->load->database();
        $this->load->helper('url');

    }

    public function importarGrupoProfesor()
    {
        $this->xml_file = "C:\\xampp\htdocs\amonestacion\importar\imexalum_alumnos_cursos_grupos_horario_docentes.xml";
        $this->xml = file_get_contents($this->xml_file);
        $this->sxe = new SimpleXMLElement($this->xml);

        foreach ($this->sxe->xpath('//horario_grupo') as $horarioGrupo) {

            $dia_semana = $horarioGrupo['dia_semana'];
            $sesion_orden = $horarioGrupo['sesion_orden'];
            $hora_desde = $horarioGrupo['hora_desde'];
            $hora_hasta = $horarioGrupo['hora_hasta'];
            $grupo = $horarioGrupo['grupo'];
            $contenido = $horarioGrupo['contenido'];
            $docente = $horarioGrupo['docente'];

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

        }
    }

    public function importarAsignaturas()
    {
        $this->xml_file = "C:\\xampp\htdocs\amonestacion\importar\imexalum_asignaturas.xml";

        $this->xml = file_get_contents($this->xml_file);
        $this->sxe = new SimpleXMLElement($this->xml);

        foreach ($this->sxe->xpath('//contenido') as $asignatura) {

            $asignatura_curso = $asignatura['curso'];
            $asignatura_codigo = $asignatura['codigo'];
            $asignatura_descrip_cas = $asignatura['nombre_cas'];
            $asignatura_descrip_val = $asignatura['nombre_val'];

            $data = array(
                'asignatura_curso' => $asignatura_curso,
                'asignatura_codigo' => $asignatura_codigo,
                'asignatura_nombre_cas' => $asignatura_descrip_cas,
                'asignatura_nombre_val' => $asignatura_descrip_val,

            );

            print_r($data);

            $this->db->insert('asignaturas', $data);

        }
    }

    /*public function importarAlumnos()
    {
        $this->xml_file = "C:\\xampp\htdocs\amonestacion\importar\imexalum_alumnes.xml";
        $this->xml = file_get_contents($this->xml_file);
        $this->sxe = new SimpleXMLElement($this->xml);

        foreach ($this->sxe->xpath('//alumno') as $alumno) {

            $NIA = $alumno['NIA'];
            $nombre = $alumno['nombre'];
            $apellido1 = $alumno['apellido1'];
            $apellido2 = $alumno['apellido2'];
            $telefono1 = $alumno['telefono1'];
            $email1 = $alumno['email1'];
            $municipio = $alumno['municipio'];
            $localidad = $alumno['localidad'];
            $telefono2 = $alumno['telefono2'];
            $telefono3 = $alumno['$telefono3'];
            $fecha_matricula = $alumno['fecha_matricula'];
            $estado_matricula = $alumno['estado_matricula'];
            $ensenanza = $alumno['ensenanza'];
            $curso = $alumno['curso'];
            $grupo = $alumno['grupo'];
            $fecha_nac = $alumno['fecha_nac'];
            $repite = $alumno['repite'];

            $data = array(
                'NIA' => $NIA,
                'nombre' => $nombre,
                'apellido1' => $apellido1,
                'apellido2' => $apellido2,
                'telefono1' => $telefono1,
                'email1' => $email1,
                'municipio' => $municipio,
                'localidad' => $localidad,
                'telefono' => $telefono2,
                'telefono3' => $telefono3,
                'fecha_matricula' => $fecha_matricula,
                'estado_matricula' => $estado_matricula,
                '$ensenanza' => $ensenanza,
                'curso' => $curso,
                'grupo' => $grupo,
                'fecha_nac' => $fecha_nac,
                'repite' => $repite


            );

            $this->db->insert('alumno', $data);

        }
    }*/

    /*public function importarProfesor()
    {
        $this->xml_file = "C:\\xampp\htdocs\amonestacion\importar\imexalum_profesors.xml";
        $this->xml = file_get_contents($this->xml_file);
        $this->sxe = new SimpleXMLElement($this->xml);

        foreach ($this->sxe->xpath('//profesor') as $profesor) {

            $documento = $profesor['documento'];
            $nombre = $profesor['nombre'];
            $apellido1 = $profesor['apellido1'];
            $apellido2 = $profesor['apellido2'];
            $pass = $profesor['pass'];

            $data = array(
                'documento' => $documento,
                'nombre' => $nombre,
                'apellido1' => $apellido1,
                'apellido2' => $apellido2,
                'pass' => $pass

            );

            $this->db->insert('profesor', $data);

        }
    }*/

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

        $sql = "select a.*, (select comentari from notesavaluacio n where n.alumne = a.NIA AND n.avaluacio = 3) AS tercera,
	            (select comentari from notesavaluacio n where n.alumne = a.NIA AND n.avaluacio = 2) AS segona,
                (select comentari from notesavaluacio n where n.alumne = a.NIA AND n.avaluacio = 1) AS primera,
                (select comentari from notesavaluacio n where n.alumne = a.NIA AND n.avaluacio = 0) AS inicial
                from alumno a WHERE grupo = ?  AND nombre LIKE '%$nombre%' ORDER BY a.apellido1";

        $query = $this->db->query($sql, $grupo);

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

}