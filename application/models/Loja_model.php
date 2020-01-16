<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  
 */
class Loja_model extends CI_Model
{
	
	public function getProdutos()
	{

		return 'produtos';
	}

	/*public function index()
	{
		$this ->load->model('loja_model', 'Loja');
		$this ->load->view('teste/curso_loja');

	}*/
}