<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 06/11/2017
 * Time: 08:05 PM
 */

class EquipoFiltro extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Filtro_model');
        $this->load->model('Equipo_model');
    }

}