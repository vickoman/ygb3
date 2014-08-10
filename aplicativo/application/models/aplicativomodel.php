<?php 
/**
* Clase aplicativo
* Vickoman
*/
class Aplicativomodel extends CI_Model
{
	public function getlistado()
	{
		$query = $this->db->query('select * from yogobierno3.yg_registro limit 3');
		return $query->result();
	}
}
?>