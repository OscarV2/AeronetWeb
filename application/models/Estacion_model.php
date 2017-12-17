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

    public function getEstaciones()
    {
        return $this->db->get('estacion');
    }

    public function getEstacionesAnalista()
    {
        $response = array();
        $estaciones = $this->getEstaciones()->result();

        foreach ($estaciones as $estacion) {

            $idEstacion = $estacion->idestacion;
            $this->db->select('idequipo, modelo, clase');
            $equiposEstacion = $this->db->get_where('equipos', array('estacion_idestacion' => $idEstacion))->result();

            foreach ($equiposEstacion as $equipo){

                array_push($response, array(
                    'nombreEstacion' => $estacion->nombre,
                    'idEquipo' => $equipo->idequipo,
                    'modelo' => $equipo->modelo,
                    'clase' => $equipo->clase,

                ));
            }
        }

        return $response;
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