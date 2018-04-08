<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 01/11/2017
 * Time: 11:07 AM
 */
class Estaciones extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Estacion_model');
        $this->load->library('session');

    }

    public function irAsignarEstaciones()
    {
        $idProyecto = $this->input->get('id');
        $nombre = $this->input->get('nombre');
        $data = array(
            'idProyecto' => $idProyecto,
            'nombre' => $nombre,
            'estaciones' => $this->Estacion_model->getEstacionSinProyecto()
        );

        $this->load->view('layout/header');
        $this->load->view('coordinador/asignar_estaciones', $data);
    }

    public function gestionarEstaciones()
    {
        // ids de estaciones seleccionadas
        $estaciones = $this->input->post('estacion');
        $idProyecto = $this->input->get('idProyecto');

        $this->Estacion_model->asignarEstacion($estaciones, $idProyecto);
        echo 'success';

    }

    public function crearEstacion()
    {
        $longitud = (string)$this->input->post('longitud');
        $latitud = (string)$this->input->post('latitud');

        $localizacion = $latitud . ',' . $longitud;

        $data = array(
            'nombre' => $this->input->post('nombreEstacion'),
            'municipio' => $this->input->post('municipio'),
            'msnm' => $this->input->post('msnm'),
            'tipo' => $this->input->post('tipoEst'),
            'localizacion' => $localizacion
        );

        try{
            $this->Estacion_model->guardarNuevaEstacion($data);

            $this->estacionCreatedSuccessfully(2);
        }catch (Error $error){
            $this->estacionCreatedSuccessfully(0);
        }
    }


    private function estacionCreatedSuccessfully($err)
    {

        $estaciones = $this->Estacion_model->getEstaciones();
        $data = array('estaciones' => $estaciones, 'err' => $err);
        $this->load->view('layout/header');
        $this->load->view('coordinador/nuevo_equipo', $data);
    }




}