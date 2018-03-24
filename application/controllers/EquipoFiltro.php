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
        $this->load->library('session');

    }

    //Asignar equipos
    public function asignarEquipos()
    {
        $idEquipos = $this->input->post('idEquipos');
        $idFiltros = $this->input->post('idFiltros');

        for($i = 0;$i < sizeof($idEquipos); $i++ ){
            $this->Filtro_model->asignarEquipoFiltro($idEquipos[$i], $idFiltros[$i]);
            $this->Equipo_model->ocuparEquipo($idEquipos[$i]);
        }

        echo 'success';
    }

}