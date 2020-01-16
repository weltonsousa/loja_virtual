<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Model clientes
 */
class clientes_model extends CI_Model
{
	//listar clientes
	public function getClientes()
	{
		return $this->db->get('cliente')->result();
	}

	//Adiconar um cliente.
	public function doInsert($dados=NULL){
		if(is_array($dados)){
			$this->db->insert('cliente', $dados);
			if($this->db->affected_rows() > 0 ){
				setMsg('msgCadastro', 'Cliente cadastrado com sucesso.', 'sucesso');
			}else{
				setMsg('msgCadastro', 'Erro ao cadastrar cliente.', 'erro');
			}
		}
	}
	//Buscar cliente.
	 public function getClienteId($id=NULL){
		if($id){
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('cliente');
			return $query->row();
		}
	 }
	 public function doUpdate($dados=NULL, $id_cliente=NULL){
		 		if(is_array($dados) && $id_cliente){
			 		$this->db->update('cliente', $dados, array('Id' => $id_cliente));
			 	if($this->db->affected_rows() > 0){
						setMsg('msgCadastro', 'Cliente cadastrador com sucesso!', 'sucesso');
			 } else {
						setMsg('msgCadastro', 'Erro ao cadastrar cliente', 'erro');
		 }
		}
	 }
	 public function doDelete($id_cliente){
		 		if($id_cliente){
			 		$this->db->delete('cliente', array('Id' => $id_cliente));
			 	if($this->db->affected_rows() > 0){
						setMsg('msgCadastro', 'Cliente deletado com sucesso!', 'sucesso');
			 }
			 }else {
						setMsg('msgCadastro', 'Erro ao deletar cliente', 'erro');
		 }
	 }
}
