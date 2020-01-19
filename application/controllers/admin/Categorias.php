<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

	/*verifica o usuário se está logado*/
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('admin/login');
			}
				$this->load->model('categorias_model');
	}

	public function index()
	{
		$data ['titulo'] = 'Listar Categorias';
		$data ['view'] = 'admin/categorias/listar';
		$data ['categorias'] = $this->categorias_model->getCategorias();

	 	$this->load->view('admin/template/index', $data);
	}
	public function modulo($id_categoria=NULL){

				$dados = NULL;
			if ($id_categoria) {
				$data['titulo'] = 'Atualizar categoria';
				$dados = $this->categorias_model->getCategoriaId($id_categoria);
			if(!$dados) {
				setMsg('msgCadastro', 'Categoria não encontrada');
				redirect('admin/categorias', 'refresh');
			}
			} else {
				$data['titulo'] = 'Novo categoria';
			}
				$data['view']   = 'admin/categorias/modulo';
				$data['dados'] = $dados;
				$data['cat_pai'] = $this->categorias_model->getCatPai();

				$this->load->view('admin/template/index', $data);
	}

	public function core(){
		/*echo 	'<prep>';
		*print_r($this->input->post());
	  *Resultado da função core
		*Array (
		*[nome] => Nome do produto
		*[ativo] => 1
		)*/
	$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[5]');

	if($this->form_validation->run() == TRUE){
				// echo 'Enviar form';
				$dadosCategorias['nome'] = $this->input->post('nome');
				$dadosCategorias['ativo'] = $this->input->post('ativo');

				if($this->input->post('id_cat_pai')){
						$dadosCategorias['id_cat_pai'] = $this->input->post('id_cat_pai');
				}else{
					$dadosCategorias['id_cat_pai'] = NULL;
				}
				$this->categorias_model->doInsert($dadosCategorias);
				return redirect ('admin/categorias/modulo', 'refresh');
			}else {
				$this->modulo();
			}
	}
}
