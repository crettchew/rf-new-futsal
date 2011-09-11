<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administracao extends CI_Controller {

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
		$this->load->view('header');
		echo 'index';
		$this->load->view('footer');
	}

	public function utilizadores()
	{
		$tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="3" class="my_table">' );
		$this->table->set_template($tmpl);
		$this->table->set_heading_width('','','','','','','','','','','','','','');
		$query = $this->db->query("select * from utilizadores");

		$data['form_login'] = $this->table->generate($query);
		
		$this->load->view('header');
		$this->load->view('home', $data);
		$this->load->view('footer');
	}



}

/* End of file welcome.php */