<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_loja extends CI_Controller {

	
	public function index()
	{
		$this->load->model('loja_model', 'loja');
		$data ['produtos'] = $this->loja->getProdutos();
		$this->load->view('teste/curso_loja', $data);

	}
	/* Chamando uma função publica
	public function teste()
	{
		echo 'Olá amigos!';
	}*/
}
