<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Categoria', 'categoria');
        $this->load->model('Model_Pessoa', 'pessoa');
    }

    public function index() {
        if ($this->pessoa->verificaNivelUsuarioLogado() == 1 || $this->pessoa->verificaNivelUsuarioLogado() == 2) {
            $data['categoria'] = $this->categoria->retornaCategoria();

            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/inserirCategoria');
            $this->load->view('admin/exibirCategoria', $data);
            $this->load->view('admin/footer');
        } else {
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/noticia/inicioAdmin')
            . "';"
            . "alert('Você não tem permissão para acessar a página!');"
            . "</script>";
        }
    }

    public function inserirCategoria() {


        $data['nome_categoria'] = $this->input->post('categoria');
        $categoria['cat'] = $this->categoria->retornaCategoriaNome($data['nome_categoria']);

        if ($categoria['cat'] > 0) {
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/categoria')
            . "';"
            . "alert('Categoria já cadastrada!');"
            . "</script>";
        } elseif ($data['nome_categoria'] == "") {
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/categoria')
            . "';"
            . "alert('Informe o nome da Categoria!');"
            . "</script>";
        } else {
            $this->categoria->inserirCategoria($data);
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/categoria')
            . "';"
            . "alert('Categoria cadastrada com sucesso!');"
            . "</script>";
        }
    }

    public function apagarCategoria() {
        $id = $this->input->get('id_categoria');
        $this->categoria->apagarCategoria($id);
    }

    public function categorias() {
        $data = $this->categoria->retornaCategoria();
    }

    public function alterarCategoria() {
        $id = $this->input->post('id_categoria');
        $data['nome_categoria'] = $this->input->post('categoria');
        $categoria['cat'] = $this->categoria->retornaCategoriaNome($data['nome_categoria']);

        if ($categoria['cat'] > 0) {
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/categoria')
            . "';"
            . "alert('Categoria já existe!');"
            . "</script>";
        } elseif ($data['nome_categoria'] == "") {
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/categoria')
            . "';"
            . "alert('Informe o nome da Categoria!');"
            . "</script>";
        } else {
            $this->categoria->alterarCategoria($id, $data);
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/categoria')
            . "';"
            . "alert('Categoria alterada com sucesso!');"
            . "</script>";
        }
    }

}
