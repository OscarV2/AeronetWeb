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
        //$this->load->view('welcome_message');
        $this->load->view('login');
        $this->load->view('layout/footer');

    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proyecto_model');
    }

    public function login(){
        $this->load->helper(array('form', 'url'));

        $rol = $this->input->post('rol');

        if ($rol == 'laboratorista'){

            $this->load->model('LoteFiltro_model');
            $lotes =array(
                'lotes' => $this->LoteFiltro_model->getLoteUsuario(7)
            );
            $this->load->view('layout/header');
            $this->load->view('menu_laboratorio', $lotes);
        }elseif ($rol == 'analista'){

        }else {
           $this->irInicio();
            }
    }

    public function irInicio()
    {
        $proyectos = array(
            'proyectos' => $this->Proyecto_model->obtenerTodosProyectos()
        );

        $this->load->view('layout/header');
        $this->load->view('coordinador/vista_coordinador', $proyectos);
        $this->load->view('layout/footer');
    }

}
