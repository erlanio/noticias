<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Categoria extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function inserirCategoria($data) {
        $this->db->insert('categoria', $data);
    }

    public function retornaCategoria() {
        $this->db->order_by('nome_categoria');
        $resultado = $this->db->get('categoria');
        return $resultado->result();
    }

    public function retornaCategoriaNome($nome) {
        $this->db->where('nome_categoria', $nome);
        $resultado = $this->db->get('categoria');
        return $resultado->num_rows();
    }
    
    public function apagarCategoria($id) {
        $this->db->where('id_categoria', $id);
        $this->db->delete('categoria');
    }
    
    public function alterarCategoria($id, $data) {
        $this->db->where('id_categoria', $id);
        $resultado = $this->db->update('categoria', $data);
    }
    
    public function retornaCategoriaPorNome($nome) {
        $this->db->where('nome_categoria', $nome);
        $resultado = $this->db->get('categoria');
        return $resultado->result();
    }

}
