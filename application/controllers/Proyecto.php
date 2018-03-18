<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 11:39 AM
 */

class Proyecto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proyecto_model');
        $this->load->library('session');

    }

    public function verTodosProyectos()
    {
        $proyectos = array(
            'proyectos' => $this->Proyecto_model->obtenerTodosProyectos()
        );
        echo var_dump($proyectos);
    }

    public function irDetallesProyecto(){
        $this->load->view('layout/header');
        $this->load->view('coordinador/detalles_proyecto');
        $this->load->view('layout/footer');
    }

    public function culminarProyecto()
    {
        //Al culminar el proyecto sus estaciones
        //quedaran disponibles para asignarse a otro proyecto
        $id = $this->input->get('id');
        $fecha = $this->input->post('fecha');

        $data = array(
            'fechafin' => $fecha,
            'estado' => 'culminado'
        );

        $this->Proyecto_model->culminarProyecto($id, $data);
        echo '<h1>success</h1>';
    }
}