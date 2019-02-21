<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Noticia_Portal extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function inserirNoticia($data) {
        $this->db->insert('noticia', $data);
    }

    public function apagarNoticia($id) {
        $this->db->where('id_noticia', $id);
        $resultado = $this->db->delete('noticia');
        return $resultado;
    }

    public function retornaNoticiaCategoria($categoria) {
        $this->db->where('id_categoria', $categoria);
        $resultado = $this->db->get('noticia');
        return $resultado->result();
    }

    public function noticiaId($id) {
        $this->db->where('id_noticia', $id);
        $resultado = $this->db->get('noticia');
        return $resultado->result();
    }

    public function atualizarNoticia($id, $data) {
        $this->db->where('id_noticia', $id);
        $this->db->update('noticia', $data);
    }

    public function retornaTodasNoticias() {
        $this->db->order_by('id_noticia', 'desc');
        $this->db->select('*');
        $this->db->join('usuario', 'usuario.id_usuario = noticia.id_usuario', 'inner');
        return $this->db->get('noticia')->result();
    }

    public function retornaTodasNoticiasAtivas() {
        $this->db->order_by('id_noticia', 'desc');
        $this->db->where('flAtivo', "1");
        $this->db->select('*');
        return $this->db->get('noticia')->result();
    }

    public function retornaTodasNoticiasInnerCategoria($id) {       
        $this->db->where('id_noticia', $id);
        $this->db->select('*');
        $this->db->join('categoria', 'categoria.id_categoria = noticia.id_categoria', 'inner');
        return $this->db->get('noticia')->result();
    }
    
    public function retornaTodasNoticiasAtiviasCategoria($id_categoria) {
        $this->db->where('flAtivo', '1');
        $this->db->where('id_categoria', $id_categoria);
        $resultado = $this->db->get('noticia');
        return $resultado->result();
    }

    public function retornaAcessosDia() {
        $this->db->where('data_publicacao', date('d,m,y'));
        $this->db->select_sum('num_acessos');
        $resultado =  $this->db->get('noticia');        
        return $resultado->result();
    }
    
       public function retornaAcessosTotal() {
        $this->db->select_sum('num_acessos');
        $resultado =  $this->db->get('noticia');        
        return $resultado->result();
    }


}
