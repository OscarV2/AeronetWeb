<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 06:53 AM
 */

class Filtro_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getFiltrosPorUsuario($key)
    {
        return $this->db->get_where('filtros',array('usuarios_idusuarios' => $key));
    }

    public function getFiltrosPorLote($key)
    {
        return $this->db->get_where('filtros',array('lotefiltros_id' => $key));
    }

    public function getFiltrosSinAsignar($key)
{
    return $this->db->get_where('filtros',array('lotefiltros_id' => $key, 'idequipo' => NULL));
}

    public function getFiltrosAsignados()
    {
        $this->db->where('instalado', NULL);
        $this->db->where('recogido', NULL);
        $this->db->where('idequipo', NULL, FALSE);

        return $this->db->get('filtros');
        /*
        return $this->db->get_where('filtros',array(
           // 'idequipo'  => !NULL,
            'instalado' => NULL,
            'recogido'  => NULL
        ));
        */
    }

    public function asignarEquipoFiltro($idEquipo, $codigoFiltro)
    {
        $data = array('idequipo' => $idEquipo);
        $this->db->where('identificador', $codigoFiltro);
        $this->db->update('filtros',$data);
    }

    public function instalar($id, $fecha)
    {
        $data = array('instalado' => $fecha);
        $this->db->where('idFiltros', $id);
        $this->db->update('filtros',$data);
    }

    public function recoger($data)
    {

        $id = $data['idfiltro'];
        $fecha = $data['fecha'];
        $idequipo = $data['idequipo'];
        $observaciones = $data['observaciones'];
        $fechaMuestreo = $data['fecha_muestreo'];
        //Muestra
        $muestra = $this->setMuestra($data);

        $data = array(
            'recogido' => $fecha,
            'observaciones' => $observaciones,
            'fecha_muestreo' => $fechaMuestreo
        );

        $this->db->where('idFiltros', $id);
        $this->db->update('filtros',$data);

        $this->db->where('idequipo', $idequipo);
        $this->db->update('equipos', array('ocupado' => 0));

        $this->db->where('idFiltro', $id);
        $this->db->update('muestra', $muestra);

    }

    public function guardarNuevosFiltros($data)
    {
        foreach ($data as $datos){
            $this->db->insert('filtros',$datos);

        }
    }

    public function actualizarFiltros($id ,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('filtros',$data);
    }

    public function getCantFiltrosPM10Pesados($idLote)
    {
        $this->db->where('lotefiltros_id', $idLote);
        $this->db->where('tipo', 'PM10');
        $this->db->where('pesado', NULL);

         return $this->db->count_all_results('filtros');
    }

    public function getCantFiltrosPSTPesados($idLote)
    {
        $this->db->where('lotefiltros_id', $idLote);
        $this->db->where('tipo', 'PST');
        $this->db->where('pesado', NULL);
        return $this->db->count_all_results('filtros');
    }

    public function getCantFiltrosPM25Pesados($idLote)
    {
        $this->db->where('lotefiltros_id', $idLote);
        $this->db->where('tipo', 'PM25');
        $this->db->where('pesado', NULL);
        return $this->db->count_all_results('filtros');
    }

    public function getTotalPesados($idLote)
    {
        $this->db->where('lotefiltros_id', $idLote);
        $this->db->where('pesado', !NULL);
        return $this->db->count_all_results('filtros');
    }

    private function setMuestra($data)
    {
        $muestra = array(
            'presion_amb' => $data['presion_amb'],
            'temp_ambC' => $data['temp_ambC'],
            'temp_ambK' => $data['temp_ambK'],
            'presion_est_inicial' => $data['presion_est_inicial'],
            'presion_est_final' => $data['presion_est_final'],
            'presion_est_avg' => $data['presion_est_avg'],
            'horometro_inicial' => $data['horometro_inicial'],
            'horometro_final' => $data['horometro_final'],
            'PoPa' => $data['PoPa'],
            'Qr' => $data['Qr'],
            'Qstd' => $data['Qstd'],
            'diff_rfo' => $data['diff_rfo'],
            'tiempo_operacion' => $data['tiempo_operacion'],
            'Vstd' => $data['Vstd']
        );

        return $muestra;
    }

    public function updateFiltro($id, $data)
    {
        $this->db->where('idFiltros', $id);
        $this->db->update('filtros',$data);

    }
}