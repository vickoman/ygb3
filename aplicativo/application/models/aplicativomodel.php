<?php 
/**
* Clase aplicativo
* Vickoman
*/
class Aplicativomodel extends CI_Model
{
	// $db_mario = '';
	// $db_pepa = '';
	// public function __constructor()
	// {
	// 	parent::__constructor();
	// 	$this->db_mario = $this->load->database('default', TRUE);
	// 	$this->db_pepa  = $this->load->database('yogopepa', TRUE);
	// }
	public function getlistado()
	{
		$db_mario = $this->load->database('default', TRUE);
		$query = $db_mario->query('select * from yogobierno3.yg_registro limit 3');
		return $query->result();
	}

	public function getListado2()
	{
		$db_pepa = $this->load->database('yogopepa', TRUE);
		$query = $db_pepa->query("select * from wp_users limit 3");
		return $query->result();
	}
}
?>