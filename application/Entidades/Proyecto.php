<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 30/10/2017
 * Time: 02:05 PM
 */

class Proyecto
{

    public $nombre;
    public $duracion;
    public $fechaInicio;

    /**
     * Proyecto constructor.
     * @param $nombre
     * @param $duracion
     * @param $fechaInicio
     */
    public function __construct($nombre, $duracion, $fechaInicio)
    {
        $this->nombre = $nombre;
        $this->duracion = $duracion;
        $this->fechaInicio = $fechaInicio;
    }


}