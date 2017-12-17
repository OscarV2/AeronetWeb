<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 15/12/2017
 * Time: 11:49 AM
 */

class Analista extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Analisis_model');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('analista_de_datos/index');
        $this->load->view('layout/footer');
    }

    public function estaciones()
    {

        $this->load->model('Estacion_model');
        $data = array(
            'estaciones' => $this->Estacion_model->getEstacionesAnalista()
        );

        //var_dump($data);

        $this->load->view('layout/header');
        $this->load->view('analista_de_datos/estaciones', $data);


    }


    public function getMuestras()
    {
        $mes = $this->input->post('mes');
        $year = $this->input->post('year');
        $idEquipo = $this->input->post('equipo');

        $muestras = $this->Analisis_model->getMuestras($idEquipo, $mes, $year);

        $lotes = $this->Analisis_model->existeLote($mes, $year);

        if($lotes > 0){

        }
    }
}