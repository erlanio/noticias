<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed'); // linha de proteção ao controller

class Login extends CI_Controller { // criação da classe Login

    public function index() {
        $this->load->view("admin/login");
    }

    public function autenticar() {
        $this->load->model('Model_Pessoa', 'pessoa');
        $this->load->model('Model_Login', 'login'); // chama o modelo usuarios_model
        $email = $this->input->post("usuario"); // pega via post o email que venho do formulario
        $senha = md5($this->input->post("senha")); // pega via post a senha que venho do formulario
        $usuario = $this->login->buscaPorEmailSenha($email, $senha); // acessa a função buscaPorEmailSenha do modelo        echo $email;

        if ($usuario) {
            $dados = $this->pessoa->retornaUsuariosEmail($email);

            if ($dados[0]->flativo == 1) {
                $registro = array('usuario' => $dados[0], 'usuario_logado' => true);
                $this->session->set_userdata($registro);
                redirect(base_url('admin/noticia/inicioAdmin'));
            } else {
                echo "<script>"
                . "window.location.href = '"
                . base_url('admin/login')
                . "';"
                . "alert('Usuário desativado!');"
                . "</script>";
            }
        } else {
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/login')
            . "';"
            . "alert('Email ou senha incorretos!');"
            . "</script>";
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('admin/login'));
    }

    public function recuperarSenha() {
        $this->load->model('Model_Pessoa', 'pessoa');
        $this->load->helper('string');
        $email = $this->input->post('usuario');
        $dados = $this->pessoa->retornaUsuariosEmail($email);
        $id;
        if ($dados) {
            foreach ($dados as $data) {
                $id = $data->id_usuario;
                $nome = $data->senha;
                $email = $data->email;
            }
            if ($this->pessoa->retornaUsuarioNumRowId($id) > 0) {
                $string_random = random_string('alnum', 10);

                $this->load->library('email');
                $this->configEmail();
                $this->email->from('erlanio.freire@urca.br', 'erlaniofreire');
                $this->email->to($email);
                $this->email->message('Dados para efetuar login '
                        . 'no sistema: Nome de Usuario: ' . $this->input->post('usuario') . ' || ' . 'Senha: ' . $string_random);
                if ($this->email->send()) {
                    $senhaCriptografada = md5($string_random);
                    $data2['senha'] = $senhaCriptografada;
                    $this->pessoa->atualizarUsuario($id, $data2);
                     echo "<script>"
                    . "window.location.href = '"
                    . base_url('admin/login')
                    . "';"
                    . "alert('Acesse o Email para recuperar a senha!');"
                    . "</script>";
                } else {
                    echo "<script>"
                    . "window.location.href = '"
                    . base_url('admin/login')
                    . "';"
                    . "alert('Ocorreu um erro tento novamente!');"
                    . "</script>";
                }
            }
        } else {
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/login')
            . "';"
            . "alert('Email informado não existe!');"
            . "</script>";
        }
    }

    public function esqueceuSenha() {
        $this->load->view('admin/recuperarSenha');
    }

    function configEmail() {
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '30';
        $config['smtp_user'] = 'erlanio.freire@urca.br';
        $config['smtp_pass'] = 'kurtcobain';
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
    }

}
