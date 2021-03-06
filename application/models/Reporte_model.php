<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 6/03/2018
 * Time: 8:58 PM
 */

class Reporte_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getMuestras($idEquipo, $idLote)
    {
        $filtrosArray = array();

            $filtrosEquipo = $this->getFiltros($idEquipo, $idLote);

            if (sizeof($filtrosEquipo) > 0){ // HAY FILTROS VALIDOS
                $response = array();
                foreach ($filtrosEquipo as $filtro) {

                    $idFiltro = $filtro->idFiltros;
                    $muestras = $this->getMuestraFiltro($idFiltro)->result();
                    foreach ($muestras as $muestra)
                        $muestrasFiltros[] = array(
                            'filtro' => $filtro->identificador,
                            'fecha_muestreo' => $filtro->fecha_muestreo,
                            'presion_amb' => $muestra->presion_amb,
                            'temp_ambC' => $muestra->temp_ambC,
                            'temp_ambK' => $muestra->temp_ambK,
                            'presion_est_inicial' => $muestra->presion_est_inicial,
                            'presion_est_final' => $muestra->presion_est_final,
                            'presion_est_avg' => $muestra->presion_est_avg,
                            'tiempo_operacion' => $muestra->tiempo_operacion,
                            'PoPa' => $muestra->PoPa,
                            'Qr' => $muestra->Qr,
                            'Qstd' => $muestra->Qstd,
                            'diff_rfo' => $muestra->diff_rfo,
                            'Vstd' => $muestra->Vstd,
                            'Wi' => $muestra->Wi,
                            'Wf' => $muestra->Wf,
                            'Wn' => $muestra->Wn,
                            'variable' => $muestra->variable,
                        );
                }

                $response = $muestrasFiltros;
            }else{
                $response = 'no hay filtros validos';
            }

        return $response;
    }

    public function getMuestraFiltro($idFiltro)
    {
        return $this->db->get_where('muestra', array(
            'idFiltro' => $idFiltro
        ));
    }

    //get filtros validos
    public function getFiltros($idEquipo, $idLote)
    {
        return $this->db->get_where('filtros',
            array(
                'idequipo' => $idEquipo,
                'lotefiltros_id' => $idLote,
                'valido' => 1
            ))->result();
    }

}