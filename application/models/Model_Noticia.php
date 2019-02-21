<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Noticia extends CI_Model {

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

    public function retornaTodasNoticias($limit=null, $inicio=0) {
        if ($limit) {
            $this->db->limit($limit, $inicio);
        }
        $this->db->order_by('id_noticia', 'desc');
        $this->db->select('*');
        $this->db->join('usuario', 'usuario.id_usuario = noticia.id_usuario', 'inner');
        return $this->db->get('noticia')->result();
    }

    public function retornaTodasNoticiasAtivas($limit = null) {
        if ($limit) {
            $this->db->limit($limit);
        }

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
        $this->db->where('data_publicacao', date('y-m-d'));
        $this->db->select_sum('num_acessos');
        $resultado = $this->db->get('noticia');
        return $resultado->result();
    }

    public function retornaAcessosTotal() {
        $this->db->select_sum('num_acessos');
        $resultado = $this->db->get('noticia');
        return $resultado->result();
    }

    public function retornaTotalNoticiasPublicadas() {
        $this->db->where('flAtivo', 1);
        $resultado = $this->db->get('noticia')->num_rows();
        return $resultado;
    }

    public function topAcessos($limit = null) {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->where('flAtivo', 1);
        $this->db->order_by('num_acessos', 'desc');
        $resultado = $this->db->get('noticia');
        return $resultado->result();
    }

    //*aqui começa a parte do portal**//

    public function retornaTodasNoticiasInnerCategoriaNome($nome_categoria, $limit = null, $inicio = 0) {

        if ($limit) {
            $this->db->limit($limit, $inicio);
        }

        $this->db->order_by('id_noticia', 'desc');
        $this->db->where('nome_categoria', $nome_categoria);
        $this->db->where('flAtivo', '1');
        $this->db->select('*');
        $this->db->join('categoria', 'categoria.id_categoria = noticia.id_categoria', 'inner');
        return $this->db->get('noticia')->result();
    }

    public function numNoticiasCategoria($nome_categoria) {
        $this->db->where('nome_categoria', $nome_categoria);
        $this->db->where('flAtivo', '1');
        $this->db->select('*');
        $this->db->join('categoria', 'categoria.id_categoria = noticia.id_categoria', 'inner');
        return $this->db->get('noticia')->num_rows();
    }

    public function retornaMaisAcessadasDia($limite = 0, $data) {
        $this->db->limit($limite);
        $this->db->order_by('num_acessos', 'desc');
        $this->db->where('flAtivo', '1');
        $this->db->where('data_publicacao', $data);
        $this->db->join('categoria', 'categoria.id_categoria = noticia.id_categoria', 'inner');
        return $this->db->get('noticia')->result();
    }

    public function retornaNoticiaAtivaId($id) {
        $this->db->where('id_noticia', $id);
        $this->db->where('flAtivo', 1);
        $resultado = $this->db->get('noticia');
        return $resultado->result();
    }

    public function retornaNumNoticiasRows() {
        $this->db->select('*');
        return $this->db->get('noticia')->num_rows();
    }

}
