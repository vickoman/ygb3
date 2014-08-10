<?php 
/**
* Clase aplicativo
* Vickoman
*/
class Aplicativomodel extends CI_Model
{
	public function __constructor()
	{
		parent::__constructor();
		$db_mario = $this->load->database('default', TRUE);
		$db_pepa  = $this->load->database('yogopepa', TRUE);
	}
	public function getlistado()
	{
		$query = $db_mario->query('select * from yogobierno3.yg_registro limit 3');
		return $query->result();
	}
}
?>