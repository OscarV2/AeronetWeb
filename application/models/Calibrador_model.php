<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 07:25 AM
 */

class Calibrador_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getCalibradores()
    {
        return $this->db->get('calibrador');
    }


}