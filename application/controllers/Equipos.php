<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 09:12 AM
 */

class Equipos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Equipo_model');
        $this->load->model('Filtro_model');
    }



    public function irAsignarFiltros()
    {

        $id = $this->input->get('id');
        //echo '<h1>'.$id.'</h1>';

        $idLote = $this->input->post('idLote');
        $data = array(
           'equipos' => $this->Equipo_model->getEquiposDesocupados($id),
           'filtros' => ($this->Filtro_model->getFiltrosSinAsignar($idLote))->result()
        );

        //echo var_dump($data['filtros']);

        $this->load->view('layout/header');
        $this->load->view('coordinador/asignar_filtros', $data);

    }

    public function asignarFiltros(){



    }
}