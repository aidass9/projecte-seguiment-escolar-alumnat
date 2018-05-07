<?php

class Usuario_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function iniciarSesion($documento, $pass)
    {
        $query = $this->db->get_where('profesor', Array('documento' => $documento));
        $usuario = $query->row_array();
        $correcto = password_verify($pass, $usuario['pass']);

        if ($correcto) {
            $_SESSION['usuario'] = $usuario;
            return true;
        }
    }


    /*    public function crear($user_name, $user_login, $user_password, $confirmar, $user_rol_id = 3)
        {
            if ($user_password === $confirmar) {
                $usuario = Array(
                    'user_name' => $user_name,
                    'user_password' => $this->hash_password($user_password),
                    'user_login' => $user_login,
                    'user_rol_id' => $user_rol_id
                );
                return $this->db->insert('usuarios', $usuario);
            }
        }*/

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_DEFAULT, Array('cost' => 9));
    }


    /*public function borrar($id)
    {
        if (!($this->db->delete('usuarios', array('user_id' => $id)))) {
            $_SESSION['error'] = "Ha habido un error al borrar el usuario con id $id";
        } else {
            $_SESSION['mensaje'] = "Usuario con id $id borrado con éxito";
        }
    }*/
    /*    public function obtenerPorId($id)
        {
            $this->db->select('user_id, user_login, user_rol_id, user_name');
            $query = $this->db->get_where('usuarios', Array('user_id' => $id));
            return $query->row_array();
        }*/


}
/*
 *
 * PREPARACION PARA PASAR LA CONTRASEÑA A HASH PARA QUE NO SE VEAN
        $this->load->database();
        $this->db->select('*'); //select de todos los profesores
        $query = $this->db->get('profesor');
        $profesores = $query->result_array();
        //recorro todos los profesores
        foreach ($profesores as $profesor) {
            print_r($profesor);
            //Para cada profesor guardes en el campo pass guardes el hash de pass
            , pa$this->db->set('pass'ssword_hash($profesor['pass'], PASSWORD_BCRYPT, Array('cost' => 9)));
        $this->db->where('documento', $profesor['documento']);
        $this->db->update('profesor');

    }
 *
 *
 *
 * */
