<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 30/10/2017
 * Time: 01:41 PM
 */

class Coordinador extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proyecto_model');
    }

    public function irCrearProyecto(){
        $this->load->view('layout/header');
        $this->load->view('coordinador/nuevo_proyecto');
        $this->load->view('layout/footer');
    }

    public function crearProyecto()
    {

        $nombre = $this->input->post("nombre");
        $duracion = $this->input->post("duracion");
        $fechaInicio = $this->input->post("fechaInicio");
        $indefinido = $this->input->post("indefinido");
        $proyecto = new Proyecto($nombre, $duracion, $fechaInicio);

        $this->Proyecto_model->guardarProyecto($proyecto);

    }

}