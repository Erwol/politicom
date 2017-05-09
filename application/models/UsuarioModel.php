<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class usuarioModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
            // Encripta / des contraseñas de nuevos usuarios
			$this->load->library(array('encrypt'));
		}

		// Función que devuelve datos generales con los que operará el administrador
        function datosAdministrador(){
            // Número de votos en el sistema
            $this->db->select('Puntuacion');
            $this->db->from('votacion');
            $consulta = $this->db->get();
            $datos['NumeroVotaciones'] = $consulta->num_rows();
            // Total de puntos registrados
            $resultado = $consulta->result();
            $datos['TotalPuntos'] = 0;
            foreach ($resultado as $fila) {
                $datos['TotalPuntos'] += $fila->Puntuacion;
            }
            // Total de usuarios
            $this->db->select();
            $this->db->from('usuario');
			$this->db->where('Activo', 1);
            $consulta = $this->db->get();
            $datos['NumeroUsuarios'] = $consulta->num_rows();
            //Total políticos
            $this->db->select();
            $this->db->from('politico');
			$this->db->where('Activo', 1);
            $consulta = $this->db->get();
            $datos['NumeroPoliticos'] = $consulta->num_rows();
            //Total partidos
            $this->db->select();
            $this->db->from('partido');
            $consulta = $this->db->get();
            $datos['NumeroPartidos'] = $consulta->num_rows();
            return $datos;
        }


		// Función que devuelve datos generados por un sólo usuario
        function datosUsuarioAdministracion(){
            // Número de votos en el sistema
            $this->db->select('Puntuacion');
            $this->db->from('votacion');
			$this->db->where('Id_Usuario', $this->session->userdata('Id'));
            $consulta = $this->db->get();
            $datos['NumeroVotaciones'] = $consulta->num_rows();
            // Total de puntos registrados
            $resultado = $consulta->result();
            $datos['TotalPuntos'] = 0;
            foreach ($resultado as $fila) {
                $datos['TotalPuntos'] += $fila->Puntuacion;
            }
            // Total de usuarios
            $this->db->select();
            $this->db->from('usuario');
			$this->db->where('Id', $this->session->userdata('Id'));
            $consulta = $this->db->get();
            $datos['NumeroUsuarios'] = $consulta->num_rows();
            return $datos;
        }

		// Función que devuelve datos del usuario definido por la sesión
		function datosUsuario(){
			// Número de votos en el sistema por el usuario
			$this->db->select('Puntuacion');
			$this->db->from('votacion');
			$consulta = $this->db->get();
			$datos['NumeroVotaciones'] = $consulta->num_rows();
			// Total de puntos registrados
			$resultado = $consulta->result();
			$datos['TotalPuntos'] = 0;
			foreach ($resultado as $fila) {
				$datos['TotalPuntos'] += $fila->Puntuacion;
			}
			// Total de usuarios
			$this->db->select();
			$this->db->from('usuarios');
			$consulta = $this->db->get();
			$datos['NumeroUsuarios'] = $consulta->num_rows();
			return $datos;
		}




		// True si se insertó correctamente. False + mensaje de error si no.
		function nuevo($nombre, $apellidos, $email, $password, $rango)
		{
			$datos = array(
				'Nombre' => $nombre,
				'Apellidos' => $apellidos,
				'Email' => $email,
				'Rango' => $rango,
				'Password' => md5($password)
			);

			if(!$this->db->insert('usuario', $datos)){
				$resultado["msg"] = $this->db->_error_message();
				$resultado["cod"] = false;
			}else{
				$resultado["cod"] = true;
			}

			return $resultado;
		}

		/**
		*	Devuelve verdadero si existe una coincIdencia en la BD con los datos proprocionados desde el controlador, en el caso
		*	que el modelo no encuentre una coincIdencia en la BD devolvera falso. Ademas devuelve un codigo que indica si el
		*	usuario logueado es admin o usuario y todos los datos de la BD
		*/
		function login($email, $password){
			$this->db->select();
			$this->db->from('usuario');
			$this->db->where('Email', $email);

			$this->db->where('Password', MD5($password));
			$this->db->limit(1);


			$query = $this->db->get();
			if($query->num_rows() == 1){	// Si hay sólo una fila/usuario coincidente
				return $query->result();
			}
			else{
				return false;
			}

		}




	}
?>
