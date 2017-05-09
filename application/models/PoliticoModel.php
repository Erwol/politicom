<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class PoliticoModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		// Añade un nuevo Político a la DB
		function nuevo($nombre, $apellidos, $descripcion, $siglas, $provincia){
			$datos = array(
				'Nombre' => $nombre,
				'Apellidos' => $apellidos,
                'Descripcion' => $descripcion,
                'Siglas' => $siglas,
                'Provincia' => $provincia
			);

			if(!$this->db->insert('usuario', $datos)){
				$resultado["msg"] = $this->db->_error_message();
				$resultado["cod"] = false;
			}else{
				$resultado["cod"] = true;
			}

			return $resultado;
		}

        // Devuelve en un array la información de todos los políticos contenidos en el sistema
        function listar(){
            $this->db->select('Id, Siglas, Provincia, Nombre, Apellidos, Descripcion, Puntos, NumeroDeVotos, Imagen');
            $this->db->from('politico');
			$this->db->where('Activo', 1);
            $resultado = $this->db->get();
            return $resultado->result();
        }

		// Devuelve en un array la información de todos los políticos contenidos en el sistema ordenados de mayor a menor puntuación
        function listarOrdenados(){
            $this->db->select('Id, Siglas, Nota, Provincia, Nombre, Apellidos, Descripcion, Puntos, NumeroDeVotos, Imagen');
            $this->db->from('politico');
			$this->db->where('Activo', 1);
			$this->db->order_by('Nota', 'desc');
            $resultado = $this->db->get();
            return $resultado->result();
        }

		// Función que determina si un usuario ha votado ya a un político
		function ha_votado($Politico){
			$this->db->select('Id, Id_Politico, Id_Usuario, Puntuacion');
			$this->db->from('votacion');
			$this->db->where('Id_Politico', $Politico);
			$this->db->where('Id_Usuario', $this->session->userdata['Id']);
			$resultado = $this->db->get();

			if($resultado->num_rows() === 0){
				// No lo ha votado nunca
				// $mensaje['ha_votado'] = false;
				echo $resultado->num_rows();
				$mensaje['ha_votado'] = false;
				return $mensaje;
			}
			else{
				// Este usuario ya ha votado a este político.
				// Devolvemos el nombre del político y los votos que le puso al votarlo
				// para que el usuario pueda modificarlo
				$consulta = $resultado->result();
				$puntos = 0;
				foreach ($consulta as $fila) {
					$puntos = $fila->Puntuacion;
					$mensaje['Id_Voto'] = $fila->Id;
					$mensaje['Id_Politico'] = $fila->Id_Politico;
				}
				$mensaje['Puntos'] = $puntos;

				// Buscamos el nombre del político
				$this->db->select('Nombre, Apellidos');
				$this->db->from('politico');
				$this->db->where('Id', $Politico);
				$consulta = $this->db->get();
				$resultado = $consulta->result();
				foreach ($resultado as $politico) {
					$mensaje['Nombre'] = $politico->Nombre;
					$mensaje['Apellidos'] = $politico->Apellidos;
				}
				$mensaje['ha_votado'] = true;
				return $mensaje;
			}

		}

		// Si un Usuario NO ha votado a un político, se añaden los puntos
		function votar($Politico, $Puntos){
			// Insertamos el nuevo voto
			$datos = array(
				'Id_Politico' => $Politico,
				'Id_Usuario' => $this->session->userdata['Id'],
				'Puntuacion' => $Puntos,
				'Comentario' => "A implementar."
			);

			if(!$this->db->insert('votacion', $datos)){
				$resultado["msginsert"] = $this->db->_error_message();
				$resultado["codinsert"] = false;
			}else{
				$resultado["codinsert"] = true;
			}

			// Una vez insertado el voto, recalculamos los puntos que tiene el político y las votaciones que ha recibido
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
			if(!$this->db->update('politico')){
				$resultado["msgupdate"] = $this->db->_error_message();
				$resultado["codupdate"] = false;
			}else{
				$resultado["codupdate"] = true;
			}
			return $resultado;
		}

        // Modifica los datos de un Político en la DB
		function modificar($nombre, $apellidos, $descripcion, $siglas, $provincia){
            $datos = array(
				'Nombre' => $nombre,
				'Apellidos' => $apellidos,
                'Descripcion' => $descripcion,
                'Siglas' => $siglas,
                'Provincia' => $provincia
			);

			if(!$this->db->replace('usuario', $datos)){
				$resultado["msg"] = $this->db->_error_message();
				$resultado["cod"] = false;
			}else{
				$resultado["cod"] = true;
			}

			return $resultado;
        }

        // Elimina a un político de la DB
        function eliminar($nombre, $apellidos){
            $this->db->where('Nombre', $nombre);
            $this->db->where('Apellidos', $apellidos);


            if(!$this->db->delete('politico')){
				$resultado["msg"] = $this->db->_error_message();
				$resultado["cod"] = false;
			}else{
				$resultado["cod"] = true;
			}

			return $resultado;
        }




	}
?>
