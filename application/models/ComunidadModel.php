<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	class ComunidadModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

        // Devuelve en un array la información de las comunidades
        function listar($id){
        	if($id == 1){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 1');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 2){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 2');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 3){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 3');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 4){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 4');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 5){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 5');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 6){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 6');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 7){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 7');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 8){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 8');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 9){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 9');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 10){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 10');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 11){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 11');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 12){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 12');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 13){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 13');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 14){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 14');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 15){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 15');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 16){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 16');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}
        	if($id == 17){
        		$this->db->select('id_comunidad, nombre, politico, descripcion, imagen');
            	$this->db->from('comunidades');
            	$this->db->where('id_comunidad = 17');
            	$resultado = $this->db->get();
            	return $resultado->result();
        	}

        }
	}
?>
