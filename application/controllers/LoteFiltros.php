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
        $this->load->view('layout/footer');

    }

}