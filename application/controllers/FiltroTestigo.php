<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 24/02/2018
 * Time: 10:26 PM
 */

class FiltroTestigo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('FiltroTestigo_model');

    }

    public function pesarFiltroFinal()
    {
        $idFiltro = $this->input->post('id');
        $peso = $this->input->post('pesoFinal');
        $fecha = $this->input->post('fecha');

        $data = array('pesoFinal' => $peso, 'pesadoFinal' =>$fecha);
        try{
            $this->Filtro_model->updateFiltro($idFiltro, $data);
            $response = "success";
        }catch (Error $e){
            $response = "Error";
        }
        echo $response;
    }

    public function guardarFiltros()
    {
        $codigo = $this->input->post('codigo');
        $peso   = $this->input->post('pesoNuevoFiltro');
        $fecha  = $this->input->post('fecha');

        $data = array(
            'codigo' => $codigo,
            'pesoInicial' => $peso,
            'fechaInicial' => $fecha
        );

        $this->FiltroTestigo_model->guardarNuevoFiltro($data);

        $this->load->model('LoteFiltro_model');
        $idusuario = $_SESSION['idusuario'];

        $lotes = array(
            'lotes' => $this->LoteFiltro_model->getLoteUsuario($idusuario),
            'filtrosTestigos' => $this->LotreFiltro_model->getFiltros(),
            'totales' => $this->LotreFiltro_model->getTotales()
        );

        $this->load->view('layout/header');
        $this->load->view('menu_laboratorio', $lotes);
    }

}