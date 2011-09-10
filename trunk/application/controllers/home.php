<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['form_login'] = ' <div align="center">
								<div class="login_container">
								<div class="login_header ">Login</div>';
		$data['form_login'].= $this->criaFormularioLogin("", "");
		$data['form_login'].='</div></div>';

		$this->load->view('header');

		$this->load->view('home', $data);
		$this->load->view('footer');
	}

	public function processaLogin()
	{
		$username= $_POST['username'];
		$password= $_POST['password'];

		if ($username=="romeu" && $password == "fonseca"){

			$data['form_login']='LOGIN OK';

			$newdata = array(
                   'username'  => $username,
                   'user_id'     => $username,
                   'logged_in' => TRUE
			);

			$this->session->set_userdata($newdata);

		}
		else {
			$data['form_login'] = ' <div align="center">
								<div class="login_container">
								<div class="login_header ">Login</div>';
			$data['form_login'].= $this->criaFormularioLogin("Erro no processo de Login", "O username e/ou password que introduziu não correspondem a uma conta válida.");
			$data['form_login'].='</div></div>';
		}

		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}

	public function processaLogout()
	{
		ob_start();

		$this->session->unset_userdata($this->session->userdata);
		$this->index();

		echo'<script>alert("Logout efectuado com sucesso!\n\n\ Obrigado por utilizar a aplicação.");</script>';

	}


	function criaFormularioLogin($message_title, $message){

		$tmpl = array ( 'table_open'  => '<table border="0" cellpadding="2" cellspacing="3" class="login_table">' );
		$this->table->set_template($tmpl);
		$this->table->set_heading_width('width: 100px; text-align: right','');

		$data['form_login']="";

		$attributes = array('class' => 'login_form', 'id' => 'login_form');
		$data['form_login'].=form_open('home/processalogin',$attributes);

		$username = array(
              'name'        => 'username',
              'id'          => 'username',
              'maxlength'   => '100',
			  'value'       => '',
              'size'        => '50',
              'style'       => 'width:90%',
		);

		$password = array(
              'name'        => 'password',
              'id'          => 'password',
              'maxlength'   => '100',
			  'value'       => '',
              'size'        => '50',
              'style'       => 'width:90%',
		);

		$this->table->add_row(array(form_label('Username:', 'username'), form_input($username)));
		$this->table->add_row(array(form_label('Password:', 'password'), form_password($password)));
		$this->table->add_row(array('', form_submit('mysubmit', 'Entrar na aplicação', 'class="buttom"')));

		$data['form_login'].=$this->table->generate();
		$data['form_login'].=form_close();

		if ($message != "" && $message_title != ""){
			$data['form_login'].=br(2).format_Error($message_title, $message);
		}

		return $data['form_login'];
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */