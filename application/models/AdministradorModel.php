<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class AdministradorModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
            // Encripta / des contraseñas de nuevos usuarios
			$this->load->library(array('encrypt'));
		}


        // Función para listar a todos los usuarios
        function listado_usuarios($id = -1){
			if($id === -1){
				$this->db->select();
	            $this->db->from('usuario');
				$this->db->where('Activo', 1);
	            $consulta = $this->db->get();
	            return $consulta->result();
			}
			else{
				$this->db->select();
	            $this->db->from('usuario');
				$this->db->where('Id', $id);
				$this->db->where('Activo', 1);
	            $consulta = $this->db->get();
	            return $consulta->result();
			}

        }
		// Función para listar a un solo usuario
        function listar_usuario($id){
            $this->db->select();
			$this->db->where('Id', $id);
            $this->db->from('usuario');
            $consulta = $this->db->get();
            return $consulta->result();
        }
		// Función para modificar a un usuario
        function modificar_usuarios($id, $nombre, $apellidos, $email, $rango){
			$this->db->set('Nombre', $nombre);
			$this->db->set('Apellidos', $apellidos);
			$this->db->set('Email', $email);
			$this->db->set('Rango', $rango);
			$this->db->where('Id', $id);
			return $this->db->update('usuario');
        }
		// Función que marca como inactivo a un usuario
		function eliminar_usuario($id){
			// Los votos quedarán en el sistema aunque el usuario se haya eliminado
			$this->db->set('Activo', 0);
			$this->db->where('Id', $id);
			$this->db->update('usuario');
		}
		// Elimina votos
		function eliminar_voto($id){
			$this->db->where('Id', $id);
			$this->db->delete('votacion');
			/*
			// Una vez insertado el voto, recalculamos los puntos que tiene el político y las votaciones que ha recibido
			// Buscamos la ID del politico
			$this->db->select('Id_Politico');
			$this->db->from('votacion');
			$this->db->where('Id', $id);
			$consulta = $this->db->get();
			$arrayVotos = $consulta->result();
			$Politico = 0;
			foreach ($arrayVotos as $voto) {
				// Vamos almacenando todos los votos que ha recibido
				$Politico = $voto->Id_Politico;
			}
			// Buscamos datos
			$this->db->select('Id_Politico, Puntuacion');
			$this->db->from('votacion');
			$this->db->where('Id_Politico', $Politico);
			$consulta = $this->db->get();
			// El número de votos será el número de filas localizadas en la consulta
			$NumeroDeVotos = $consulta->num_rows();
			$PuntosActualizar = 0;
			$arrayVotos = $consulta->result();
			foreach ($arrayVotos as $voto) {
				// Vamos almacenando todos los votos que ha recibido
				$PuntosActualizar += $voto->Puntuacion;
			}

			// Actualizamos los datos de nuestro político
			$this->db->set('Puntos', $PuntosActualizar);
			$this->db->set('NumeroDeVotos', $NumeroDeVotos);
			$this->db->set('Nota', $PuntosActualizar / $NumeroDeVotos);
			$this->db->where('Id', $Politico);
			$this->db->update('politico');*/
		}
        // Devuelve todos los votos
		function listado_votos($id_usuario = -1){
			if($id_usuario === -1){
				// Devuelve todos los votos
				$this->db->select();
				$this->db->from('votacion');
				$consulta = $this->db->get();
				return $consulta->result();
			}
			else{
				// Devuelve sólo los votos de ese usuario
				$this->db->select();
				$this->db->where('Id_Usuario', $id_usuario);
				$this->db->from('votacion');
				$consulta = $this->db->get();
				return $consulta->result();
			}
		}
		// Devuelve la info de un sólo político, o de todos los polítrader_cdlharamicross
		function listar_politicos($id = -1){
			if($id === -1){
				// Devuelve todos los políticos
				$this->db->select();
				$this->db->from('politico');
				$this->db->where('Activo', 1);
				$consulta = $this->db->get();
				return $consulta->result();
			}
			else{
				// Devuelve un sólo político
				$this->db->select();
				$this->db->where('Id', $id);
				$this->db->from('politico');
				$this->db->where('Activo', 1);
				$consulta = $this->db->get();
				return $consulta->result();
			}
		}
		function listar_partidos($siglas = null){
			if($siglas === null){
				// Devolvemos la info de todos los partidos
				$this->db->select();
				$this->db->from('partido');
				$this->db->where('Activo', 1);
				$consulta = $this->db->get();
				return $consulta->result();
			}
			else{
				// Devolvemos la info de todos los partidos
				$this->db->select();
				$this->db->where('Siglas', $siglas);
				$this->db->where('Activo', 1);
				$this->db->from('partido');
				$consulta = $this->db->get();
				return $consulta->result();
			}
		}
		function nuevo_partido($siglas, $id_lider, $descripcion, $nombre){
			$data = array(
				'Siglas' => $siglas,
				'Descripcion' => $descripcion,
				'Nombre' => $nombre
			);
			$this->db->insert('partido', $data);
		}
		// Elimina un partido
		function eliminar_partido($Id){
			$this->db->set('Activo', 0);
			$this->db->where('Id', $Id);
			$this->db->update('partido');
			// Marcamos como inactivos a todos los políticos de ese partido
			$this->db->set('Activo', 0);
			$this->db->where('Id', $Id);
			$this->db->update('politico');
		}
		function nuevo_politico($nombre, $apellidos, $siglas, $descripcion, $imagen){
			$data = array(
				'Nombre' => $nombre,
				'Apellidos' => $apellidos,
				'Siglas' => $siglas,
				'Descripcion' => $descripcion,
				'Imagen' => $imagen
			);
			$this->db->insert('politico', $data);
		}
		function eliminar_politico($Id){
			$this->db->set('Activo', 0);
			$this->db->where('Id', $Id);
			$this->db->update('politico');
		}
    }
?>
