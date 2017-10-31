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
        $this->load->helper('form');
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
        $indefinido = $this->input->post("indefinido");

        if ($indefinido == "Indefinida"){
            $fechaInicio = "0";
        }
        else{
            $fechaInicio = $this->input->post("fecha_inicio");
        }

        $proyecto = array('nombre' => $nombre,
            'duracion' =>$duracion,
            'fechaInicio' =>$fechaInicio);
        $this->Proyecto_model->guardarProyecto($proyecto);

    }

}