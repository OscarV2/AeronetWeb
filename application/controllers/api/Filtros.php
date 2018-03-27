<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 09:12 AM
 */

class Filtros extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Filtro_model');
        $this->load->model('LoteFiltro_model');

    }

    public function descargarFiltros()
    {
        echo json_encode($this->Filtro_model->getFiltrosAsignados()->result());
    }
/*
    public function guardarFiltros()
    {
        $idLote = $this->input->get('idLote');
        $tipo = $this->input->get('tipo');
        $codigos = $this->input->post('codigoNuevoFiltro[]');
        $pesos = $this->input->post('pesoNuevoFiltro[]');
        $fechas = $this->input->post('fechaNuevoFiltro[]');

        $data = array();
        //llenar array con filtros (array of arrays)
        for ($i = 0; $i < sizeof($codigos); $i++){
            $data[$i] = array(
                'identificador' => $codigos[$i],
                'pesado' => $fechas[0],
                'pesoInicial' => $pesos[$i],
                'tipo' => $tipo,
                'lotefiltros_id' => $idLote
            );
        }

        $this->Filtro_model->guardarNuevosFiltros($data);
    }
*/
    public function instalarFiltro()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $filtro = $data['idFiltros'];
        $fecha = $data['instalado'];
        $idEquipo = $data['idequipo'];
        $this->Filtro_model->instalar($filtro, $fecha, $idEquipo);

    }

    public function recogerFiltro()
    {
        $data = array();
        parse_str(file_get_contents('php://input'), $data);

        $this->Filtro_model->recoger($data);
//echo 'Ok';
    }

}