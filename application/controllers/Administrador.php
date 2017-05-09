<?php
    // Controlador que decide si se ve el panel de control del usuario o la pantalla de login si existe una sesión creada
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    //session_start();
    class Administrador extends CI_Controller {
        function __construct(){
            parent::__construct();
            $this->load->library(array('form_validation','encrypt'));
            $this->load->library('form_validation');
        	$this->load->helper(array('url','form'));
            $this->load->model('UsuarioModel');
            $this->load->model('PoliticoModel');
            $this->load->model('AdministradorModel');
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


        // Muestra todos los usuarios
        function mostrar_usuarios(){
            if($this->session->userdata('logged_in') && $this->session->userdata('Rango') == 'Admin'){
                // Cargamos datos para el panel del Administrador
                $admin = $this->UsuarioModel->datosAdministrador();
                $datos = array(
                    "titulo" => "Panel del administrador"
                );
                $this->load->view('header', $datos);
                $this->load->view('administracion/administrador/index', $admin);
                $usuarios = $this->AdministradorModel->listado_usuarios();
                $this->load->view('administracion/administrador/abre_tabla_usuarios');
                foreach ($usuarios as $usuario) {
                    $this->load->view('administracion/administrador/tabla_usuarios', $usuario);
                }
                $this->load->view('administracion/administrador/cierra_tabla_usuarios');

                $this->load->view('footer');
            }
            else if($this->session->userdata('logged_in') && $this->session->userdata('Rango') == 'User'){
                $datos = array(
                    "titulo" => "Panel del usuario"
                );
                $usuario = $this->UsuarioModel->datosUsuarioAdministracion();
                $this->load->view('header', $datos);
                $this->load->view('administracion/usuario/index', $usuario);

                $usuarios = $this->AdministradorModel->listado_usuarios($this->session->userdata('Id'));
                $this->load->view('administracion/administrador/abre_tabla_usuarios');
                foreach ($usuarios as $usuario) {
                    $this->load->view('administracion/usuario/tabla_usuarios', $usuario);
                }
                $this->load->view('administracion/administrador/cierra_tabla_usuarios');

                $this->load->view('footer');
            }
            else{
                $datos = array(
                    "titulo" => "Politi.co | Inicio"
                );
                $this->load->view('header', $datos);
                $this->load->view('inicio');
                $this->load->view('footer');
            }

        }

        // Modifica a un usuario con datos pasados por post
        function modificar_usuario(){
            $email = $this->input->post('email');
            $nombre = $this->input->post('nombre');
            $rango = $this->input->post('rango');
            $apellidos = $this->input->post('apellidos');
            $id = $this->input->post('id');
            if($this->AdministradorModel->modificar_usuarios($id, $nombre, $apellidos, $email, $rango)){
                if($this->session->userdata('logged_in') && $this->session->userdata('Rango') == 'Admin'){
                    // Cargamos datos para el panel del Administrador
                    $admin = $this->UsuarioModel->datosAdministrador();
                    $datos = array(
                        "titulo" => "Panel del administrador"
                    );
                    $this->load->view('header', $datos);
                    $this->load->view('administracion/administrador/index', $admin);
                    $this->load->view('administracion/actualizacion_ok');
                    $usuarios = $this->AdministradorModel->listado_usuarios();
                    $this->load->view('administracion/administrador/abre_tabla_usuarios');
                    foreach ($usuarios as $usuario) {
                        $this->load->view('administracion/administrador/tabla_usuarios', $usuario);
                    }
                    $this->load->view('administracion/administrador/cierra_tabla_usuarios');

                    $this->load->view('footer');
                }
                else if ($this->session->userdata('logged_in') && $this->session->userdata('Rango') == 'User'){
                    $datos = array(
                        "titulo" => "Panel del usuario"
                    );
                    $usuario = $this->UsuarioModel->datosUsuarioAdministracion();
                    $this->load->view('header', $datos);
                    $this->load->view('administracion/usuario/index', $usuario);
                    $this->load->view('administracion/actualizacion_ok');
                    $usuarios = $this->AdministradorModel->listado_usuarios($this->session->userdata('Id'));
                    $this->load->view('administracion/administrador/abre_tabla_usuarios');
                    foreach ($usuarios as $usuario) {
                        $this->load->view('administracion/administrador/tabla_usuarios', $usuario);
                    }
                    $this->load->view('administracion/administrador/cierra_tabla_usuarios');

                    $this->load->view('footer');
                    $this->load->view('footer');
                }

            }
            else{
                // Error
                // Cargamos datos para el panel del Administrador
                $admin = $this->UsuarioModel->datosAdministrador();
                $datos = array(
                    "titulo" => "Panel del administrador"
                );
                $this->load->view('header', $datos);
                $this->load->view('administracion/actualizacion_fail');
                $this->load->view('administracion/administrador/index', $admin);
                $usuarios = $this->AdministradorModel->listado_usuarios();
                $this->load->view('administracion/administrador/abre_tabla_usuarios');
                foreach ($usuarios as $usuario) {
                    $this->load->view('administracion/administrador/tabla_usuarios', $usuario);
                }
                $this->load->view('administracion/administrador/cierra_tabla_usuarios');

                $this->load->view('footer');
            }

        }

        // Elimina a un usuario cuya id es pasada por post
        function eliminar_usuario(){
            $this->AdministradorModel->eliminar_usuario($this->input->post('id'));
            // Cargamos datos para el panel del Administrador
            $admin = $this->UsuarioModel->datosAdministrador();
            $datos = array(
                "titulo" => "Panel del administrador"
            );
            $this->load->view('header', $datos);
            $this->load->view('administracion/administrador/index', $admin);
            $this->load->view('administracion/actualizacion_ok');
            $usuarios = $this->AdministradorModel->listado_usuarios();
            $this->load->view('administracion/administrador/abre_tabla_usuarios');
            foreach ($usuarios as $usuario) {
                $this->load->view('administracion/administrador/tabla_usuarios', $usuario);
            }
            $this->load->view('administracion/administrador/cierra_tabla_usuarios');

            $this->load->view('footer');
        }


        // Muestra info de un sólo UsuarioModel
        function mostrar_usuario(){
            $usuarios = $this->AdministradorModel->listar_usuario($this->input->post('id'));
            // Cargamos datos para el panel del Administrador
            $admin = $this->UsuarioModel->datosAdministrador();
            $datos = array(
                "titulo" => "Panel del administrador"
            );
            $this->load->view('header', $datos);
            $this->load->view('administracion/administrador/index', $admin);
            $this->load->view('administracion/administrador/abre_tabla_usuarios');
            foreach ($usuarios as $usuario) {
                $this->load->view('administracion/administrador/tabla_usuarios', $usuario);
            }
            $this->load->view('administracion/administrador/cierra_tabla_usuarios');

            $this->load->view('footer');
        }

        // Muestra todos los politicos
        function mostrar_politicos(){
            $politicos = $this->AdministradorModel->listar_politicos();

            // Cargamos datos para el panel del Administrador
            $admin = $this->UsuarioModel->datosAdministrador();
            $datos = array(
                "titulo" => "Panel del administrador"
            );
            $this->load->view('header', $datos);
            $this->load->view('administracion/administrador/index', $admin);
            $this->load->view('administracion/administrador/nuevo_politico');
            $this->load->view('administracion/administrador/abre_tabla_politicos');
            foreach ($politicos as $politico) {
                $this->load->view('administracion/administrador/tabla_politicos', $politico);
            }
            $this->load->view('administracion/administrador/cierra_tabla_politicos');

            $this->load->view('footer');
        }

        // Muestra información de un sólo políticos
        function mostrar_politico(){
            // Carga datos del político
            $politicos = $this->AdministradorModel->listar_politicos($this->input->post('idPolitico'));

            // Cargamos datos para el panel del Administrador
            $admin = $this->UsuarioModel->datosAdministrador();
            $datos = array(
                "titulo" => "Panel del administrador"
            );
            $this->load->view('header', $datos);
            $this->load->view('administracion/administrador/index', $admin);
            $this->load->view('administracion/administrador/abre_tabla_politicos');
            foreach ($politicos as $politico) {
                $this->load->view('administracion/administrador/tabla_politicos', $politico);
            }
            $this->load->view('administracion/administrador/cierra_tabla_politicos');

            $this->load->view('footer');
        }
        // Muestra información de un sólo partido
        function mostrar_partido(){
            // Carga la info del partido
            $partidos = $this->AdministradorModel->listar_partidos($this->input->post('siglas'));
            // Cargamos datos para el panel del Administrador
            $admin = $this->UsuarioModel->datosAdministrador();
            $datos = array(
                "titulo" => "Panel del administrador"
            );
            $this->load->view('header', $datos);
            $this->load->view('administracion/administrador/index', $admin);
            $this->load->view('administracion/administrador/abre_tabla_partidos');
            foreach ($partidos as $partido) {
                $this->load->view('administracion/administrador/tabla_partidos', $partido);
            }
            $this->load->view('administracion/administrador/cierra_tabla_partidos');

            $this->load->view('footer');
        }
        // Muestra todos los partidos políticos registrados
        function mostrar_partidos(){
            $partidos = $this->AdministradorModel->listar_partidos();
            // Cargamos datos para el panel del Administrador
            $admin = $this->UsuarioModel->datosAdministrador();
            $datos = array(
                "titulo" => "Panel del administrador"
            );
            $this->load->view('header', $datos);
            $this->load->view('administracion/administrador/index', $admin);
            $this->load->view('administracion/administrador/nuevo_partido');
            $this->load->view('administracion/administrador/abre_tabla_partidos');
            foreach ($partidos as $partido) {
                $this->load->view('administracion/administrador/tabla_partidos', $partido);
            }
            $this->load->view('administracion/administrador/cierra_tabla_partidos');

            $this->load->view('footer');
        }


        // Eliminar politico
        function eliminar_politico(){
            $this->AdministradorModel->eliminar_politico($this->input->post('id'));


            $politicos = $this->AdministradorModel->listar_politicos();

            // Cargamos datos para el panel del Administrador
            $admin = $this->UsuarioModel->datosAdministrador();
            $datos = array(
                "titulo" => "Panel del administrador"
            );
            $this->load->view('header', $datos);
            $this->load->view('administracion/administrador/index', $admin);
            $this->load->view('administracion/administrador/nuevo_politico');
            $this->load->view('administracion/administrador/abre_tabla_politicos');
            foreach ($politicos as $politico) {
                $this->load->view('administracion/administrador/tabla_politicos', $politico);
            }
            $this->load->view('administracion/administrador/cierra_tabla_politicos');

            $this->load->view('footer');
        }
        // Eliminar partido
        function eliminar_partido(){

            $this->AdministradorModel->eliminar_partido($this->input->post('id'));

            $partidos = $this->AdministradorModel->listar_partidos();
            // Cargamos datos para el panel del Administrador
            $admin = $this->UsuarioModel->datosAdministrador();
            $datos = array(
                "titulo" => "Panel del administrador"
            );
            $this->load->view('header', $datos);
            $this->load->view('administracion/administrador/index', $admin);
            $this->load->view('administracion/administrador/nuevo_partido');
            $this->load->view('administracion/administrador/abre_tabla_partidos');
            foreach ($partidos as $partido) {
                $this->load->view('administracion/administrador/tabla_partidos', $partido);
            }
            $this->load->view('administracion/administrador/cierra_tabla_partidos');

            $this->load->view('footer');
        }


        // Muestra todos los votos del sistema
        function mostrar_votos(){
            if($this->session->userdata('logged_in') && $this->session->userdata('Rango') == 'Admin'){
                // Cargamos datos para el panel del Administrador
                $admin = $this->UsuarioModel->datosAdministrador();
                $datos = array(
                    "titulo" => "Panel del administrador"
                );
                $this->load->view('header', $datos);
                $this->load->view('administracion/administrador/index', $admin);
                $this->load->view('administracion/administrador/abre_tabla_votos');

                // Datos de los votos
                $votos = $this->AdministradorModel->listado_votos();
                foreach ($votos as $voto) {
                    $this->load->view('administracion/administrador/tabla_votos', $voto);
                }
                $this->load->view('administracion/administrador/cierra_tabla_votos');

                $this->load->view('footer');
            }
            else if($this->session->userdata('logged_in') && $this->session->userdata('Rango') == 'User'){
                $datos = array(
                    "titulo" => "Panel del usuario"
                );
                $usuario = $this->UsuarioModel->datosUsuarioAdministracion();
                $this->load->view('header', $datos);
                $this->load->view('administracion/usuario/index', $usuario);

                $this->load->view('administracion/administrador/abre_tabla_votos');

                // Datos de los votos
                $votos = $this->AdministradorModel->listado_votos($this->session->userdata('Id'));
                foreach ($votos as $voto) {
                    $this->load->view('administracion/usuario/tabla_votos', $voto);
                }
                $this->load->view('administracion/administrador/cierra_tabla_votos');


                $this->load->view('footer');
            }
            else{

            }

        }

        function eliminar_voto(){
            if($this->session->userdata('logged_in') && $this->session->userdata('Rango') == 'Admin'){
                $this->AdministradorModel->eliminar_voto($this->input->post('id'));
                // Cargamos datos para el panel del Administrador
                $admin = $this->UsuarioModel->datosAdministrador();
                $datos = array(
                    "titulo" => "Panel del administrador"
                );
                $this->load->view('header', $datos);
                $this->load->view('administracion/administrador/index', $admin);
                $this->load->view('administracion/administrador/abre_tabla_votos');

                // Datos de los votos
                $votos = $this->AdministradorModel->listado_votos($this->session->userdata('Id'));
                foreach ($votos as $voto) {
                    $this->load->view('administracion/administrador/tabla_votos', $voto);
                }
                $this->load->view('administracion/administrador/cierra_tabla_votos');

                $this->load->view('footer');

            }
            else if($this->session->userdata('logged_in') && $this->session->userdata('Rango') == 'User'){
                $this->AdministradorModel->eliminar_voto($this->input->post('id'));
                $datos = array(
                    "titulo" => "Panel del usuario"
                );
                $usuario = $this->UsuarioModel->datosUsuarioAdministracion();
                $this->load->view('header', $datos);
                $this->load->view('administracion/usuario/index', $usuario);
                $this->load->view('administracion/administrador/abre_tabla_votos');

                // Datos de los votos
                $votos = $this->AdministradorModel->listado_votos($this->session->userdata('Id'));
                foreach ($votos as $voto) {
                    $this->load->view('administracion/administrador/tabla_votos', $voto);
                }
                $this->load->view('administracion/administrador/cierra_tabla_votos');
                $this->load->view('footer');
            }
            else{
                $datos = array(
                    "titulo" => "Inicio"
                );
                $this->load->view('header', $datos);
                $this->load->view('inicio');
                $this->load->view('footer');
            }

        }

        function misvotos(){

            if($this->session->userdata('logged_in') && $this->session->userdata('Rango') == 'Admin'){
                // Cargamos datos para el panel del Administrador
                $admin = $this->UsuarioModel->datosAdministrador();
                $datos = array(
                    "titulo" => "Panel del administrador"
                );
                $this->load->view('header', $datos);
                $this->load->view('administracion/administrador/index', $admin);
                $this->load->view('administracion/administrador/abre_tabla_votos');

                // Datos de los votos
                $votos = $this->AdministradorModel->listado_votos($this->session->userdata('Id'));
                foreach ($votos as $voto) {
                    $this->load->view('administracion/administrador/tabla_votos', $voto);
                }
                $this->load->view('administracion/administrador/cierra_tabla_votos');

                $this->load->view('footer');
            }
            else if($this->session->userdata('logged_in') && $this->session->userdata('Rango') == 'User'){
                $datos = array(
                    "titulo" => "Panel del usuario"
                );
                $usuario = $this->UsuarioModel->datosUsuarioAdministracion();
                $this->load->view('header', $datos);
                $this->load->view('administracion/usuario/index', $usuario);
                $this->load->view('administracion/administrador/abre_tabla_votos');

                // Datos de los votos
                $votos = $this->AdministradorModel->listado_votos($this->session->userdata('Id'));
                foreach ($votos as $voto) {
                    $this->load->view('administracion/administrador/tabla_votos', $voto);
                }
                $this->load->view('administracion/administrador/cierra_tabla_votos');
                $this->load->view('footer');
            }
            else{
                $datos = array(
                    "titulo" => "Inicio"
                );
                $this->load->view('header', $datos);
                $this->load->view('inicio');
                $this->load->view('footer');
            }

        }


        function nuevo_partido(){
            $this->AdministradorModel->nuevo_partido($this->input->post('siglas'), 0, $this->input->post('descripcion'),$this->input->post('nombre'));
            $partidos = $this->AdministradorModel->listar_partidos();
            // Cargamos datos para el panel del Administrador
            $admin = $this->UsuarioModel->datosAdministrador();
            $datos = array(
                "titulo" => "Panel del administrador"
            );
            $this->load->view('header', $datos);
            $this->load->view('administracion/administrador/index', $admin);
            $this->load->view('administracion/administrador/nuevo_partido');
            $this->load->view('administracion/administrador/abre_tabla_partidos');
            foreach ($partidos as $partido) {
                $this->load->view('administracion/administrador/tabla_partidos', $partido);
            }
            $this->load->view('administracion/administrador/cierra_tabla_partidos');

            $this->load->view('footer');
        }


        function nuevo_politico(){
            $nombre = $this->input->post('nombre');
            $apellidos = $this->input->post('apellidos');
            $siglas = $this->input->post('siglas');
            $descripcion = $this->input->post('descripcion');
            $imagen = $this->input->post('imagen');

            $this->AdministradorModel->nuevo_politico($nombre, $apellidos, $siglas, $descripcion, $imagen);







            $politicos = $this->AdministradorModel->listar_politicos();

            // Cargamos datos para el panel del Administrador
            $admin = $this->UsuarioModel->datosAdministrador();
            $datos = array(
                "titulo" => "Panel del administrador"
            );
            $this->load->view('header', $datos);
            $this->load->view('administracion/administrador/index', $admin);
            $this->load->view('administracion/administrador/nuevo_politico');
            $this->load->view('administracion/administrador/abre_tabla_politicos');
            foreach ($politicos as $politico) {
                $this->load->view('administracion/administrador/tabla_politicos', $politico);
            }
            $this->load->view('administracion/administrador/cierra_tabla_politicos');

            $this->load->view('footer');
        }
    }
?>
