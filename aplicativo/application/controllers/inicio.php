<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */	
	public function index()
	{

		// $this->load->model('aplicativomodel');		
		// var_dump($this->aplicativomodel->getlistado());
		// var_export($this->aplicativomodel->getlistado2());
		require_once APPPATH.'third_party/PasswordHash.php';
		$t_hasher = new PasswordHash(8, TRUE);
		//$hash = $t_hasher->HashPassword('Mm0925163347');
		//$correct = 'test12345';
		//$hash = $t_hasher->HashPassword($correct);
		//return $this->output->Set_output($hash);
		$rpDS = $this->aplicativomodel->getlistado();

		foreach ($$rpDS as $reg) {
			$correct = $reg->cedula;
			$hash = $t_hasher->HashPassword($correct);
			echo $this->aplicativomodel->updateYogoPepa($hash, $reg->correo);
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */