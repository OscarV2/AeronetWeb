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

    public function irPesarFiltros()
    {
        $data = array(
            'idLote' => $this->input->get('idLote'),
            'tipo' => $this->input->get('tipo'),
            'consecutivo' => $this->input->get('consecutivo')
        );

        $this->load->view('layout/header');
        $this->load->view('vista_pesar_filtros', $data);
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

    public function irLoteFiltros()
    {
        $idLote = $this->input->post('id');

        $filtros = array(

            'cant_pst'   => $this->Filtro_model->getCantFiltrosPSTPesados($idLote),
            'cant_pm10'  => $this->Filtro_model->getCantFiltrosPM10Pesados($idLote),
            'cant_pm25'  => $this->Filtro_model->getCantFiltrosPM25Pesados($idLote),
            'cant_Total' => $this->Filtro_model->getTotalPesados($idLote),
            'filtrosPesados' => $this->Filtro_model->getFiltrosPorLote($idLote),

            'idLote' => $idLote
        );

        $this->load->view('layout/header');
        $this->load->view('vista_laboratorio', $filtros);
        $this->load->view('layout/footer');

    }

    public function guardarFiltros()
    {
        $idLote = $this->input->get('idLote');
        $tipo = $this->input->get('tipo');
        $codigos = $this->input->post('codigoNuevoFiltro[]');
        $pesos = $this->input->post('pesoNuevoFiltro[]');
        $fechas = $this->input->post('fechaNuevoFiltro[]');

        $data = array();
        //llenar array con filtros (array of arrays)
        for ($i = 0; $i < sizeof($codigos); $i++){
            $data[$i] = array(
                'identificador' => $codigos[$i],
                'pesado' => $fechas[0],
                'pesoInicial' => $pesos[$i],
                'tipo' => $tipo,
                'lotefiltros_id' => $idLote
            );
        }

        $this->Filtro_model->guardarNuevosFiltros($data);
    }
}