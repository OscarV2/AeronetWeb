<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 24/02/2018
 * Time: 10:26 PM
 */

class FiltroTestigo_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function guardarNuevoFiltro($data)
    {
            $this->db->insert('filtroTestigo',$data);
    }

    public function actualizarFiltros($id ,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('filtroTestigo',$data);
    }



}