<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 03/11/2017
 * Time: 10:44 AM
 */

class LoteFiltros extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoteFiltro_model');
    }

    public function irMenuLotes()
    {
        $id = $this->input->get('id');

        $data = array(
           'lotes' =>  $this->LoteFiltro_model->getLotesProyecto($id),
           'idProyecto' => $id
        );

        $this->load->view('layout/header');
        $this->load->view('coordinador/vista_lotes', $data);
    }

    public function irVerLotesProyecto()
    {
        $id = $this->input->get('id');
        $nombre = $this->input->get('nombre');

        $data = array(
            'lotes' =>  $this->LoteFiltro_model->getLotesProyecto($id),
            'idProyecto' => $id,
            'nombre' => $nombre
        );

        $this->load->view('layout/header');
        $this->load->view('coordinador/lotes_proyecto', $data);
        $this->load->view('layout/footer');
    }

}