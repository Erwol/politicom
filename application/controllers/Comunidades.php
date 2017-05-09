<?php
    // Usado para controlar las operaciones con ls elementos 'Políticos'
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    //session_start();
    class Comunidades extends CI_Controller {
        function __construct(){
            parent::__construct();
            $this->load->library(array('form_validation','encrypt'));
            $this->load->library('form_validation');
        	$this->load->helper(array('url','form'));
            // Carga del modelo
            $this->load->model('ComunidadModel');
        }


        function index(){
            // Carga header
            $datos = array(
                "titulo" => "Politi.co | Comunidades"
            );
            $this->load->view('header', $datos);
            $this->load->view('/comunidades_');

            $this->load->view('footer');
        }


        function mostrar($comunidad){
            $datos = array(
                "titulo" => "Politi.co | Comunidades"
            );
            $this->load->view('header',$datos);

            if($comunidad == 'andalucia'){
                $arrayPoli = $this->ComunidadModel->listar(1);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'aragon'){
                $arrayPoli = $this->ComunidadModel->listar(2);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'asturias'){
                $arrayPoli = $this->ComunidadModel->listar(3);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'baleares'){
                $arrayPoli = $this->ComunidadModel->listar(4);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'canarias'){
                $arrayPoli = $this->ComunidadModel->listar(5);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'cantabria'){
                $arrayPoli = $this->ComunidadModel->listar(6);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'leon'){
                $arrayPoli = $this->ComunidadModel->listar(7);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'mancha'){
                $arrayPoli = $this->ComunidadModel->listar(8);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'cataluna'){
                $arrayPoli = $this->ComunidadModel->listar(9);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'valencia'){
                $arrayPoli = $this->ComunidadModel->listar(10);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'extremadura'){
                $arrayPoli = $this->ComunidadModel->listar(11);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'galicia'){
                $arrayPoli = $this->ComunidadModel->listar(12);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'madrid'){
                $arrayPoli = $this->ComunidadModel->listar(13);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'murcia'){
                $arrayPoli = $this->ComunidadModel->listar(14);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'navarra'){
                $arrayPoli = $this->ComunidadModel->listar(15);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'vasco'){
                $arrayPoli = $this->ComunidadModel->listar(16);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
            if($comunidad == 'rioja'){
                $arrayPoli = $this->ComunidadModel->listar(17);
                foreach ($arrayPoli as $politico) {
                    $this->load->view('politico_comunidad', $politico);
                }
            }
        }


    }
?>
