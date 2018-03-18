<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 4/03/2018
 * Time: 10:06 PM
 */

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reportes extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Reporte_model');
        $this->load->library('session');
    }

    public function generarReporte()
    {
        $svgData = base64_decode($this->input->post('imagen'));

        file_put_contents('assets/imgReporte/reporte.png', $svgData);

        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Oscar Vega')
            ->setLastModifiedBy('Oscar Vega')
            ->setTitle('Reporte Qualis.')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Reporte de filtros tomados del sistema Qualis.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Report result file');

        $data = $this->getDatosSession();

        $idLote   = $data['idLote'];
        $idEquipo = $data['idEquipo'];

        $muestras = $this->Reporte_model->getMuestras($idEquipo, $idLote);

        $this->escribirExcel($spreadsheet, $muestras, $data);

        echo 'success';
    }

    private function escribirExcel($spreadsheet,  $muestras, $data)
    {
        //Titulo
        $titulo1 = 'SISTEMA DE VIGILANCIA DE CALIDAD DEL AIRE -SEVCA_CV CORPOCESAR';
        $titulo2 = 'INFORME DE RESULTADOS ';

        //formatear primeras filas
        $spreadsheet->getActiveSheet()->mergeCells('A1:W1');
        $spreadsheet->getActiveSheet()->mergeCells('A2:W2');

        //combinar celdas
        $spreadsheet->getActiveSheet()->mergeCells('E3:I3');
        $spreadsheet->getActiveSheet()->mergeCells('E4:I4');
        $spreadsheet->getActiveSheet()->mergeCells('E5:I5');
        $spreadsheet->getActiveSheet()->mergeCells('E6:I6');

        $spreadsheet->getActiveSheet()->mergeCells('J3:M3');
        $spreadsheet->getActiveSheet()->mergeCells('J4:M4');
        $spreadsheet->getActiveSheet()->mergeCells('K5:M5');
        $spreadsheet->getActiveSheet()->mergeCells('J6:M6');

        $spreadsheet->getActiveSheet()->mergeCells('P3:R3');
        $spreadsheet->getActiveSheet()->mergeCells('N4:S4');


        $spreadsheet->getActiveSheet()->mergeCells('R5:S5');
        $spreadsheet->getActiveSheet()->mergeCells('R6:S6');
        $spreadsheet->getActiveSheet()->mergeCells('A7:V7');

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', $titulo1)
            ->setCellValue('A2', $titulo2)
        ;
        //Tabla cabecera
        $this->escribirCabecera($spreadsheet, $data);

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('B8', 'Muestra No.')
            ->setCellValue('C8', 'Filtro No.')
            ->setCellValue('D8', 'Fecha de muestreo')
            ->setCellValue('E8', 'Pf inicial (inHOH)')
            ->setCellValue('F8', 'Pf final (inHOH)')
            ->setCellValue('G8', 'Pf Avg   (mm Hg)')
            ->setCellValue('H8', 'Pa (mm Hg)')
            ->setCellValue('I8', 'Ta (°C)')
            ->setCellValue('J8', 'Ta (°K)')
            ->setCellValue('K8', 'Po/Pa')
            ->setCellValue('L8', 'Qr (m3/min)')
            ->setCellValue('M8', 'Qstd     (m3/min)')
            ->setCellValue('N8', 'L Inicial Horometro')
            ->setCellValue('O8', 'L Final Horometro')
            ->setCellValue('P8', '%DIF RFO')
            ->setCellValue('Q8', 'T (min)')
            ->setCellValue('R8', 'Vstd (m3)')
            ->setCellValue('S8', 'Wi (g)')
            ->setCellValue('T8', 'Wf (g)')
            ->setCellValue('U8', 'Wn(g)')
            ->setCellValue('V8', 'PM10 (μg/m3)')
        ;
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(18);

        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('R')->setWidth(18);

        $spreadsheet->getActiveSheet()->getColumnDimension('V')->setWidth(18);

        $this->llenarDatosMuestras($spreadsheet, $muestras, $data);

        $this->guardar($spreadsheet);
    }

    public function getDatosSession()
    {
        $idEquipo = $_SESSION['idEquipo'];

        $data = array();
        $data['idLote'] = $_SESSION['idLote'];
        $data['idEquipo'] = $idEquipo;
        $data['idEstacion'] = $_SESSION['idEstacion'];
        $data['msnm'] = $_SESSION['msnm'];
        $data['municipio'] = $_SESSION['municipio'];
        $data['numero'] = $_SESSION['numero'];
        $data['localizacion'] = $_SESSION['localizacion'];
        $data['metodo'] = $_SESSION['metodo'];
        $data['analista'] = $_SESSION['analista'];
        $data['nombre'] = $_SESSION['nombre'];
        $data['mes'] = $_SESSION['mes'];
        $data['year'] = $_SESSION['year'];
        $data['clase'] = $_SESSION['clase'];

        $data['numDatos'] = $_SESSION['numDatos'];
        $data['fechaMin'] =  $_SESSION['fechaMin'];
        $data['fechaMax'] =  $_SESSION['fechaMax'];
        $data['promedio'] = $_SESSION['promedio'];
        $data['mediana'] = $_SESSION['mediana'];
        $data['desviacion'] = $_SESSION['desviacion'];
        $data['u1'] = $_SESSION['u1'];
        $data['u2'] = $_SESSION['u2'];
        $data['percentil25'] = $_SESSION['percentil25'];
        $data['percentil75'] = $_SESSION['percentil75'];
        $data['min'] = $_SESSION['min'];
        $data['max'] = $_SESSION['max'];

        return $data;
    }

    private function escribirCabecera($spreadsheet, $data)
    {
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('D3', 'ESTACIÓN No.')
            ->setCellValue('D4', 'ESTACIÓN :')
            ->setCellValue('D5', 'MUNICIPIO:')
            ->setCellValue('D6', 'COORDENADAS:')
            ->setCellValue('E3', $data['numero'])
            ->setCellValue('E4', $data['nombre'])
            ->setCellValue('E5', $data['municipio'])
            ->setCellValue('E6', 'NORTE:')
            ->setCellValue('J3', 'PARAMETRO:')
            ->setCellValue('J4', 'NOMBRE DEL OPERADOR:')
            ->setCellValue('J5', 'MES')
            ->setCellValue('J6', 'OESTE:')
            ->setCellValue('N3', 'PM10')
            ->setCellValue('N4', $data['analista'])
            ->setCellValue('N5', 'AÑO')
            ->setCellValue('N6', '(MSNM)')
            ->setCellValue('O3', 'METODO:')
            ->setCellValue('P3', $data['metodo'])
            ->setCellValue('K5', $data['mes'])
            ->setCellValue('O5', $data['year'])
            ->setCellValue('O6', $data['msnm'])
            ->setCellValue('R5', 'CALIBRACION:')
            ->setCellValue('T3', $data['clase'])
            ->setCellValue('T4', 'ID EQUIPO:')
            ->setCellValue('T5', 'm')
            ->setCellValue('T6', 'b');
    }

    private function guardar($spreadsheet)
    {
        $writer = new Xlsx($spreadsheet);
        $file = APPPATH . 'reportes/reporte.xlsx';

        try {
            $writer->save($file);
        } catch (\PhpOffice\PhpSpreadsheet\Writer\Exception $e) {
            echo $e;
        }


    }

    public function descargar()
    {
        $file = APPPATH . 'reportes/reporte.xlsx';

        $this->load->helper('download');
        $data = file_get_contents($file);
        force_download(basename($file), $data);
    }



    private function darEstiloExcel($spreadsheet, $ultimaFila)
    {
        $spreadsheet->getActiveSheet()->getStyle('B8:W8')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A2:B2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('D3:V3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('D4:V4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('D5:V5')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('D6:V6')->getFont()->setBold(true);

        $spreadsheet->getActiveSheet()->getStyle('A1:B1')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A2:B2')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E3:E6')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('N4')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('O5:O6')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('U3:U6')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $styleArray = [
            'borders' => [
                'allborders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHED,
                    'color' => ['argb' => 'FF00FF00'],
                ],
            ],
            'font' => [
                'bold' => true,

            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FFA0A0A0',
                ]
            ]
        ];

        $spreadsheet->getActiveSheet()->getStyle('B8:V8')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('B8:V8')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


        for ($i = 9; $i <= $ultimaFila; $i++){

            $spreadsheet->getActiveSheet()->getStyle('B' . $i . ':V' . $i)
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        }

        //guardo ultima fila en otra variable para que no se altere la primera
        $i = $ultimaFila;

        $this->estiloResumen($spreadsheet, $ultimaFila);

        $this->pasteImage($spreadsheet, $ultimaFila);



    }

    private function llenarDatosMuestras($spreadsheet ,$muestras, $data)
    {
        $filaCelda = 9;
        $muestraNumero = 1;
        foreach ($muestras as $muestra){
            $spreadsheet->getActiveSheet()->setCellValue('B' . $filaCelda, $muestraNumero);

            $spreadsheet->getActiveSheet()->setCellValue('C' . $filaCelda, $muestra['filtro']);
            $spreadsheet->getActiveSheet()->setCellValue('D' . $filaCelda, $muestra['fecha_muestreo']);
            $spreadsheet->getActiveSheet()->setCellValue('E' . $filaCelda, $muestra['presion_est_inicial']);
            $spreadsheet->getActiveSheet()->setCellValue('F' . $filaCelda, $muestra['presion_est_final']);
            $spreadsheet->getActiveSheet()->setCellValue('G' . $filaCelda, $muestra['presion_est_avg']);
            $spreadsheet->getActiveSheet()->setCellValue('H' . $filaCelda, $muestra['presion_amb']);
            $spreadsheet->getActiveSheet()->setCellValue('I' . $filaCelda, $muestra['temp_ambC']);
            $spreadsheet->getActiveSheet()->setCellValue('J' . $filaCelda, $muestra['temp_ambK']);
            $spreadsheet->getActiveSheet()->setCellValue('K' . $filaCelda, $muestra['PoPa']);
            $spreadsheet->getActiveSheet()->setCellValue('L' . $filaCelda, $muestra['Qr']);
            $spreadsheet->getActiveSheet()->setCellValue('M' . $filaCelda, $muestra['Qstd']);
            $spreadsheet->getActiveSheet()->setCellValue('N' . $filaCelda, $muestra['tiempo_operacion']);
            $spreadsheet->getActiveSheet()->setCellValue('O' . $filaCelda, $muestra['tiempo_operacion']);
            $spreadsheet->getActiveSheet()->setCellValue('P' . $filaCelda, $muestra['diff_rfo']);
            $spreadsheet->getActiveSheet()->setCellValue('Q' . $filaCelda, $muestra['tiempo_operacion']);
            $spreadsheet->getActiveSheet()->setCellValue('R' . $filaCelda, $muestra['Vstd']);
            $spreadsheet->getActiveSheet()->setCellValue('S' . $filaCelda, $muestra['Wi']);
            $spreadsheet->getActiveSheet()->setCellValue('T' . $filaCelda, $muestra['Wf']);
            $spreadsheet->getActiveSheet()->setCellValue('U' . $filaCelda, $muestra['Wn']);
            $spreadsheet->getActiveSheet()->setCellValue('V' . $filaCelda, $muestra['variable']);

            $filaCelda++;
            $muestraNumero++;
        }
        $this->escribirResumen($spreadsheet, $data ,$filaCelda);
        $this->darEstiloExcel($spreadsheet, $filaCelda);

    }

    private function escribirPieDePagina($spreadsheet, $data)
    {

    }

    private function escribirResumen($spreadsheet, $data, $ultimaFila)
    {
        $ultimaFila+=3;
        $spreadsheet->getActiveSheet()->setCellValue('V' . $ultimaFila, $data['numDatos']);
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('V' . $ultimaFila, $data['promedio']);
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('V' . $ultimaFila, $data['max']);
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('V' . $ultimaFila, $data['fechaMax']);
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('V' . $ultimaFila, $data['min']);
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('V' . $ultimaFila, $data['fechaMin']);
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('V' . $ultimaFila, $data['desviacion']);
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('V' . $ultimaFila, '2,26');
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('V' . $ultimaFila, $data['u1']);
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('V' . $ultimaFila, $data['u2']);
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('V' . $ultimaFila, $data['percentil25']);
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('V' . $ultimaFila, $data['percentil75']);
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('V' . $ultimaFila, $data['mediana']);
    }

    private function estiloResumen($spreadsheet, $ultimaFila){

        $spreadsheet->getActiveSheet()->getStyle('R' . $ultimaFila . ':R' . (string)($ultimaFila + 16))->getFont()->setBold(true);

        $spreadsheet->getActiveSheet()->mergeCells('R' . $ultimaFila . ':U' . (string)($ultimaFila + 1));
        $spreadsheet->getActiveSheet()->mergeCells('R' . (string)($ultimaFila + 2) . ':V' . (string)($ultimaFila +2));

        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'Norma diaria PM10 (µg/m3) Resolución 610 de 2010');
        $spreadsheet->getActiveSheet()->getStyle('R' . $ultimaFila . ':U' . (string)($ultimaFila + 1))
            ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $spreadsheet->getActiveSheet()->getStyle('V' . $ultimaFila . ':V' . (string)($ultimaFila + 16))
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


        $ultimaFila += 2;

        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'RESULTADOS ESTADÍSTICOS');


        $ultimaFila++;
        $spreadsheet->getActiveSheet()->mergeCells('R' . (string)($ultimaFila + 8) . ':T' . (string)($ultimaFila + 9));

        for ($i = $ultimaFila; $i < ($ultimaFila + 13); $i++){
            if (($i == ($ultimaFila + 8)) or ($i == ($ultimaFila + 9))) {
                if ($i == ($ultimaFila + 8)){
                    $spreadsheet->getActiveSheet()->setCellValue('U' . $i, 'x1');

                }else {
                    $spreadsheet->getActiveSheet()->setCellValue('U' . $i, 'x2');
                }
            }else {
                $spreadsheet->getActiveSheet()->mergeCells('R' . $i . ':U' . $i);
            }

        }

        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'Numero de datos (n)');
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'Promedio Aritmético (X)');
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'Valor mas alto registrado (µg/m3)');
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'Día de registro');
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'Valor mas bajo registrado (µg/m3)');
        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'Día de registro');
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'Desviación estándar (S)');
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'Parámetro de Distribución T');
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'Intervalo de confianza para la media (95%)');
        $ultimaFila+=2;
        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'Mediana');
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'Percentil 25');
        $ultimaFila++;
        $spreadsheet->getActiveSheet()->setCellValue('R' . $ultimaFila, 'Percentil 75');

    }

    private function pasteImage($spreadsheet, $ultimaFila)
    {
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $path = FCPATH . 'assets\imgReporte\reporte.png';

        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        try {
            $drawing->setPath($path);
            $drawing->setHeight(416);
            $drawing->setName('Paid');
            $drawing->setDescription('Paid');
            $drawing->setCoordinates('B' . (string)($ultimaFila + 2));
            try {
                $drawing->setWorksheet($spreadsheet->getActiveSheet());
            } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
                echo $e;
            }
        } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
            echo $e;
        }

    }
}