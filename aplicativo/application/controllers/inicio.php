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
	require_once(APPPATH.'third_party/PasswordHash.php');
	public function index()
	{

		// $this->load->model('aplicativomodel');		
		// var_dump($this->aplicativomodel->getlistado());
		// var_export($this->aplicativomodel->getlistado2());
		
		$t_hasher = new PasswordHash(8, TRUE);
		//$hash = $t_hasher->HashPassword('Mm0925163347');
		//var_export($hash)
		echo $t_hasher . 'vickoman';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */