<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 15/12/2017
 * Time: 11:49 AM
 */

class Analista extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Analisis_model');
        $this->load->model('Estacion_model');
        $this->load->library('session');

    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('analista_de_datos/index');
        $this->load->view('layout/footer');
    }

    public function estaciones()
    {
        $data = array(
            'estaciones' => $this->Estacion_model->getEstacionesAnalista()
        );

        $this->load->view('layout/header');
        $this->load->view('analista_de_datos/estaciones', $data);

    }

    public function existeLote()
    {
        //$this->guardarPrecipitaciones();

        $mes = $this->input->post('mes');
        $year = $this->input->post('year');
        $idEquipo = $this->input->post('equipo');
        $idEstacion = $this->input->post('idEstacion');

        if (isset($idEquipo)){
            $lotes = $this->Analisis_model->existeLote($mes, $year);

            if($lotes > 0){         // el lote existe
                $idLote = $this->Analisis_model->getLoteId($mes, $year)->result()[0]->id;

                //Check if filters of this batch belong to this station
                if ($this->Analisis_model->filtrosPertenecenAEquipo($idEquipo, $idLote) > 0){

                    $this->getMuestras($idLote, $mes, $year, $idEquipo, $idEstacion);
                }else{
                    $this->setError('EL EQUIPO SELECCIONADO NO CORRESPONDE AL LOTE.');
                }
            }else{
                $this->setError('ESTE LOTE NO EXISTE.');
            }
        }else{
            $this->setError('POR FAVOR SELECCIONAR UN EQUIPO.');
        }

    }

    public function getMuestras($idLote, $mes, $year, $idEquipo, $idEstacion)
    {
        $muestras = $this->Analisis_model->getMuestras($idEquipo, $mes, $year);

        if (sizeof($muestras) > 0){
            $variables  = array();
            foreach ($muestras as $muestra){
                $variables[] = $muestra['variable'];
            }

            $resultados = $this->getResultados($variables, $muestras);
            $data = array(
                'muestras' => $muestras,
                'resultados' => $resultados
            );

            $this->guardarDatosSesion($idLote, $idEquipo, $idEstacion, $mes, $year);
            $this->load->view('layout/header');
            $this->load->view('analista_de_datos/muestras_informe', $data);

        }else{
            $this->setError('ESTE LOTE NO EXISTE.');
        }

    }

    private function getResultados($variables, $muestras)
    {
        $resultado['numDatos'] = sizeof($variables);

        $resultado['min'] = min($variables);
        $resultado['max'] = max($variables);

        $keyMin = array_search(min($variables), $variables);
        $keyMax = array_search(max($variables), $variables);

        $resultado['fechaMin'] = $muestras[$keyMin]['fecha_muestreo'];
        $resultado['fechaMax'] = $muestras[$keyMax]['fecha_muestreo'];

        $resultado['promedio'] = array_sum($variables)/(sizeof($variables));
        $resultado['mediana']  = $this->calculate_median($variables);
        $resultado['desviacion']  = $this->desviacionEstandar($variables, $resultado['promedio']);

        $resultado['u1'] = $this->intervaloConfianza($resultado['promedio'], $resultado['desviacion'],
            count($variables))[0];

        $resultado['u2'] = $this->intervaloConfianza($resultado['promedio'], $resultado['desviacion'],
            count($variables))[1];

        $resultado['percentil25'] = $this->percentil25(count($variables), $variables);

        $resultado['percentil75'] = $this->percentil75(count($variables), $variables);

        $data = array(
            'numDatos' => $resultado['numDatos'],
            'fechaMin' =>  $resultado['fechaMin'],
            'fechaMax' =>  $resultado['fechaMax'],
            'promedio' => $resultado['promedio'] ,
            'mediana' => $resultado['mediana'],
            'desviacion' => $resultado['desviacion'],
            'u1' => $resultado['u1'],
            'u2' => $resultado['u2'],
            'percentil25' => $resultado['percentil25'],
            'percentil75' => $resultado['percentil75'],
            'min' => $resultado['min'],
            'max' => $resultado['max']
        );

        $this->session->set_userdata($data);

        return $resultado;

    }

    public function intervaloConfianza($media, $sd, $n)
    {
        $ZalphaMedios = 1.95;

        $u1 = $media + ($ZalphaMedios *($sd/sqrt($n)));
        $u2 = $media - ($ZalphaMedios *($sd/sqrt($n)));

        return array(
          $u1, $u2
        );

    }

    private function percentil25($n ,$vars)
    {
        sort($vars);
        $p = intval(floor(25*$n/100));


        return ($vars[$p] + $vars[$p+1] )/2;
    }

    function calculate_median($arr) {
        sort($arr);
        $count = count($arr); //total numbers in array
        $middleval = intval(floor(($count-1)/2)); // find the middle value, or the lowest middle value
        if($count % 2) { // odd number, middle is the median
            $median = $arr[$middleval];
        } else { // even number, calculate avg of 2 medians
            $low = $arr[$middleval];
            $high = $arr[$middleval+1];
            $median = (($low+$high)/2);
        }
        return $median;
    }

    function desviacionEstandar($array, $mean) {

        foreach($array as $num) $devs[] = pow($num - $mean, 2);
        return sqrt(array_sum($devs) / count($devs));
    }

    private function percentil75($n ,$vars)
    {
        sort($vars);
        $p = intval(floor(75*$n/100));

        return ($vars[$p] + $vars[$p-1] )/2;
    }

    public function inicio()
    {

        $this->load->view('layout/header');
        $this->load->view('analista_de_datos/index');
    }

    public function validar()
    {
        //buscar muestras sin validar

        $data = array(
            'muestras' => $this->Analisis_model->getFiltrosSinValidar(),
        );

        $this->load->view('layout/header');
        $this->load->view('analista_de_datos/validar_muestras', $data);
    }

    public function validarMuestras()
    {
        $validas = $this->input->post('validas');
        $invalidas = $this->input->post('invalidas');

        if (!(sizeof($validas) > 0 and sizeof($invalidas) > 0)){
            echo 'sin datos';
        }else{
            $this->Analisis_model->updateMuestrasValidar($validas);
            $this->Analisis_model->updateMuestrasInValidar($invalidas);

            echo 'success';

        }

    }

    public function lotePerteneceAEquipo($idequipo, $idLote)
    {
        return $idLote == $idequipo;
    }

    public function setError($err)
    {
        $this->load->model('Estacion_model');
        $data = array(
            'estaciones' => $this->Estacion_model->getEstacionesAnalista(),
            'err' => $err
        );

        $this->load->view('layout/header');
        $this->load->view('analista_de_datos/estaciones', $data);

    }

    private function guardarDatosSesion($idLote, $idEquipo, $idEstacion, $mes, $year)
    {

        $estacion = $this->Estacion_model->getDatosEstacionReporte($idEstacion);
        $equipo = $this->Estacion_model->getDatosEquipoReporte($idEquipo);

        $data = array(
            'idLote' => $idLote,
            'idEquipo' => $idEquipo,
            'idEstacion' => $idEstacion,
            'msnm' => $estacion[0]->msnm,
            'municipio' => $estacion[0]->municipio,
            'numero' => $estacion[0]->numero,
            'nombre' => $estacion[0]->nombre,
            'localizacion' => $estacion[0]->localizacion,
            'metodo' => $equipo[0]->metodo,
            'mes' => $mes,
            'year' => $year,
            'clase' => $equipo[0]->clase
        );

        $this->session->set_userdata($data);

    }

    private function guardarPrecipitaciones(){

        $path = FCPATH . 'application/meteorologia';

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'txt';
        $config['max_size']     = '250';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('precipitaciones'))
        {

            $error = $this->upload->display_errors();
            echo $error;

        }
        else
        {
            // se guardo correctamente el archivo
            // se procede a leer para comprobar
            // que corresponde con mes y año
            $documento = $this->upload->data();
            $nombre = $documento['file_name'];

            $this->leerDocumento($nombre);
            echo $nombre;
        }
    }

    private function leerDocumento($nombre){

        
        $this->session->set_userdata('precipitaciones', $nombre);

    }
}