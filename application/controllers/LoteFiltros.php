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

}