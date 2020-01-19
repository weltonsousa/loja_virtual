<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Model categorias
 */
class categorias_model extends CI_Model
{
	//listar categorias
	public function getCategorias()
	{
		return $this->db->get('categorias')->result();
  }
  public function getCatPai(){

    $this->db->where('id_cat_pai', NULL);
    return $this->db->get('categorias')->result();
  }

  //Pegar nome categoria pai
  public function getCatNome($id_categoria_pai=NULL){
    if($id_categoria_pai){
      $this->db->where('Id', $id_categoria_pai);
      $this->db->limit(1);
     $query = $this->db->get('categorias')->row();

     return $query->nome;
    }
  }

  public function doInsert($dados=NULL){
    if(is_array($dados)){
        $this->db->insert('categorias', $dados);
        if($this->db->affected_rows() > 0){
        setMsg('msgCadastro', 'Categoria cadastrado com sucesso', 'sucesso');
      }else{
        setMsg('msgCadatsro', 'Erro ao cadastrar categoria', 'erro');
      }
    }
  }
  //Pegar categoria pela sua id
  public function getCategoriaId($id_categoria=NULL){
    if($id_categoria){
      $this->db->where('id', $id_categoria);
      $query = $this->db->get('categorias');
      return $query->row();
    }
  }
}
