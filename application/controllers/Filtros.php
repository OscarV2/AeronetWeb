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
        $this->load->library('session');

        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');

    }

    public function irPesarFiltros()
    {
        $data = array(
            'idLote' => $this->input->get('idLote'),
            'tipo' => $this->input->get('tipo'),
            'consecutivo' => $this->input->get('consecutivo') +1,
            'max' =>$this->input->get('max'),
            'fpp' =>$this->input->get('filtrosporpesar')
        );

        $this->load->view('vista_pesar_filtros', $data);
        $this->load->view('layout/footer');
    }

    public function nuevoLote(){
        $periodo =  $this->input->post('mes') ."-" .$this->input->post('year');
        $data = array(
            'idusuario' => $this->input->post('lab'),
            'cant_pst' => $this->input->post('cant_pst'),
            'cant_pm10' => $this->input->post('cant_pm10'),
            'cant_pm25' => $this->input->post('cant_pm25'),
            'mes' => $this->input->post('mes'),
            'idProyecto' => $this->input->get('idProyecto'),
            'year' => $this->input->post('year'),
            'nombre' => $periodo
        );

      $this->LoteFiltro_model->nuevo($data);
      echo 'success';
    }

    //Vista del lote de filtros en Laboratorio.
    public function irLoteFiltros()
    {
        $idLote = $this->input->post('id');
        if ($idLote == NULL){
            $idLote = $this->input->get('id');

        }

        // get lote
        $lote = $this->LoteFiltro_model->getLote($idLote)->result()[0];

        //Total filtros pesados
        $filtrosPesados = $lote->pesadospm10 + $lote->pesadospst + $lote->pesadospm25;
        //Filtros por pesar PM10
        $FppPM10 = $lote->cant_pm10 - $lote->pesadospm10;
        //Filtros por pesar PST
        $FppPST = $lote->cant_pst - $lote->pesadospst;
        //Filtros por pesar PM2.5
        $FppPM25 = $lote->cant_pm25 - $lote->pesadospm25;

        //Consecutivos
        $consePST  = $lote->cant_pst  - $FppPST;
        $consePM10 = $lote->cant_pm10 - $FppPM10;
        $consePM25 = $lote->cant_pm25 - $FppPM25;

        $filtrosTodos = $this->Filtro_model->getFiltrosPorLote($idLote);

        $pesosFinales = array();

        foreach ($filtrosTodos->result() as $filtro){
            $pesosFinales[] = $filtro->pesoFinal;
        }

        $filtrosPorPesarUltimaVez = in_array(0, $pesosFinales);


        $filtros = array(

        'filtrosPesados' => $filtrosPesados,
        //Filtros por pesar PM10
            'FppPM10' => $FppPM10,
        //Filtros por pesar PST
            'FppPST' => $FppPST,
        //Filtros por pesar PM2.5
            'FppPM25' => $FppPM25,

        //Consecutivos
            'consePST' => $consePST ,
            'consePM10' => $consePM10 ,
            'consePM25' => $consePM25,
            'filtrosTodos' => $filtrosTodos,
            'maxPST' => $lote->cant_pst,
            'maxPM10' => $lote->cant_pm10,
            'maxPM25' => $lote->cant_pm25,
            'idLote' => $idLote,
            'filtrosPorPesarUltimaVez' => $filtrosPorPesarUltimaVez

        );

        $this->load->view('vista_laboratorio', $filtros);
    }

    public function pesarFiltroFinal()
    {
        $idFiltro = $this->input->post('id');
        $peso = $this->input->post('pesoFinal');
        $fecha = $this->input->post('fecha');

        $data = array('pesoFinal' => $peso, 'pesadoFinal' =>$fecha);
        try{
            $this->Filtro_model->updateFiltro($idFiltro, $data);
            $response = "success";
        }catch (Error $e){
            $response = "Error";
    }
        echo $response;
    }

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
        echo 'success';
    }
}