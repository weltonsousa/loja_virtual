<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientes extends CI_Controller
{

	/*verifica o usuário se está logado*/
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('admin/login');
			}
				$this->load->model('clientes_model');
	}

	public function index(){
		$data['titulo'] = 'Lista de clientes';
		$data['view']   = 'admin/clientes/listar';
		$data['clientes'] = $this->clientes_model->getClientes();
		$this->load->view('admin/template/index', $data);
	}

	public function modulo($id_cliente = NULL){
		$dados = NULL;
		if ($id_cliente) {
			$data['titulo'] = 'Atualizar cliente';
			$dados = $this->clientes_model->getClienteId($id_cliente);
			if(!$dados){
				setMsg('msgCadastro', 'Cliente não encontrado');
				redirect('admin/clientes', 'refresh');
			}
		} else {
			$data['titulo'] = 'Novo cliente';
		}
		$data['view']   = 'admin/clientes/modulo';
		$data['dados'] = $dados;
		$this->load->view('admin/template/index', $data);
		}

		public function core(){

			/*Array (
				[nome] => Novo 2
				[cpf] => 000.000.000-00
				[data_nascimento] => 01-01-2019
				[telefone] =>
				[email] =>
				[senha] =>
				[cep] => 458666
				[endereco] =>
				[numero] =>
				[bairro] =>
				[complemento] =>
				[estado] =>
				[ativo] => 1
				) */

			// echo '<prep>';

			// print_r($this->input->post());

			$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
			$this->form_validation->set_rules('data_nascimento', 'Data Nascimento', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

			if($this->form_validation->run() == TRUE){
				// echo 'Enviar form';
				$dadosClientes['nome'] = $this->input->post('nome');
				$dadosClientes['cpf'] 	= $this->input->post('cpf');
				$dadosClientes['data_nascimento'] 	= formataDataDb($this->input->post('data_nascimento'));
				$dadosClientes['telefone'] = $this->input->post('telefone');
				$dadosClientes['email'] = $this->input->post('email');
				$dadosClientes['senha'] = $this->input->post('senha');
				$dadosClientes['cep'] = $this->input->post('cep');
				$dadosClientes['endereco'] = $this->input->post('endereco');
				$dadosClientes['numero'] = $this->input->post('numero');
				$dadosClientes['bairro'] = $this->input->post('bairro');
				$dadosClientes['complemento'] = $this->input->post('complemento');
				$dadosClientes['estado'] = $this->input->post('estado');
				$dadosClientes['ativo'] = $this->input->post('ativo');

				if($this->input->post('id_cliente')){
					//Atuallizar cadastro
				$dadosClientes['ultima_atualizacao'] = dataDiaDb();
				$this->clientes_model->doUpdate($dadosClientes, $this->input->post('id_cliente'));
				return redirect ('admin/clientes', 'refresh');
				}else {
				$dadosClientes['data_cadastro'] = dataDiaDb();
				$this->clientes_model->doInsert($dadosClientes);
				return redirect ('admin/clientes/modulo', 'refresh');
				}
			}else {
				$this->modulo();
			}
		}

public function del($id_cliente=NULL){

	if ($id_cliente) {
		$this->clientes_model->doDelete($id_cliente);
		setMsg('msgCadatro', 'Cliente removido com!', 'sucesso');
		redirect ('admin/clientes', 'refresh');
	}else{
		setMsg('msgCadastro', 'Cliente não encontrado', 'erro');
		redirect ('admin/clientes', 'refresh');
	}
}

}