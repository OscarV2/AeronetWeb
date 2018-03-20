<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
        $this->load->view('index');
    }

    public function irLogin()
    {
        $this->load->helper('form');
        $this->load->view('login');
        $this->load->view('layout/footer');

    }

    public function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

    public function login(){
        $this->load->helper(array('form', 'url'));

        $rol = $this->input->post('rol');
        $usuario = $this->input->post('usuario');
        $password = $this->input->post('password');

        // verificar usuario y contraseña
        $this->load->model('Usuario_model');
        $existe = $this->Usuario_model->existeUsuario($usuario, $password);

        if (sizeof($existe) > 0){

            $rolUsuario = $existe[0]->rol;
            if ($rolUsuario == $rol){

                if ($rol == 'laboratorista'){

                    $this->load->model('LoteFiltro_model');

                    $lotes = $this->LoteFiltro_model->getLoteUsuario($existe[0]->idusuarios);

                    $data = array(
                        'lotes' => $lotes,
                        'filtrosTestigos' => $this->LoteFiltro_model->getFiltros(),
                        'totales' => $this->LoteFiltro_model->getTotales(),
                        'idusuario' => $existe[0]->idusuarios
                    );

                    //$this->session->set_userdata('idusuario', $existe[0]->idusuarios);
                    //$this->session->set_userdata($data);
                    $this->guardarDatosSesion('laboratorista', $data);
                    $this->load->view('menu_laboratorio', $data);

                }
                elseif ($rol == 'analista'){

                    $data = array(
                        'usuarioNombre' => $existe[0]->nombre,
                        'usuarioApe' => $existe[0]->apellidos,
                        'analista' => $existe[0]->nombre . ' ' .  $existe[0]->apellidos
                    );

                    $this->guardarDatosSesion('analista', $data);

                    $this->load->view('layout/header');
                    $this->load->view('analista_de_datos/index');
                    $this->load->view('layout/footer');
                }elseif($rol == 'coordinador') {

                    $data = array(
                        'usuarioNombre' => $existe[0]->nombre,
                        'usuarioApe' => $existe[0]->apellidos
                    );
                    $this->guardarDatosSesion('coordinador', $data);

                    $this->irInicio();
                }
            }else{
                // los roles no coinciden
                $this->setError('Seleccione su tipo de operador correspondiente');
            }

        }else {
            // el usuario no existe
            $this->setError('Usuario o contraseña incorrectos.');
        }

    }

    public function irInicio()
    {
        $this->load->model('Proyecto_model');
        $proyectos = array(
            'proyectos' => $this->Proyecto_model->obtenerTodosProyectos()
        );

        $this->load->view('layout/header');
        $this->load->view('coordinador/vista_coordinador', $proyectos);
        $this->load->view('layout/footer');
    }

    public function guardarDatosSesion($rol, $data)
    {
        $this->load->library('session');

        if ($rol == 'laboratorista'){
            $this->session->set_userdata($data);
        }elseif ($rol == 'analista'){
            $this->session->set_userdata($data);
        }
        elseif ($rol == 'coordinador'){
            $this->session->set_userdata($data);
        }
    }

    public function cerrarSesion()
    {
        $this->load->library('session');
        session_destroy();
        $this->irLogin();
    }

    public function setError($err)
    {
        $data = array('err' => $err);
        $this->load->helper(array('form', 'url'));
        $this->load->view('login', $data);
        $this->load->view('layout/footer');

    }
}
