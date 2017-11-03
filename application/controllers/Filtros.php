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
        $this->load->model('Filtro_model');
        $this->load->model('LoteFiltro_model');

    }

    public function irAsignarFiltros()
    {
        $this->load->view('layout/header');
        $this->load->view('coordinador/asignar_filtros');
        $this->load->view('layout/footer');
    }

    public function nuevoLote(){
        $periodo =  $this->input->post('mes') ."-" .$this->input->post('year');
        $data = array(
            'idusuario' => $this->input->post('lab'),
            'cant_pst' => $this->input->post('cant_pst'),
            'cant_pm10' => $this->input->post('cant_pm10'),
            'cant_pm25' => $this->input->post('cant_pm25'),
            'mes' => $periodo,
            'idProyecto' => $this->input->get('idProyecto'),
        );

      $this->LoteFiltro_model->nuevo($data);
    }

    public function irPesarFiltros()
    {
        $this->load->view('layout/header');
        $this->load->view('');
        $this->load->view('layout/footer');
    }

    public function irLoteFiltros()
    {
        $idLote = $this->input->post('id');
        echo '<h2>'. $idLote .'</h2>';

        $filtros = array(

            'cant_pst'   => $this->Filtro_model->getCantFiltrosPSTPesados($idLote),
            'cant_pm10'  => $this->Filtro_model->getCantFiltrosPM10Pesados($idLote),
            'cant_pm25'  => $this->Filtro_model->getCantFiltrosPM25Pesados($idLote),
            'cant_Total' => $this->Filtro_model->getTotalPesados($idLote)
        );

        $this->load->view('layout/header');
        $this->load->view('vista_laboratorio', $filtros);
        $this->load->view('layout/footer');

    }
}