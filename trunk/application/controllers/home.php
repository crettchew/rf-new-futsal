<?php
	if (!defined('BASEPATH'))
		exit('No direct script access allowed');

	# Set PHP's internal character encoding to UTF-8
	mb_internal_encoding('UTF-8');
	# Set the character encoding to UTF-8 for all page output
	header('Content-type: text/html; charset=UTF-8');

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
		public function index() {

			$this -> load -> view('header');

			if ($this -> session -> userdata('logged_in')) {
				$data['form_login'] = $this -> session -> userdata('logged_in') . ' LOGADO';
				//getCalendario
				$data['calendario'] = $this -> getCalendario();

				//getClassificação
				$data['classificacao'] = $this -> getClassificacao();
			}
			else {
				$data['form_login'] = "";
				$data['form_login'] .= ' <div align="center">
								<div class="login_container">
								<div class="login_header ">Login</div>';
				$data['form_login'] .= $this -> criaFormularioLogin("", "");
				$data['form_login'] .= '</div></div>' . br(1);
				$data['form_login'] .= '<div align="center" style="margin: 10px;">Para proceder com a utilização da aplicação, deverá de efectuar o login. Caso não tenha acessos para o fazer, entre em contacto com o responsável.</div>';
			}

			$this -> load -> view('home', $data);
			$this -> load -> view('footer');
		}

		/**
		 *
		 * função que irá processar o login
		 */
		public function processaLogin() {
			$username = $_POST['username'];
			$password = $_POST['password'];

			if ($username == "romeu" && $password == "fonseca") {

				$data['form_login'] = 'LOGIN OK';

				$newdata = array(
						'username' => $username,
						'user_id' => $username,
						'logged_in' => TRUE
				);

				$this -> session -> set_userdata($newdata);
				//getCalendario
				$data['calendario'] = $this -> getCalendario();

				//getClassificação
				$data['classificacao'] = $this -> getClassificacao();

			}
			else {
				$data['form_login'] = ' <div align="center">
								<div class="login_container">
								<div class="login_header ">Login</div>';
				$data['form_login'] .= $this -> criaFormularioLogin("Erro no processo de Login", "O username e/ou password que introduziu não correspondem a uma conta válida.");
				$data['form_login'] .= '</div></div>' . br(2);
			}

			$this -> load -> view('header');
			$this -> load -> view('home', $data);
			$this -> load -> view('footer');
		}

		/**
		 * Processa o Logout do utilizador
		 */
		public function processaLogout() {

			try {
				$this -> session -> unset_userdata($this -> session -> userdata);
				$data['form_login'] = '	<div class="message"><b>O processo de Logout foi efectuado com sucesso.</b><br>Para voltar a ter acesso às funcionalidades da aplicação deverá de efectuar novamente o login.</div>';
			} catch(Exception $e) {
				$data['form_login'] = '	<div class="error">Ocorreu um erro no processo de Logout</div>';
			}

			$this -> load -> view('header');
			$this -> load -> view('home', $data);
			$this -> load -> view('footer');
		}

		function criaFormularioLogin($message_title, $message) {

			$tmpl = array('table_open' => '<table border="0" cellpadding="2" cellspacing="3" class="login_table">');
			$this -> table -> set_template($tmpl);
			$this -> table -> set_heading_width('width: 100px; text-align: right', '');

			$data['form_login'] = "";

			$attributes = array(
					'class' => 'login_form',
					'id' => 'login_form'
			);
			$data['form_login'] .= form_open('home/processalogin', $attributes);

			$username = array(
					'name' => 'username',
					'id' => 'username',
					'maxlength' => '100',
					'value' => '',
					'size' => '50',
					'style' => 'width:90%',
			);

			$password = array(
					'name' => 'password',
					'id' => 'password',
					'maxlength' => '100',
					'value' => '',
					'size' => '50',
					'style' => 'width:90%',
			);

			$this -> table -> add_row(array(
					form_label('Username:', 'username'),
					form_input($username)
			));
			$this -> table -> add_row(array(
					form_label('Password:', 'password'),
					form_password($password)
			));
			$this -> table -> add_row(array(
					'',
					form_submit('mysubmit', 'Entrar na aplicação', 'class="buttom"')
			));

			$data['form_login'] .= $this -> table -> generate();
			$data['form_login'] .= form_close();

			if ($message != "" && $message_title != "") {
				$data['form_login'] .= br(2) . format_Error($message_title, $message);
			}

			return $data['form_login'];
		}

		public function links() {

			$data['form_login'] = '';

			$this -> load -> view('header');
			$this -> load -> view('links_uteis', $data);
			$this -> load -> view('footer');
		}

		/**
		 * Função que devolve o calendário dos jogos.
		 */
		public function getCalendario() {
			$tmpl = array('table_open' => '<table border="0" width="100%" cellpadding="2" cellspacing="3" class="calendario_table">');
			$this -> table -> set_template($tmpl);
			$this -> table -> set_heading_width('width: 70%; text-align: left', 'width: 30%; text-align: left');

			$cell = array(
					'data' => 'CALENDARIO',
					'class' => 'title',
					'colspan' => 2,
					'style' => 'text-align: center'
			);
			$this -> table -> add_row($cell);
			$this -> table -> add_row(array(
					'data' => 'Col 1',
					'class' => 'title',
					'style' => 'text-align: center'
			), array(
					'data' => 'Col 2',
					'class' => 'title',
					'style' => 'text-align: center'
			));

			for ($i=0; $i < 100; $i++) { 
				$this -> table -> add_row(array('data' => 'Designação '.$i), array('data' => 'Designação '.$i));
			}

			return $this -> table -> generate();

		}

		/**
		 * Função que devolve a classificação das equipas existentes num determinado torneio.
		 */
		public function getClassificacao() {
			$tmpl = array('table_open' => '<table border="0" width="100%" cellpadding="2" cellspacing="3" class="calendario_table">');
			$this -> table -> set_template($tmpl);
			$this -> table -> set_heading_width('width: 60%; text-align: left', 'width: 40%; text-align: left');

			$cell = array(
					'data' => 'CLASSIFICAÇÃO',
					'class' => 'title',
					'colspan' => 2,
					'style' => 'text-align: center'
			);
			$this -> table -> add_row($cell);
			$this -> table -> add_row(array(
					'data' => 'Nome Equipa',
					'class' => '',
					'style' => 'text-align: center'
			), array(
					'data' => 'Pontuação',
					'class' => '',
					'style' => 'text-align: center'
			));

			for ($i=0; $i < 20; $i++) { 
				$this -> table -> add_row(array('data' => 'Designação '.$i), array('data' => 'Designação '.$i));
			}

			return $this -> table -> generate();
		}

	}

	/* End of file welcome.php */
	/* Location: ./application/controllers/welcome.php */
