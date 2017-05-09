<?php
    // Controlador que decide si se ve el panel de control del usuario o la pantalla de login si existe una sesión creada
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    //session_start();
    class Cuenta extends CI_Controller {
        function __construct(){
            parent::__construct();
            $this->load->library(array('form_validation','encrypt'));
            $this->load->library('form_validation');
        	$this->load->helper(array('url','form'));
            $this->load->model('UsuarioModel');
        }

        function index(){
            if($this->session->userdata('logged_in')){
                // Si hay una sesión creada se redirigirá al panel de control. Dependiendo del tipo de usuario será de Administrador o normal
                $arraySesion = $this->session->userdata('logged_in');
                switch($arraySesion['Rango']){
                    case 'Admin':{
                        // Cargamos datos para el panel del Administrador
                        $admin = $this->UsuarioModel->datosAdministrador();
                        $datos = array(
                            "titulo" => "Panel del administrador"
                        );
                        $this->load->view('header', $datos);
                        $this->load->view('administracion/administrador/index', $admin);
                        $this->load->view('footer');
                    };break;
                    case 'User':{
                        $datos = array(
                            "titulo" => "Panel del usuario"
                        );
                        $usuario = $this->UsuarioModel->datosUsuarioAdministracion();
                        $this->load->view('header', $datos);
                        $this->load->view('administracion/usuario/index', $usuario);
                        $this->load->view('footer');
                    };break;
                    default:{
                        $this->session->unset_userdata('logged_in');
                        session_destroy();
                        $datos = array(
                            "titulo" => "Politi.co | Inicio"
                        );
                        $this->load->view('header', $datos);
                        $this->load->view('inicio');
                        $this->load->view('comunidades_');
                        $this->load->view('footer');
                    };break;
                }

            }
            else{
                // Si no hay una sesión creada, se redirige al login
                $datos = array(
                    "titulo" => "Politi.co | Login"
                );
                $this->load->view('header', $datos);
                $this->load->view('login/login');
                $this->load->view('footer');
            }
        }


        // Función que destruye la sesión
        function salir(){
            $this->session->unset_userdata('logged_in');
            session_destroy();
            $datos = array(
                "titulo" => "Politi.co | Inicio"
            );
            $this->load->view('header', $datos);
            $this->load->view('inicio');
            $this->load->view('comunidades_');
            $this->load->view('footer');
        }
    }
?>
