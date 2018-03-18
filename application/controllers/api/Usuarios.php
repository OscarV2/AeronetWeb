<?php
/**
 * Created by PhpStorm.
 * User: CASA
 * Date: 03/11/2017
 * Time: 10:43 AM
 */

class Usuarios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

    public function ping()
    {
      echo 'OK';

    }


    public function login()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $usuario = $data['correo'];
        $password = $data['password'];

        $result = $this->Usuario_model->existeUsuario($usuario, $password);

        $response = "OK";


        if ((sizeof($result) > 0)){
            $rol = $result[0]->rol;
            if ($rol == 'campo'){
                echo json_encode($result[0]);
            }else{
                echo json_encode(NULL);
            }
        }else{
            echo json_encode(NULL);
        }

    }

}