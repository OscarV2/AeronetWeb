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
        $this->load->database();
    }

    public function guardarNuevosUsuario($data)
    {
        $this->db->insert('usuarios',$data);
    }

}