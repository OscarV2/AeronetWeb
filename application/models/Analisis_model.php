<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 17/12/2017
 * Time: 1:08 AM
 */

class Analisis_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function existeLote($mes, $year)
    {
        $response = "";
        $this->db->where('mes', $mes);
        $this->db->where('year', $year);
        $this->db->from('lotefiltros');
        $cantLotes = $this->db->count_all_results();

        return $cantLotes;
        /*
        if ($cantLotes > 0){
            // el lote existe
            $lote = $this->getLote($mes, $year)->result();

        }else {
            $response = 'no existe';
        }
        */
        }

    public function getLote($mes, $year)
    {
        return $this->db->get_where('lotefiltros', array(
            'mes' => $mes,
            'year' => $year
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

    public function getMuestras($idEquipo, $mes, $year)
    {
        $cantLotes = $this->existeLote($mes, $year);
        $filtrosArray = array();

        if ($cantLotes > 0){
            // el lote existe
            $lote = $this->getLote($mes, $year)->result();
            $idLote = $lote[0]->id;

            $filtrosEquipo = $this->getFiltros($idEquipo, $idLote);

            if (sizeof($filtrosEquipo) > 0){ // HAY FILTROS VALIDOS
                $response = array();
                foreach ($filtrosEquipo as $filtro) {

                    $idFiltro = $filtro->idFiltros;
                    $muestra = $this->getMuestraFiltro($idFiltro)->result();
                    $muestrasFiltros[] = array(
                        'filtro' => $filtro->identificador,
                        'presion_amb' => $filtro->presion_amb,
                        'temp_ambC' => $filtro->temp_ambC,
                        'temp_ambK' => $filtro->temp_ambK,
                        'presion_est_inicial' => $filtro->presion_est_inicial,
                        'presion_est_final' => $filtro->presion_est_final,
                        'presion_est_avg' => $filtro->presion_est_avg,
                        'tiempo_operacion' => $filtro->tiempo_operacion,
                        'PoPa' => $filtro->PoPa,
                        'Qr' => $filtro->Qr,
                        'Qstd' => $filtro->Qstd,
                        'diff_rfo' => $filtro->diff_rfo,
                        'Vstd' => $filtro->Vstd,
                        'Wi' => $filtro->Wi,
                        'Wf' => $filtro->Wf,
                        'Wn' => $filtro->Wn,
                        'variable' => $filtro->variable,
                    );
                }

            }else{
                $response = 'no hay filtros validos';
            }

        }else {
            $response = 'no existe';
        }
    }

    public function getMuestraFiltro($idFiltro)
    {
        return $this->db->get_where('muestra', array(
            'idFiltro' => $idFiltro
        ));
    }



}