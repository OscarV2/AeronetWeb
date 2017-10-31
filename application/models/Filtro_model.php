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

    public function guardarNuevosFiltros($data)
    {
        $this->db->insert('filtros',$data);
    }

    public function actualizarFiltros($id ,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('filtros',$data);
    }

}