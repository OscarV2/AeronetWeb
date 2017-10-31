<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 07:22 AM
 */

class Estacion_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getEstacionPorProyecto($key)
    {
        return $this->db->get_where('estacion',array('proyectos_idproyectos' => $key));
    }

    public function guardarNuevaEstacion($data)
    {
        $this->db->insert('estacion',$data);
    }
}