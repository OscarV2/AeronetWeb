<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 03/11/2017
 * Time: 10:43 AM
 */

class Usuarios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

    public function irGestionarFiltros()
    {
        $data = array(
            'usuarios' => $this->Usuario_model->getUsuariosLaboratorio(),
            'idProyecto' => $this->input->get('id')
        );

        $this->load->view('layout/header');
        $this->load->view('coordinador/gestionar_filtros', $data);
        $this->load->view('layout/footer');

    }

}