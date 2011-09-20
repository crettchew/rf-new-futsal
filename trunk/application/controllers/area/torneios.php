<?php
	if (!defined('BASEPATH'))
		exit('No direct script access allowed');

	# Set PHP's internal character encoding to UTF-8
	mb_internal_encoding('UTF-8');
	# Set the character encoding to UTF-8 for all page output
	header('Content-type: text/html; charset=UTF-8');

	class Torneios extends CI_Controller {

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

			$data['torneios'] = $this -> getTorneios();

			$this -> load -> view('header');
			$this -> load -> view('area/torneios', $data);
			$this -> load -> view('footer');
		}

		public function getTorneios() {

			$this -> load -> helper('url');
			$this -> load -> library('my_table');

			$tmpl = array('table_open' => '<table border="0" width: "auto"" cellpadding="0" cellspacing="1" id="grupos_table" class="simple_table">');
			$this -> table -> set_template($tmpl);
			$this -> table -> set_heading_width('', '', '', '', '', '', '', '', '', '', '', '', '');

			$query = $this -> db -> query('select idtorneios as "ID", 
												  nome as "Nome Torneio", 
												  edicao as "Edição", 
												  data_inicio as "Data de Início", 
												  data_fim as "Data de Fim", 
												  isActive as "Activo", 
												  observacoes as "Observações",
												  cr_by as "Criado por", 
												  cr_dt as "Criado em", 
												  upd_by as "Alterado por", 
												  upd_dt as "Alterado em"
												  from torneios');

			$this -> table -> set_heading('', 'ID', 'Nome Torneio', 'Edição', 'Data de Início', 'Data de Fim', 'Activo', 'Observações', 'Criado por', 'Criado em', 'Alterado por', 'Alterado em', '');

			foreach ($query->result_array() as $row) {
				$cart = array();

				$attributes = array('class' => 'detalhes', 'id' => 'detalhes');
				$cell = anchor('area/torneios/getInfoTorneio?id=' . $row['ID'], 'Detalhes', $attributes);
				//$this -> table -> add_row($row['ID'], $row['Nome Torneio'], $row['Edição'], $row['Data de Início'], $row['Data de Fim'], $row['Activo'], $row['Observações'], $row['Criado por'], $row['Criado em'], $row['Alterado por'], $row['Alterado em'], form_button($cell));

				//$row['x']=$cell;
				//$this -> table -> add_row(array_shift($row));

				$row[1] = $cell;
				$this -> table -> add_row($row);

			}
			$this -> table -> remove_column('');
			//$this->table->add_anchor('name', 'size', 'part/delete');

			return $this -> table -> generate();

		}
		
		public function getInfoTorneio() {
			$id = $_GET['id'];
			$data['torneios']  = $id.' --------------------------------';
			$this -> load -> view('header');
			$this -> load -> view('area/torneios', $data);
			$this -> load -> view('footer');
			
		}

	}

	/* End of file welcome.php */
	/* Location: ./application/controllers/welcome.php */
