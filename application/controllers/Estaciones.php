<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 01/11/2017
 * Time: 11:07 AM
 */
class Estaciones extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Estacion_model');
    }

    public function irAsignarEstaciones()
    {
        $this->load->view('layout/header');
        $this->load->view('coordinador/asignar_estaciones');
        $this->load->view('layout/footer');
    }

    public function gestionarEstaciones()
    {
        // ids de estaciones seleccionadas
        $estaciones = $this->input->post('estacion');
        $idProyecto = $this->input->post('idProyecto');
        foreach ($estaciones as $estacion){
            echo $estacion;
        }
        //$this->Estacion_model->asignarEstacion($estaciones, $idProyecto);
    }

}