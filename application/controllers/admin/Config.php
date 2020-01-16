<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('admin/login');
		}

		/*carregando a biblioteca na propria classe, podendo ser carregada no config da framework.*/
		$this->load->model('config_model');
	}

	public function index()
	{

		$this->form_validation->set_rules('titulo', 'Título', 'trim|required|min_length[6]');

		if ($this->form_validation->run() == TRUE) {
			echo '<prep>';
			print_r($this->input->post());
			echo '</prep>';
		} else {

			$data['titulo'] 	= 'Configuração da loja';
			$data['view'] 		= 'admin/config/index';
			$data['query'] 		= $this->config_model->getConfig();

			$this->load->view('admin/template/index', $data);
		}
	}
}
