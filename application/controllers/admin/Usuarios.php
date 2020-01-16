<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		/*verifica se o usuário está logado*/
		if (!$this->ion_auth->logged_in()) {
			redirect('admin/login');
		}
	}


	public function index()
	{

		$data['titulo'] = 'Lista de usuários';
		$data['view'] = 'admin/usuarios/listar';
		$data['usuarios'] = $this->ion_auth->users()->result();

		$this->load->view('admin/template/index', $data);
	}

	public function modulo($id = NULL)
	{
		$dados = NULL;

		if ($id) {

			/*query de busca por id*/
			$dados = $this->ion_auth->user($id)->row();
			if (!$dados) {
				-setMsg('msgCadastro', 'Usuário não encontrado!', 'erro');
				redirect('admin/usuarios', 'refresh');
			}

			$data['titulo'] = 'Atualizar cadastro';
		} else {

			$data['titulo'] = 'Novo cadastro';
		}

		$data['dados'] = $dados;
		$data['view'] = 'admin/usuarios/modulo';
		$data['navegacao'] = array('titulo' => 'Lista usuários', 'link' => 'admin/usuarios');

		$this->load->view('admin/template/index', $data);
	}
	/*função para salvar e atualizar no banco*/
	public function core()
	{

		$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
		if (!$this->input->post('id_usuario')) {
			$this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[8]');
		}


		if ($this->form_validation->run() == TRUE) {

			$username 	= $this->input->post('nome');
			$password 	= $this->input->post('senha');
			$email 		= $this->input->post('email');
			$additional_data = NULL;
			$group = array('1'); // Sets user to admin.

			if ($this->input->post('id_usuario')) {

				$id = $this->input->post('id_usuario');

				$data['username'] 	= $this->input->post('nome');
				$data['email'] 		= $this->input->post('email');
				$data['active'] 	= $this->input->post('ativo');

				if ($this->input->post('senha')) {
					$data['password'] 	= $this->input->post('senha');
				}
				if ($this->ion_auth->update($id, $data)) {
					setMsg('msgCadastro', 'Usuário atualizado com sucesso!', 'sucesso');
					redirect('admin/usuarios', 'refresh');
				} else {


					setMsg('msgCadastro', 'Erro ao realizar o cadastro!', 'erro');
					redirect('admin/usuarios', 'refresh');
				}
			} else {

				if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
					//setMsg($id, $msg, $tipo)
					setMsg('msgCadastro', 'Usuário cadastrado com sucesso!', 'sucesso');
					redirect('admin/usuarios/modulo', 'refresh');
				} else {

					setMsg('msgCadastro', 'Erro ao realizar o cadastro!', 'erro');
					redirect('admin/usuarios', 'refresh');
				}
			}
		} else {
			$this->modulo();
		}
	}

	public function del($id_usuario = NULL)
	{

		if ($id_usuario) {


			if ($id_usuario == 1) {
				setMsg('msgCadastro', 'Erro você não tem permissão para apagar este usuário!', 'erro');
				redirect('admin/usuarios', 'refresh');
			}

			if ($id_usuario == $this->session->userdata('user_id')) {
				setMsg('msgCadastro', 'Erro você não apagar você mesmo!', 'erro');
				redirect('admin/usuarios', 'refresh');
			}

			if ($this->ion_auth->delete_user($id_usuario)) {
				setMsg('msgCadastro', 'Usuário removido com sucesso!', 'sucesso');
				redirect('admin/usuarios', 'refresh');
			} else {

				setMsg('msgCadastro', 'Erro ao remover usuário!', 'erro');
				redirect('admin/usuarios', 'refresh');
			}
		} else {

			setMsg('msgCadastro', 'Você precisa selecionar um usuário!', 'erro');
			redirect('admin/usuarios', 'refresh');
		}
	}
}
