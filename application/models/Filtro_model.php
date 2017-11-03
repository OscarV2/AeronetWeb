<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 06:53 AM
 */

class Filtro_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getFiltrosPorUsuario($key)
    {
        return $this->db->get_where('filtros',array('usuarios_idusuarios' => $key));
    }

    public function getFiltrosPorLote($key)
    {
        return $this->db->get_where('filtros',array('lotefiltros_id' => $key));
    }

    public function guardarNuevosFiltros($data)
    {
        foreach ($data as $datos){
            $this->db->insert('filtros',$datos);

        }
    }

    public function actualizarFiltros($id ,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('filtros',$data);
    }

    public function getCantFiltrosPM10Pesados($idLote)
    {
        $this->db->where('lotefiltros_id', $idLote);
        $this->db->where('tipo', 'PM10');
        $this->db->where('pesado', NULL);

         return $this->db->count_all_results('filtros');
    }

    public function getCantFiltrosPSTPesados($idLote)
    {
        $this->db->where('lotefiltros_id', $idLote);
        $this->db->where('tipo', 'PST');
        $this->db->where('pesado', NULL);
        return $this->db->count_all_results('filtros');
    }

    public function getCantFiltrosPM25Pesados($idLote)
    {
        $this->db->where('lotefiltros_id', $idLote);
        $this->db->where('tipo', 'PM25');
        $this->db->where('pesado', NULL);
        return $this->db->count_all_results('filtros');
    }

    public function getTotalPesados($idLote)
    {
        $this->db->where('lotefiltros_id', $idLote);
        $this->db->where('pesado', !NULL);
        return $this->db->count_all_results('filtros');
    }
}