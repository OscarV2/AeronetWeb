<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 07:29 AM
 */

class Usuario_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function guardarNuevosUsuario($data)
    {
        $this->db->insert('usuarios',$data);
    }

    public function getUsuariosLaboratorio()
    {
        $this->db->select('nombre, idusuarios');
        $this->db->where('rol', 'laboratorista');
        return $this->db->get('usuarios');
    }

    public function getUsuariosCampo()
    {
        $this->db->select('nombre, idusuarios');
        $this->db->where('rol', 'campo');
        return $this->db->get('usuarios');
    }

    public function existeUsuario($usuario, $password)
    {

    }
}