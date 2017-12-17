<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 17/12/2017
 * Time: 1:08 AM
 */

class Analisis_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function existeLote($mes, $year)
    {
        $this->db->where('mes', $mes);
        $this->db->where('year', $year);
        $this->db->from('lotefiltros');
        return $this->db->count_all_results();
    }
    public function getEquiposPorEstacion($key)
    {
        return $this->db->get_where('equipos',array('estacion_idestacion' => $key));
    }
    public function getFiltrosLote()
    {

    }

    public function getMuestrasFiltro()
    {

    }



}