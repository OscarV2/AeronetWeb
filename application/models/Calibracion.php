<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 06/11/2017
 * Time: 11:09 PM
 */

class Calibracion extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function guardarCalibracion($data)
    {
        $this->db->insert('calibracion', $data);
    }
}