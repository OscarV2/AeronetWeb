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
        $idProyecto = $this->input->get('id');
        $nombre = $this->input->get('nombre');
        $data = array(
            'idProyecto' => $idProyecto,
            'nombre' => $nombre,
            'estaciones' => $this->Estacion_model->getEstacionSinProyecto()
        );

        $this->load->view('layout/header');
        $this->load->view('coordinador/asignar_estaciones', $data);
        $this->load->view('layout/footer');

    }

    public function gestionarEstaciones()
    {
        // ids de estaciones seleccionadas
        $estaciones = $this->input->post('estacion');
        $idProyecto = $this->input->get('idProyecto');

        $data = array();
        for ($i = 0; $i < sizeof($estaciones); $i++){
            $data[$i] = $estaciones[$i];
        }

        $this->Estacion_model->asignarEstacion($estaciones, $idProyecto);
    }

}