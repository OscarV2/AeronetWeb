<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 06/11/2017
 * Time: 11:09 PM
 */

class
Calibracion_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function guardarCalibracion($data)
    {
        $this->db->insert('calibracion', $data);
    }

    public function getUltimasCalibraciones()
    {
        $idequipos = array();
        $calibraciones = array();
        // get Equipos ids
        $this->db->select('idequipo');
        $equipos = $this->db->get('equipos');

         foreach ($equipos->result() as $equipo){
             $idequipos[] = $equipo->idequipo;

             $this->db->where('equipos_idequipo', $equipo->idequipo);
             $this->db->from('calibracion');
             $this->db->order_by('id','desc');
             $this->db->limit(1);
             $calibracion = $this->db->get()->row();
             if (sizeof($calibracion)>0){
                 $calibraciones[] = $calibracion;
             }

         }
         //return $idequipos;
         return $calibraciones;

        // get calibraciones
    }
}