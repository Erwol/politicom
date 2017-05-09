<?php
    // Carga de la web
	 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	 class Inicio extends CI_Controller
	 {
	 	function __construct()
	 	{
	 		parent::__construct();
	 		$this->load->library(array('form_validation','encrypt','session'));
        	$this->load->helper(array('url','form','date'));
	 	}

	 	function index()
	 	{
			// Carga la cabecera
			$datos = array(
				"titulo" => "Politi.co | Inicio",
				"perfil" => "X"
			);
			$this->load->view('header', $datos);
			$this->load->view('inicio');
			$this->load->view('comunidades_');
			$this->load->view('footer');
	 	}

		function contacto(){
			// Carga la cabecera
			$datos = array(
				"titulo" => "Politi.co | Inicio",
				"perfil" => "X"
			);
			$this->load->view('header', $datos);
			$this->load->view('contacto');
			$this->load->view('footer');
		}


		function enviar_correo(){
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'contacto@politi.co',
				'smtp_pass' => 'contacto34567',
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n"
			);
			$correo = "ernes.wo@gmail.com";
			$this->load->library('email', $config);
			$this->email->initialize($config);
			$this->email->from($this->input->post('InputName'));
			$this->email->to($correo);
			$this->email->message($this->input->post('InputMessage'));
			$this->email->send();
			// Carga la cabecera
			$datos = array(
				"titulo" => "Politi.co | Inicio",
				"perfil" => "X"
			);
			$this->load->view('header', $datos);
			$this->load->view('envio_ok');
			$this->load->view('footer');
		}

	 }
 ?>
