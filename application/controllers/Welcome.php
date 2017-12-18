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
        $this->load->helper('form');
        $this->load->view('layout/header');
        $this->load->view('login');
        $this->load->view('layout/footer');

    }

    public function __construct()
    {
        parent::__construct();
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

                    $lotes =array(
                        'lotes' => $this->LoteFiltro_model->getLoteUsuario($existe[0]->idusuarios)
                    );

                    $this->load->view('layout/header');
                    $this->load->view('menu_laboratorio', $lotes);

                }
                elseif ($rol == 'analista'){
                    $this->load->view('layout/header');
                    $this->load->view('analista_de_datos/index');
                    $this->load->view('layout/footer');
                }elseif($rol == 'coordinador') {
                    $this->irInicio();
                }
            }else{
                // los roles no coinciden
                echo '<h3>Los roles no coinciden</h3>';
            }

        }else {
            // el usuario no existe
            echo 'el usuario no existe';
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

}
