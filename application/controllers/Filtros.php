<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 09:12 AM
 */

class Filtros extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->model('LoteFiltro_model');
    }

    public function irAsignarFiltros()
    {
        $this->load->view('layout/header');
        $this->load->view('coordinador/asignar_filtros');
        $this->load->view('layout/footer');
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

    public function nuevoLote(){
        $periodo =  $this->input->post('mes') ."-" .$this->input->post('year');
        $data = array(
            'idusuario' => $this->input->post('lab'),
            'cant_pst' => $this->input->post('cant_pst'),
            'cant_pm10' => $this->input->post('cant_pm10'),
            'cant_pm25' => $this->input->post('cant_pm25'),
            'mes' => $periodo,
            'idProyecto' => $this->input->get('idProyecto'),
        );

      /*  echo '<p> idUsuario' . $data['idusuario'] . '</p>';
        echo '<p>pst'  . $data['cant_pst']. '</p>';
        echo '<p>pm10'  .$data['cant_pm10']. '</p>';
        echo '<p>pm25'  .$data['cant_pm25']. '</p>';
        echo '<p>PRO'  .$data['idProyecto']. '</p>';
      */
      $this->LoteFiltro_model->nuevo($data);
    }

}