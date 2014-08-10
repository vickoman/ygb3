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
		$query = $db_mario->query('select * from yogobierno3.yg_registro limit 101, 300');
		return $query->result();
	}

	public function getListado2()
	{
		$db_pepa = $this->load->database('yogopepa', TRUE);
		$query = $db_pepa->query("select * from yogobierno30.wp_users limit 3");
		return $query->result();
	}	

	public function updateYogoPepa($clave, $email)
	{
		$db_pepa = $this->load->database('yogopepa', TRUE);
		$arrg = array(
				'user_pass' => $clave
			);
		$db_pepa->where('user_email', $email);
		$str = $db_pepa->update('wp_users', $arrg);
		return $str;
	}
}
?>