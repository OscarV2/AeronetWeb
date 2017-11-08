<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 29/10/2017
 * Time: 10:44 PM
 */

class Proyecto_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function guardarProyecto($proyecto){

        $this->db->insert('proyectos', $proyecto);
    }

    public function obtenerTodosProyectos(){

        return $this->db->get('proyectos');
    }

    public function culminarProyecto($id, $data)
    {

        $this->db->where('idProyecto', $id);
        $this->db->update('proyectos', $data);

        //habilitar estaciones
    }
}