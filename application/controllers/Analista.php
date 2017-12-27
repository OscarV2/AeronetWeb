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
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('analista_de_datos/index');
        $this->load->view('layout/footer');
    }

    public function estaciones()
    {

        $this->load->model('Estacion_model');
        $data = array(
            'estaciones' => $this->Estacion_model->getEstacionesAnalista()
        );

        //var_dump($data);

        $this->load->view('layout/header');
        $this->load->view('analista_de_datos/estaciones', $data);


    }

    public function existeLote()
    {
        $mes = $this->input->post('mes');
        $year = $this->input->post('year');
        $idEquipo = $this->input->post('equipo');

        $lotes = $this->Analisis_model->existeLote($mes, $year);

        if($lotes > 0){
            $this->getMuestras($mes, $year, $idEquipo);
        }else{
            echo 'no existe';
        }
    }

    public function getMuestras($mes, $year, $idEquipo)
    {
        $muestras = $this->Analisis_model->getMuestras($idEquipo, $mes, $year);

        $resultados = array();
        $variables  = array();
        foreach ($muestras as $muestra){
            $variables[] = $muestra['variable'];
        }

        $resultados = $this->getResultados($variables, $muestras);
        $data = array(
            'muestras' => $muestras,
            'resultados' => $resultados
        );

        $this->load->view('layout/header');
        $this->load->view('analista_de_datos/muestras_informe', $data);

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
}