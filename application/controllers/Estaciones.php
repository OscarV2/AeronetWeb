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
        $this->load->model('Proyecto_model');
        $this->load->helper('form');
    }

    public function irAsignarEstaciones()
    {
        $this->load->view('layout/header');
        $this->load->view('coordinador/asignar_estaciones');
        $this->load->view('layout/footer');
    }

}