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
        $this->db->where('mes', $mes);
        $this->db->where('year', $year);
        $this->db->from('lotefiltros');
        $cantLotes = $this->db->count_all_results();

        return $cantLotes;
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

    //get filtros validos
    public function getFiltrosSinValidar()
    {
        $data = array();
        $muestras = array();

        $this->db->select('idFiltros, identificador, fecha_muestreo, observaciones');
        $this->db->where('valido', 0);

      

        $filtros = $this->db->get('filtros');
        
        if (sizeof($filtros->result()) > 0){

            foreach ($filtros->result() as $filtro){
    
                     $muestra = $this->db->get_where('muestra', array(
                        'idFiltro' => $filtro->idFiltros
                    ))->result()[0];
    
                     $row = array(
                         'idFiltros' => $filtro->idFiltros,
                         'identificador' => $filtro->identificador,
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
    
                     $data[] = $row;
                }
            }
      

        

        return $data;
        /*
        return $this->db->get_where('filtros',
            array(
                'valido' => 0
            ));
        */
    }

    public function updateMuestrasValidar($data)
    {

        $validos = array('valido' => 1);

        if (sizeof($validos)){
            foreach ($data as $idFiltro){
                $this->db->where('idFiltros', $idFiltro);
                $this->db->update('filtros', $validos);
            }
        }


    }

    public function updateMuestrasInValidar($data)
    {
        $validos = array('valido' => 2);
        if (sizeof($data) > 0) {
            foreach ($data as $idFiltro){
                $this->db->where('idFiltros', $idFiltro);
                $this->db->update('filtros', $validos);
            }
        }


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

        }else {
            $response = 'no existe';
        }

        return $response;
    }

    public function getMuestraFiltro($idFiltro)
    {
        return $this->db->get_where('muestra', array(
            'idFiltro' => $idFiltro
        ));
    }

    public function getLoteId($mes, $year)
    {
        $this->db->select('id');
        $this->db->where('mes', $mes);
        $this->db->where('year', $year);
        $this->db->limit(1);

        return $this->db->get('lotefiltros');

    }

    public function filtrosPertenecenAEquipo($idEquipo, $idLote)
    {
        $this->db->where('idequipo', $idEquipo);
        $this->db->where('lotefiltros_id', $idLote);
        $this->db->from('filtros');
        $cantFiltros = $this->db->count_all_results();

        return $cantFiltros;
    }

    public function getFechasMuestreo($mes, $year)
    {
        //getIdLoteFiltro
        $this->db->select('id');
        $this->db->where('mes',$mes);
        $this->db->where('year',$year);

        $data = 'Error';
        $result = $this->db->get('lotefiltros')->row();
        if (isset($result)){
            $idLote = $result->id;

            $this->db->select('fecha_muestreo');
            $this->db->where('lotefiltros_id',$idLote);
            $this->db->where('fecha_muestreo is NOT NULL');
            $fechas = $this->db->get('filtros');

            if (sizeof($fechas) > 0){
                $data = array();
                foreach ($fechas->result() as $fecha){
                    $data[] = $fecha->fecha_muestreo;
                }
            }
        }

        return $data;

    }

}