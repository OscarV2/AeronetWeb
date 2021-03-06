<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 02/11/2017
 * Time: 09:01 PM
 */

class LoteFiltro_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function nuevo($data)
    {
        $this->db->insert('lotefiltros', $data);
    }

    public function getLote($id)
    {
        return $this->db->get_where('lotefiltros', array('id' => $id));
    }

    public function getLotesProyecto($id)
    {
        return $this->db->get_where('lotefiltros', array('idProyecto' => $id));
    }

    public function getTotales()
    {
        $this->db->where('tipo','pst');
        $this->db->from('filtros');
        $pst = $this->db->count_all_results();

        $this->db->where('tipo','pm10');
        $this->db->from('filtros');
        $pm10 = $this->db->count_all_results();

        $this->db->where('tipo','pm25');
        $this->db->from('filtros');
        $pm25 = $this->db->count_all_results();

        $data = array(
            'pst'  => $pst,
            'pm10' => $pm10,
            'pm25' => $pm25,

        );

        return $data;
    }

    /*getFiltros testigos*/
    public function getFiltros()
    {
        return $this->db->get('filtrotestigo')->result();
    }

    public function getLoteUsuario($id)
    {
        $this->db->select('mes, id, nombre');
        $this->db->where('idusuario', $id);
        return $this->db->get('lotefiltros');
    }
}