<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 09:12 AM
 */

class Filtros extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proyecto_model');
        $this->load->helper('form');
    }


    public function irAsignarFiltros()
    {
        $this->load->view('layout/header');
        $this->load->view('coordinador/asignar_filtros');
        $this->load->view('layout/footer');
    }

    public function irGestionarFiltros()
    {
        $this->load->view('layout/header');
        $this->load->view('coordinador/gestionar_filtros');
        $this->load->view('layout/footer');
    }


}