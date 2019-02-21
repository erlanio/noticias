<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed'); // linha de proteção ao controller

class Video extends CI_Controller { // criação da classe Login

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Video', 'video');
    }

    public function index() {
        $data['videos01'] = $this->video->retornaVideos01();
        $data['videos02'] = $this->video->retornaVideos02();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/atualizarVideo', $data);
        $this->load->view('admin/footer');
    }

    public function atualizarVideo() {
        $link = $this->input->post('video01');
        $video = $this->input->post('what');
        $link = substr($link, (strlen($link) - 11), strlen($link));
        $data['link_video'] = $link;
        $this->video->atualizarVideo($video, $data);
        echo "<script>"
                . "window.location.href = '"
                . base_url('admin/video')
                . "';"
                . "alert('Alterado com Sucesso');"
                . "</script>";
    }

}
