<?php
	 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	 class Login extends CI_Controller
	 {
	 	function __construct()
	 	{
	 		parent::__construct();
	 		$this->load->library(array('form_validation','encrypt'));
            $this->load->library('form_validation');
        	$this->load->helper(array('url','form'));
			// Carga del modelo
            $this->load->model('UsuarioModel');
	 	}

        // Carga la página de login
	 	function index() //$opc=-1
	 	{
            // $this->load->model('UsuarioModel');
            $datos = array(
                "titulo" => "Politi.co | Login"
            );

            $this->load->view('header', $datos);
            $this->load->view('login/login');
            $this->load->view('footer');
	 	}

        // Comprueba el inicio de sesión correcto
        function verificar(){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			//	Restricciones pre-consulta
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

			// Si estas restricciones no se cumplen, se carga el login, si no, pasamos a realizar la consulta a la BD
            if($this->form_validation->run() == FALSE){
				$datos = array(
	                "titulo" => "Politi.co | Login"
	            );
				$this->load->view('header', $datos);
	            $this->load->view('login/login_error');
	            $this->load->view('footer');
            }
            else{
				// Consultamos en la base de datos si el email y la contraseña coinciden
				//$email = $this->input->post('email');
				//$password = $this->input->post('password');
				// Cargamos el modelo. En él, buscará email y pass coincidentes
				$consulta = $this->UsuarioModel->login($email, $password);
				if($consulta == true){
					// Si las credenciales coinciden creamos el array con los datos de la sesión
					$arraySesion = array();
					foreach($consulta as $fila){	// foreach que será sólo una fila ya que el email es único
						$arraySesion = array(
							'Id' => $fila->Id,
							'Activo' => $fila->Activo,
							'Nombre' => $fila->Nombre,
							'Rango' => $fila->Rango,	//Admin o User
							'Email' => $fila->Email
						);
						if($arraySesion['Activo'] == 0){
							$datos = array(
								"titulo" => "Politi.co | Login"
							);
							$this->load->view('header', $datos);
							$this->load->view('login/login_error_eliminado');
							$this->load->view('footer');
						}
						else{
							$this->session->set_userdata('logged_in', $arraySesion);	// Marcamos como iniciada esta sesión
							$this->session->set_userdata('Id', $arraySesion['Id']);
							$this->session->set_userdata('Rango', $arraySesion['Rango']);
							$this->session->set_userdata('Nombre', $arraySesion['Nombre']);
							switch($arraySesion['Rango']){
								case 'Admin':{
									$datos = array(
										"titulo" => "Panel del administrador"
									);
									$admin = $this->UsuarioModel->datosAdministrador();
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
									$this->load->view('footer');
								};break;
							}
						}

					}
				}
				else{
					// Si la contraseña no es correcta, mandamos al usuario de vuelta al login
					$datos = array(
		                "titulo" => "Politi.co | Login (Datos erróneos)"
		            );
					$this->form_validation->set_message('check_database', 'Invalid username or password');
					$this->load->view('header', $datos);
					// COpia de la vista login con un mensaje de error
		            $this->load->view('login/login_error');
		            $this->load->view('footer');
				}
                //Go to private area
                //redirect('http://".base_url()."index.php/registro', 'refresh');
            }
        }


	 }
 ?>
