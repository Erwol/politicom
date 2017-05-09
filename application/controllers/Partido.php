<?php
    // Usado para controlar las operaciones con ls elementos 'Políticos'
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    //session_start();
    class Partido extends CI_Controller {
        function __construct(){
            parent::__construct();
            $this->load->library(array('form_validation','encrypt'));
            $this->load->library('form_validation');
        	$this->load->helper(array('url','form'));
            // Carga del modelo
            $this->load->model('PartidoModel');
        }

        // Muestra todos los políticos
        function index(){
            // Carga header
            $datos = array(
                "titulo" => "Politi.co | Partidos"
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


        // Busca un partido en función de sus siglas
        function buscar($Siglas){

        }
    }
?>
