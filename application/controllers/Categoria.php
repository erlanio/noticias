<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed'); // linha de proteção ao controller

class Categoria extends CI_Controller { // criação da classe Login

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Pessoa', 'pessoa');
        $this->load->model('Model_Noticia', 'noticia');
        $this->load->model('Model_Categoria', 'categoria');
        $data['categoria'] = $this->categoria->retornaCategoria();
        $this->load->view('header');
        $this->load->view('menu', $data);
    }

    function index($id) {
        
    }

    function noticias($id) {
        $id = urldecode(urldecode($id));

        $data['nome_categoria'] = $this->categoria->retornaCategoriaPorNome($id);
        foreach ($data['nome_categoria'] as $nome_categoria) {
            $nome_categoria->id_categoria;
        }



        if ($this->categoria->retornaCategoriaPorNome($id)) {

            $maximo = 4;
            $inicio = (!$this->uri->segment("4")) ? 0 : $this->uri->segment("4");
            $config['base_url'] = base_url('categoria/noticias/' . $id);
            $config['total_rows'] = $this->noticia->numNoticiasCategoria($id);
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
            $data['noticia_categoria'] = $this->noticia->retornaTodasNoticiasInnerCategoriaNome($id, $maximo, $inicio);
            $this->load->view('categoria', $data);
            $this->load->view('footer');
        } else {
            redirect(base_url('home'));
        }
    }

}
