<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 11:39 AM
 */

class Proyecto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proyecto_model');

    }

    public function verTodosProyectos()
    {
        $proyectos = $this->Proyecto_model->obtenerTodosProyectos();
        echo var_dump($proyectos);
    }

    public function irDetallesProyecto(){
        $this->load->view('layout/header');
        $this->load->view('coordinador/detalles_proyecto');
        $this->load->view('layout/footer');
    }
}