<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 01/11/2017
 * Time: 10:25 AM
 */

class UsuarioFiltro_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function nuevoUsuarioFiltro($idUsuario, $idFiltro)
    {
        $usuarioFiltro = array('usuarios_idusuarios' => $idUsuario,
            'Filtros_idFiltros' => $idFiltro);
        $this->db->insert('usuariofiltros', $usuarioFiltro);
    }
}