<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 02/11/2017
 * Time: 09:01 PM
 */

class LoteFiltro_model extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function nuevo($data)
    {
        $this->db->insert('lotefiltros', $data);
    }

    public function getLoteUsuario($id)
    {
        $this->db->select('mes, id');
        $this->db->where('idusuario', $id);
        return $this->db->get('lotefiltros');
    }
}