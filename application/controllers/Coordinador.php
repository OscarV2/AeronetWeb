<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 30/10/2017
 * Time: 01:41 PM
 */

class Coordinador extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proyecto_model');
        $this->load->helper('form');
    }

    public function index(){
        $proyectos = array(
            'proyectos' => $this->Proyecto_model->obtenerTodosProyectos()
        );

        $this->load->view('layout/header');
        $this->load->view('coordinador/vista_coordinador', $proyectos);
        $this->load->view('layout/footer');

    }

    public function irCrearProyecto(){
        $this->load->view('layout/header');
        $this->load->view('coordinador/nuevo_proyecto');

    }

    public function irCrearUsuario(){
        $this->load->view('layout/header');
        $this->load->view('coordinador/nuevo_usuario');
        $this->load->view('layout/footer');

    }

    public function irEstaciones(){
        $this->load->view('layout/header');
        $this->load->view('coordinador/estaciones');
        $this->load->view('layout/footer');

    }

    public function irListaProyectos(){
        $this->load->view('layout/header');
        $this->load->view('coordinador/lista-proyectos');
        $this->load->view('layout/footer');

    }

    public function asignarEquipos()
    {
        $data = $this->input->get('id');
        echo 'datos: ' . $data;
    }

    public function crearProyecto()
    {
        $nombre = $this->input->post("nombre");
        $duracion = $this->input->post("duracion");
        $indefinido = $this->input->post("indefinido");
        $descripcion =  $this->input->post("descripcion");
        $fechaInicio = $this->input->post("fecha_inicio");
        if ($indefinido == "Indefinida"){
            $duracion = "Indefinida";
        }

        $proyecto = array('nombre' => $nombre,
            'duracion' =>$duracion,
            'fechaInicio' => $fechaInicio,
            'descripcion' => $descripcion);
        $this->Proyecto_model->guardarProyecto($proyecto);

        echo 'success';
    }

    public function vistaActividadExitosa()
    {
        $this->load->view('layout/header');
        $this->load->view('success_message');
        $this->load->view('layout/footer');
    }
}