<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed'); // linha de proteção ao controller

class Contato extends CI_Controller { // criação da classe Login

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Contato', 'contato');
        $this->load->helper('uteis_helper');
        
    }

    public function inserirContato() {
        $data['nome'] = $this->input->post('nomeFormContato');
        $data['email'] = $this->input->post('emailFormContato');
        $data['mensagem'] = $this->input->post('mensagemFormContato');
         $data['assunto'] = $this->input->post('assuntoFormContato');
        $data['data_envio'] = date('y-m-d');


        $enviar = $this->contato->inserirContato($data);                
        echo "<script>"
        . "window.location.href = '"
        . base_url(' ')
        . "';"
        . "alert('Mensagem enviada com sucesso!');"
        . "</script>";
    }
    
     public function listarMensagens() {
        $data['mensagem'] = $this->contato->retornaContato(10);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('listarMensagem', $data);
        $this->load->view('admin/footer');
    }

    public function apagarMensagem() {                
        $id_mensagem = $this->input->get('id');
        $this->contato->apagarMensagem($id_mensagem);
                
        
    }
    
    

}
