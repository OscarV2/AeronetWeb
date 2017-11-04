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

    public function getEstacionSinProyecto()
    {
        $this->db->where('proyectos_idProyecto', NULL);
        return $this->db->get('estacion');
    }


    public function asignarEstacion($data, $id)
    {
        $idProyecto = array(
            'proyectos_idProyecto' => $id
        );

        foreach ($data as $estacion){
            //se busca la estacion a asignar por el id
            $this->db->where('idestacion', $estacion);
            $this->db->update('estacion',$idProyecto);
        }

    }
}