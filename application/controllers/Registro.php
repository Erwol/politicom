<?php
	 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	 class Registro extends CI_Controller
	 {
	 	function __construct()
	 	{
	 		parent::__construct();
	 		$this->load->library(array('form_validation','encrypt'));
        	$this->load->helper(array('url','form'));
			$this->load->model('UsuarioModel');
	 	}

	 	function index()
	 	{
            $datos = array(
                        "titulo" => "Politi.co | Registro"
            );
            $this->load->view('header', $datos);
	 		$this->load->view('registro/registro');
            $this->load->view('footer');
	 	}

	 	function completar(){


	 		//Definimos las restricciones
	 		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
	 		$this->form_validation->set_rules('password','Password','required|trim');
			$this->form_validation->set_rules('nombre','Nombre','required|trim');
			$this->form_validation->set_rules('apellidos','Apellidos','required|trim');

	 		$this->form_validation->set_message('valid_email','El correo %s no es valido');
	 		$this->form_validation->set_message('required','No ha insertado el campo %s');

			// Llamamos al modelo
			$resultado = $this->UsuarioModel->nuevo($this->input->post('nombre'), $this->input->post('apellidos'),  $this->input->post('email'), $this->input->post('password'), $this->input->post('rango'));
			if($resultado['cod']){
				// Ingresado ok
				$datos = array(
	                "titulo" => "Politi.co | Registro completado"
	            );
				$this->load->view('header', $datos);
		 		$this->load->view('registro/registro_completado');
	            $this->load->view('footer');
			}
			else{
				$datos = array(
	                        "titulo" => "Politi.co | Registro"
	            );
				$this->load->view('header', $datos);
		 		$this->load->view('registro/registro_error', $resultado['msg']);
	            $this->load->view('footer');
			}






		}
	 }
 ?>
