<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 09:12 AM
 */

class Equipos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Equipo_model');
    }

    public function getEquipos(){

        echo json_encode($this->Equipo_model->getEquipos()->result());
    }
}