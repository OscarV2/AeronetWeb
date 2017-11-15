<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 06/11/2017
 * Time: 10:55 PM
 */

class Calibrador extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Calibrador_model');
    }

    public function getCalibradores()
    {
      echo json_encode($this->Calibrador_model->getCalibradores()->result());
    }
}