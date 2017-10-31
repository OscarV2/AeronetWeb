<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 06:54 AM
 */

class Equipo_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getEquiposPorUsuario($key)
    {
        return $this->db->get_where('equipos',array('usuarios_idusuarios' => $key));
    }

    public function getEquiposPorEstacion($key)
    {
        return $this->db->get_where('equipos',array('estacion_idestacion' => $key));
    }

    public function guardarNuevosEquipo($data)
    {
        $this->db->insert('equipos',$data);
    }


}