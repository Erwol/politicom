<?php
    // Usado para controlar las operaciones con ls elementos 'Políticos'
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    //session_start();
    class Politicos extends CI_Controller {
        function __construct(){
            parent::__construct();
            $this->load->library(array('form_validation','encrypt'));
            $this->load->library('form_validation');
        	$this->load->helper(array('url','form'));
            // Carga del modelo
            $this->load->model('PoliticoModel');
        }

        // Muestra todos los políticos
        function index(){
            // Carga header
            $datos = array(
                "titulo" => "Politi.co | Listado de políticos"
            );
            $this->load->view('header', $datos);
            $this->load->view('/politico/abre_galeria');
            // Sin estar logueado, se pueden ver todos los políticos
            $arrayPolitico = $this->PoliticoModel->listar();
            foreach ($arrayPolitico as $politico) {
                $this->load->view('/politico/galeria', $politico);
            }
            // Cierra la galería
            $this->load->view('/politico/cierra_galeria');
            // Carga modals
            foreach ($arrayPolitico as $politico) {
                $this->load->view('/politico/galeria_detalle', $politico);
            }
            $this->load->view('footer');
        }

        function votar(){
            // En primer lugar comprobamos si el usuario está o no logueado
            if($this->session->userdata('logged_in')){
                // Comprobamos si este usuario ya ha votado a este político
                $Id_Politico = $this->input->post('id');
                $Puntuacion = $this->input->post('puntuacion');
                $resultado = $this->PoliticoModel->ha_votado($Id_Politico);
                if($resultado['ha_votado'] == false){
                    // Si no ha votado a este político, añadimos su voto
                    // echo "No ha votado ".$this->session->userdata('Id');
                    $this->PoliticoModel->votar($Id_Politico, $Puntuacion);
                    // Una vez haya votado, carga la página de los políticos
                    // Carga header
                    $datos = array(
                        "titulo" => "Politi.co | Listado de políticos"
                    );
                    $this->load->view('header', $datos);
                    $this->load->view('/politico/abre_galeria_votoOK');
                    // Sin estar logueado, se pueden ver todos los políticos
                    $arrayPolitico = $this->PoliticoModel->listar();
                    foreach ($arrayPolitico as $politico) {
                        $this->load->view('/politico/galeria', $politico);
                    }
                    // Cierra la galería
                    $this->load->view('/politico/cierra_galeria');
                    // Carga modals
                    foreach ($arrayPolitico as $politico) {
                        $this->load->view('/politico/galeria_detalle', $politico);
                    }
                    $this->load->view('footer');
                }
                else{
                    // Si ya ha votado a este político, sugerimos que el usuario modifique el voto
                    // Carga header
                    $datos = array(
                        "titulo" => "Politi.co | Listado de políticos"
                    );
                    $this->load->view('header', $datos);
                    $this->load->view('/politico/abre_galeria_votoFAIL', $resultado);
                    // Sin estar logueado, se pueden ver todos los políticos
                    $arrayPolitico = $this->PoliticoModel->listar();
                    foreach ($arrayPolitico as $politico) {
                        $this->load->view('/politico/galeria', $politico);
                    }
                    // Cierra la galería
                    $this->load->view('/politico/cierra_galeria');
                    // Carga modals
                    foreach ($arrayPolitico as $politico) {
                        $this->load->view('/politico/galeria_detalle', $politico);
                    }
                    $this->load->view('footer');
                }
            }
            else{
                // Cargamos la vista de login
                $datos = array(
                    "titulo" => "Politi.co | Login"
                );
                $this->load->view('header', $datos);
                $this->load->view('login/login_votar');
                $this->load->view('footer');
            }
            // $this->PoliticoModel->votar($this->input->)
            // echo $this->input->post('puntuacion');

            // LLama a votar en el modelo
        }

        // Función que carga los 10 políticos más valorados
        function ranking(){
            // Carga header
            $datos = array(
                "titulo" => "Politi.co | Listado de políticos"
            );
            $this->load->view('header', $datos);
            $this->load->view('/politico/abre_galeria_ranking');
            // Sin estar logueado, se pueden ver todos los políticos
            $arrayPolitico = $this->PoliticoModel->listarOrdenados();
            $i = 1;
            foreach ($arrayPolitico as $politico) {
                $data = array(
                    "Posicion" => $i,
                    "Nota" => round($politico->Nota, 2)
                );
                $this->load->view('/politico/galeria_posicion', $data);
                $this->load->view('/politico/galeria_ranking', $politico);
                $i ++;
            }
            // Cierra la galería
            $this->load->view('/politico/cierra_galeria');
            // Carga modals
            foreach ($arrayPolitico as $politico) {
                $this->load->view('/politico/galeria_detalle', $politico);
            }
            $this->load->view('footer');
        }
    }
?>
