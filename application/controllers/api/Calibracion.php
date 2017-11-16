<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 14/11/2017
 * Time: 07:04 PM
 */

class Calibracion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Calibracion_model');
    }

    public function nuevaCalibracion()
    {
        $calibracion = $this->input->post('');
        //$this->Calibracion_model->guardarCalibracion();
    }
}