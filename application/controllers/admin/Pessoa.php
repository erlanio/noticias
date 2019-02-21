<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Pessoa', 'pessoa');
    }

    public function index() {
        if ($this->pessoa->verificaNivelUsuarioLogado() == 1) {
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/inserirUsuario');
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

    public function inserirUsuario() {
        $usuarioForm = $data['nome'] = $this->input->post('nome');
        $emailFrom = $data['email'] = $this->input->post('email');
        $data['senha'] = md5($this->input->post('senha'));
        $data['imagem'] = null;
        $data['flativo'] = true;
        $data['nivel_usuario'] = $this->input->post('nivel_usuario');
        $data['descricao_usuario'] = $this->input->post('descricao_usuario');


        if ($this->verificaUsuarioExiste($usuarioForm, $emailFrom) == false) {

            if (!isset($_FILES['imagem-usuario'])) {
                
            } else {
                $imagem = $_FILES['imagem-usuario'];

                $data['imagem'] = $imagem['name'];
                $configuracao = array(
                    'upload_path' => 'assets/imgs/usuarios/',
                    'allowed_types' => 'jpg', 'png',
                    'file_name' => $data['imagem'],
                );
                $this->load->library('upload');
                $this->upload->initialize($configuracao);
                if ($this->upload->do_upload('imagem-usuario')) {

                    //função NA MODEL PARA INSERÇÃO NO BD
                    $this->pessoa->inserirUsuario($data);
                    echo "<script>"
                    . "window.location.href = '"
                    . base_url('admin/pessoa')
                    . "';"
                    . "alert('Usuário cadastrado com sucesso!');"
                    . "</script>";
                } else {

                    echo $this->upload->display_errors();
                }
            }
            $this->load->view('admin/header');
            $this->load->view('admin/inserirUsuario');
        }
    }

    public function verificaUsuarioExiste($nomeForm, $emailForm) {
        $result['pessoa'] = $this->pessoa->retornaUsuarios();

        foreach ($result['pessoa'] as $data) {
            $nome = $data->nome;
            $email = $data->email;
        }

        if ($nomeForm == $nome && $emailForm == $email) {
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/pessoa')
            . "';"
            . "alert('Usuário e Email já cadastrados!');"
            . "</script>";
            return true;
        } else if ($emailForm == $email) {
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/pessoa')
            . "';"
            . "alert('Email já cadastrado!');"
            . "</script>";
            return true;
        } else if ($nomeForm == $nome) {
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/pessoa')
            . "';"
            . "alert('Usuário já cadastrado!');"
            . "</script>";
            return true;
        }
        return false;
    }

    public function apagarUsuario() {
        $id = $this->input->get('id_usuario');
        $this->pessoa->apagarUsuario($id);
        echo "<script>"
        . "window.location.href = '"
        . base_url('admin/pessoa')
        . "';"
        . "alert('Excluido com sucesso!');"
        . "</script>";

        echo "<script>"
        . "window.location.href = '"
        . base_url('admin/noticia')
        . "';"
        . "alert('Você não tem permissão!');"
        . "</script>";
    }

    public function atualizarUsuarioForm() {
        $id = $this->uri->segment(4);
        $data['usuario'] = $this->pessoa->retornaUsuarioNumRowId($id);
        if ($data['usuario'] > 0) {
            $data['usuario'] = $this->pessoa->retornaUsuariosId($id);
            $data['editar'] = $this->uri->segment(4);
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/atualizarUsuario', $data);
            $this->load->view('admin/footer');
        } else {
            redirect(base_url('admin/noticia/inicioAdmin'));
        }
    }

    public function atualizarUsuario() {
        $senha = $this->input->post('senha');
        $data['nome'] = $this->input->post('nome');
        $data['email'] = $this->input->post('email');
        $data['flativo'] = $this->input->post('flativo');
        $data['nivel_usuario'] = $this->input->post('nivel_usuario');
        $data['descricao_usuario'] = $this->input->post('descricao_usuario');
        if ($senha != "") {
            $data['senha'] = md5($senha);
        }

        $data['nivel_usuario'] = $this->input->post('nivel_usuario');
        $id = $this->input->post('id_usuario');
        $imagem = $_FILES['imagem-usuario'];

        if ($imagem['name'] == null) {
            $data['imagem'] = $this->input->post('imagem-usuario_original');
            $this->pessoa->atualizarUsuario($id, $data);

            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/pessoa/listarUsuario')
            . "';"
            . "alert('Usuário alterado com sucesso!');"
            . "</script>";
        } else {
            $imagem = $_FILES['imagem-usuario'];

            $data['imagem'] = $imagem['name'];
            $configuracao = array(
                'upload_path' => 'assets/imgs/usuarios/',
                'allowed_types' => 'jpg', 'png',
                'file_name' => $data['imagem'],
            );
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            if ($this->upload->do_upload('imagem-usuario')) {

                //função NA MODEL PARA INSERÇÃO NO BD
                $this->pessoa->atualizarUsuario($id, $data);
                echo "<script>"
                . "window.location.href = '"
                . base_url('admin/pessoa/listarUsuario')
                . "';"
                . "alert('Usuário alterado com sucesso!');"
                . "</script>";
            } else {
                echo "<script>"
                . "window.location.href = '"
                . base_url('admin/pessoa/listarUsuario')
                . "';"
                . "alert('Formato de Imagem Inválido!');"
                . "</script>";
            }
        }
    }

    public function listarUsuario() {
        if ($this->pessoa->verificaNivelUsuarioLogado() == 1) {
            $data['usuario'] = $this->pessoa->retornaUsuarios();
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/exibirUsuario', $data);
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

}
