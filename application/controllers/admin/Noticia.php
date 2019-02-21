<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Noticia', 'noticia');
        $this->load->model('Model_Categoria', 'categoria');
        $this->load->model('Model_Pessoa', 'pessoa');
        $this->load->model('Model_Contato', 'mensagem');
        $this->load->helper('uteis_helper');
    }

    public function index() {
        $resultado['categoria'] = $this->categoria->retornaCategoria();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/inserirNoticia', $resultado);
    }

    public function inicioAdmin() {
        $data['num_acessos_total'] = $this->noticia->retornaAcessosTotal();
        $data['num_acessos_dia'] = $this->noticia->retornaAcessosDia();
        $data['totalNoticiasPublicadas'] = $this->noticia->retornaTotalNoticiasPublicadas();
        $data['categoria'] = $this->categoria->retornaCategoria();
        $data['usuario'] = $this->pessoa->retornaUsuarios();
        $data['totalNoticiasCategoria'] = $this->categoria->retornaCategoria();
        $data['topAcessos'] = $this->noticia->topAcessos(10);
        $data['noticia'] = $this->noticia->retornaTodasNoticiasAtivas(11);
        $data['mensagem'] = $this->mensagem->retornaContato(10);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/pagina-inicial', $data);
        $this->load->view('admin/footer');
    }

    public function inserirNoticia() {
        $data['id_categoria'] = $this->input->post('categoria');
        $data['id_usuario'] = $this->session->userdata('usuario')->id_usuario;
        $data['titulo'] = $this->input->post('titulo');
        $data['texto'] = $this->input->post('noticia');
        date_default_timezone_set('America/Sao_Paulo');
        $data['data_publicacao'] = date('y/m/d');
        $data['flAtivo'] = $this->input->post('flativo');
        $data['imagem'] = null;
        //PEGANDO IMAGEM DO FORMULÁRIO

        if (!isset($_FILES['imagem-noticia'])) {
            
        } else {
            $imagem = $_FILES['imagem-noticia'];
            $data['imagem'] = $imagem['name'];
            $configuracao = array(
                'upload_path' => 'assets/imgs/noticias/',
                'allowed_types' => 'jpg|jpeg|png',
                'file_name' => $imagem['name'],
            );
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            if ($this->upload->do_upload('imagem-noticia')) {
                $this->noticia->inserirNoticia($data);
                echo "<script>"
                . "window.location.href = '"
                . base_url('admin/noticia')
                . "';"
                . "alert('noticia cadastrada com sucesso!');"
                . "</script>";
            } else {
                echo "<script>"
                . "window.location.href = '"
                . base_url('admin/noticia')
                . "';"
                . "alert('Formato de imagem não suportado');"
                . "</script>";
                echo $this->upload->display_errors();
            }
        }
        $resultado['categoria'] = $this->categoria->retornaCategoria();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/inserirNoticia', $resultado);
        $this->load->view('admin/footer');
    }

    public function listarNoticias() {
        $maximo = 10;
        $inicio = (!$this->uri->segment("4")) ? 0 : $this->uri->segment("4");
        $config['base_url'] = base_url('admin/noticia/listarNoticias');
        $config['total_rows'] = $this->noticia->retornaNumNoticiasRows();
        $config['per_page'] = $maximo;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['first_tag_open'] = "<li>";
        $config ['first_tag_close'] = "</li>";
        $config['prev_link'] = "Anterior";
        $config ['prev_tag_open'] = "<li class='prev'>";
        $config ['prev_tag_close'] = "</li>";
        $config['next_link'] = "Próxima";
        $config ['next_tag_open'] = "<li class='next'>";
        $config['next_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li>";
        $config['num_tag_close'] = "</li>";


        $this->pagination->initialize($config);
        $data['paginacao'] = $this->pagination->create_links();


        $data['noticia'] = $this->noticia->retornaTodasNoticias($maximo, $inicio);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/exibirNoticias', $data);
        $this->load->view('admin/footer');
    }

    public function apagarNoticia() {
        $id_noticia = $this->input->get('id_noticia');
        $this->noticia->apagarNoticia($id_noticia);
    }

    public function editarNoticia() {
        $id_noticia = $this->uri->segment(4);
        $data['resultado'] = $this->categoria->retornaCategoria();
        $data['noticia'] = $this->noticia->retornaTodasNoticiasInnerCategoria($id_noticia);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/atualizarNoticia', $data);
        $this->load->view('admin/footer');
    }

    public function atualizarNoticia() {
        $id_noticia = $this->input->post('id_noticia');
        if (!$id_noticia) {
            redirect(base_url('admin/noticia/listarNoticias'));
        }
        $data['id_categoria'] = $this->input->post('categoria');
        $data['titulo'] = $this->input->post('titulo');
        $data['texto'] = $this->input->post('noticia');
        $data['flAtivo'] = $this->input->post('flativo');
        $data['imagem'] = $this->input->post('imagem-original');


        $imagem = (($_FILES['imagem-noticia']));
        if ($imagem['name'] == "") {
            $imagem['name'] = $data['imagem'];
            $this->noticia->atualizarNoticia($id_noticia, $data);
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/noticia/listarNoticias')
            . "';"
            . "alert('noticia alterada com sucesso!');"
            . "</script>";
        } else {
            $imagem = $_FILES['imagem-noticia'];
            $data['imagem'] = $imagem['name'];
            $configuracao = array(
                'upload_path' => 'assets/imgs/noticias/',
                'allowed_types' => '*',
                'file_name' => $imagem['name'],
            );
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            if ($this->upload->do_upload('imagem-noticia')) {
                $this->noticia->atualizarNoticia($id_noticia, $data);
                echo "<script>"
                . "window.location.href = '"
                . base_url('admin/noticia/listarNoticias')
                . "';"
                . "alert('noticia alterada com sucesso!');"
                . "</script>";
            } else {
                echo "<script>"
                . "window.location.href = '"
                . base_url('admin/noticia')
                . "';"
                . "alert('Formato de imagem não suportado - TENTE JPG');"
                . "</script>";
                echo $this->upload->display_errors();
            }
        }
    }

}
