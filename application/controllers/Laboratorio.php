<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 10:47 AM
 */

class Laboratorio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proyecto_model');
        $this->load->helper('form');
    }

    public function irPesarFiltros()
    {
       $this->load->view('vista_pesar_filtros');
    }

    public function irLaboratorio()
    {
        $this->load->view('vista_laboratorio');
    }


}