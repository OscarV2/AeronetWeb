<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 31/10/2017
 * Time: 09:12 AM
 */

class Equipos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Equipo_model');
        $this->load->model('Filtro_model');
        $this->load->library('session');

    }

    public function irAsignarFiltros()
    {

        $id = $this->input->get('id');
        //echo '<h1>'.$id.'</h1>';

        $idLote = $this->input->post('idLote');
        $data = array(
           'equipos' => $this->Equipo_model->getEquiposDesocupados($id),
           'filtros' => ($this->Filtro_model->getFiltrosSinAsignar($idLote))->result()
        );

        //echo var_dump($data['filtros']);

        $this->load->view('layout/header');
        $this->load->view('coordinador/asignar_filtros', $data);

    }

    public function verFiltrosAsignados()
    {
        $idProyecto = $this->input->get('id');
        $equipos = $this->Equipo_model->getEquiposFiltrosAsignados($idProyecto);

        $data = array(
          'equipos' => $equipos
        );

        $this->load->view('layout/header');
        $this->load->view('coordinador/verEquipoConFiltroAsig', $data);
        $this->load->view('layout/footer');
    }

    public function verEquiposPM10()
    {
        $tipo = $this->input->get('tipo');

        $data = array(
            'equipos' => $this->Equipo_model->getEquiposPorTipo($tipo),
            'tipo' => $tipo
        );

        $this->load->view('layout/header');
        $this->load->view('coordinador/equipos', $data);
        $this->load->view('layout/footer');

    }



    public function crearEquipo()
    {
        //guardar foto

        $path = './uploads';

        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '2000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1024';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('foto'))
        {

            $error = $this->upload->display_errors();
            $response = "Error no se subio";
            //echo "<script>alert('Hubo un error subiendo el archivo. Por favor intente con otro tipo de archivo.');</script>";

            echo $error;
        }
        else
        {
            $datafoto = array($this->upload->data());
            $foto = $datafoto[0]['file_name'];
            $serial = $this->input->post('serial');

            $data = array(

                'modelo' => $this->input->post('modelo'),
                'marca' => $this->input->post('marca'),
                'variable' => $this->input->post('variable'),
                'clase' => $this->input->post('tipo'),
                'descripcion' => $this->input->post('descripcion'),
                'serial' => $serial,
                'metodo' => $this->input->post('metodo'),
                'propietario' => $this->input->post('propietario'),
                'estacion_idestacion' => $this->input->post('estacion'),
                'foto' => $foto

            );

            $dataCalibracion = array(
                'm_pendiente' => $this->input->post('m'),
                'b_intercepto' => $this->input->post('b'),
                'r' => $this->input->post('r'),
                'fecha' => $this->input->post('fechaCal')
            );

            try{
                $this->Equipo_model->nuevoEquipo($data);

                sleep(0.1);

                $idEquipo = $this->Equipo_model->getIdEquipoBySerial($serial);

                $this->nuevaCalibracion($dataCalibracion, $idEquipo);

                $this->equipoCreatedSuccessfully(1);
            }catch (Error $error){
                echo 'error';

            }

        }
/*

  */
    }

    private function equipoCreatedSuccessfully($err)
    {
        $this->load->model('Estacion_model');

        $estaciones = $this->Estacion_model->getEstaciones();
        $data = array('estaciones' => $estaciones, 'err' => $err);
        $this->load->view('layout/header');
        $this->load->view('coordinador/nuevo_equipo', $data);
    }

    private function nuevaCalibracion($dataCalibracion, $idEquipo)
    {
        $a = false;
        $dataCalibracion['equipos_idequipo'] = $idEquipo;
        $this->load->model('Calibracion_model');

        $this->Calibracion_model->guardarCalibracion($dataCalibracion);


    }

}