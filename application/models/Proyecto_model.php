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

    //obtener proyectos activos
    public function obtenerTodosProyectos(){

        $data = array();
        $this->db->select('idProyecto, nombre, fechaInicio, duracion');
        $proyectos = $this->db->get('proyectos')->result();

        foreach ($proyectos as $proyecto){

            $this->db->select('nombre');
            $this->db->where('proyectos_idProyecto', $proyecto->idProyecto);
            $estaciones = $this->db->get('estacion')->result();

            if (sizeof($estaciones) > 0) {
                $nombres = implode(', ', $this->estaciones($estaciones));

                array_push($data, array(
                    'idProyecto' => $proyecto->idProyecto,
                    'nombre'=> $proyecto->nombre,
                    'fechaInicio'=> $proyecto->fechaInicio,
                    'duracion'=>$proyecto->duracion,
                    'estaciones' => $nombres
                ));
            } else {
                array_push($data, array(
                    'idProyecto' => $proyecto->idProyecto,
                    'nombre'=> $proyecto->nombre,
                    'fechaInicio'=> $proyecto->fechaInicio,
                    'duracion'=>$proyecto->duracion,
                    'estaciones' => 'Sin estaciones asignadas.'
                ));
            }
        }

        return $data;
    }

    public function culminarProyecto($id, $data)
    {

        $this->db->where('idProyecto', $id);
        $this->db->update('proyectos', $data);

        //habilitar estaciones
    }

    private function estaciones($estaciones)
    {
        $estacion = array();
        foreach ($estaciones as $row){
            $estacion[] = $row->nombre;
        }
        return $estacion;
    }
}