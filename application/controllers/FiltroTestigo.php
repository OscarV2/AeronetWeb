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
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');

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
        $this->load->library('session');

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

        $idusuario = $this->session->idusuario;

        $lotes = $this->LoteFiltro_model->getLoteUsuario($idusuario);

        $b = $this->session->totales;

        $err = 1;

        $data = array(
          'lotes' => $lotes,
          'err' => $err,
          'filtrosTestigos' => $this->session->filtrosTestigos,
          'totales' => $this->session->totales
        );
        $this->load->view('layout/header');
        $this->load->view('menu_laboratorio', $data);

    }

    public function irMenu($err)
    {
        $this->load->model('LoteFiltro_model');
        //$idusuario = $_SESSION['idusuario'];

        $data = array(
            'err' => $err
        );
        /*
        $lotes = array(
            'lotes' => $this->LoteFiltro_model->getLoteUsuario($idusuario),
            'filtrosTestigos' => $this->LotreFiltro_model->getFiltros(),
            'totales' => $this->LotreFiltro_model->getTotales()
        );
*/
    }

}