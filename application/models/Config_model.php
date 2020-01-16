<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
*Model para pagina de configuração da loja
*/
class Config_model extends CI_Model
{

	public function getConfig()
	{

		$this->db->where('id', '1');
		$this->db->limit(1);
		$query = $this->db->get('config');
		return $query->row();
	}
}
