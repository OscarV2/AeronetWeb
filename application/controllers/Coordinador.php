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
        $this->load->view('layout/footer');

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

    public function crearProyecto()
    {
        $nombre = $this->input->post("nombre");
        $duracion = $this->input->post("duracion");
        $indefinido = $this->input->post("indefinido");

        if ($indefinido == "Indefinida"){
            $duracion = "Indefinida";
        }
        else{
            $fechaInicio = $this->input->post("fecha_inicio");
        }

        $proyecto = array('nombre' => $nombre,
            'duracion' =>$duracion,
            'fechaInicio' =>$fechaInicio);
        $this->Proyecto_model->guardarProyecto($proyecto);

    }

}