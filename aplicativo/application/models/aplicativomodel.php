<?php 
/**
* Clase aplicativo
* Vickoman
*/
class Aplicativomodel extends CI_Model
{
	$db_mario = '';
	$db_pepa = '';
	public function __constructor()
	{
		parent::__constructor();
		$this->db_mario = $this->load->database('default', TRUE);
		$this->db_pepa  = $this->load->database('yogopepa', TRUE);
	}
	public function getlistado()
	{
		$query = $this->db_mario->query('select * from yogobierno3.yg_registro limit 3');
		return $query->result();
	}
}
?>