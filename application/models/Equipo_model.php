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

    public function getEquiposPorProyecto($key)
    {
        $estaciones = $this->db->get_where('estacion',array('proyectos_idProyecto' => $key));
        // recuperar equipos de las estaciones del proyecto
        $data = array();
        foreach ($estaciones->result() as $estacion){

            $this->db->select('codigo, clase, idequipo, descripcion, ocupado');
            $this->db->where('estacion_idestacion' , $estacion->idestacion);
            $query = $this->db->get('equipos');
            foreach ($query->result() as $equipo){
                array_push($data, array(
                    'estacion' => $estacion->nombre,
                    'codigo' => $equipo->codigo,
                    'id' => $equipo->idequipo,
                    'clase' => $equipo->clase,
                    'descripcion' => $equipo->descripcion,
                    'ocupado' => $equipo->ocupado
                ));
            }
        }
        return $data;
    }

    public function ocuparEquipo($id)
    {
        // al asignar se un filtro el estado ocupado
        // cambia a TRUE
        $data = array('ocupado' => 1);
        $this->db->where('idequipo', $id);
        $this->db->update('equipos', $data);
    }

    public function getEquiposFiltrosAsignados($idProyecto)
    {
        // get estaciones por proyecto
        $estaciones = $this->db->get_where('estacion',array('proyectos_idProyecto' => $idProyecto));
        // get equipos con filtros asignados
        $data = array();
        foreach ($estaciones->result() as $estacion){

            $this->db->select('codigo, clase, idequipo, descripcion, ocupado');
            $query = $this->db->get_where('equipos',array(
                'estacion_idestacion' => $estacion->idestacion,
                'ocuado' => 1
            ) );
            foreach ($query->result() as $equipo){

                $this->db->select('identificador');
                $this->db->where('pesado' , NULL);
                $this->db->where('idequipo' , $equipo->idequipo);
                $filtros = $this->db->get('filtros');

                array_push($data, array(
                    'estacion' => $estacion->nombre,
                    'codigo' => $equipo->codigo,
                    'id' => $equipo->idequipo,
                    'clase' => $equipo->clase,
                    'descripcion' => $equipo->descripcion,
                    'ocupado' => $equipo->ocupado,
                    'filtro' => $filtros->result()
                ));
                /*
                array_push($data, array(
                    'estacion' => $estacion->nombre,
                    'codigo' => $equipo->codigo,
                    'id' => $equipo->idequipo,
                    'clase' => $equipo->clase,
                    'descripcion' => $equipo->descripcion,
                    'ocupado' => $equipo->ocupado
                ));
                */
            }
        }
    }

    public function getEquiposDesocupados($key)
    {
        $equiposProyecto = $this->getEquiposPorProyecto($key);
        $data = array();
        foreach ($equiposProyecto as $item) {
            if ($item['ocupado'] == 0){
                array_push($data, $item);
            }
        }

        return $data;
    }
}