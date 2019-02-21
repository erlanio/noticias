<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Pessoa extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function inserirUsuario($data) {
        $resultado = $this->db->insert('usuario', $data);
        return $resultado;
    }

    public function apagarUsuario($id) {
        $this->db->where('id_usuario', $id);
        $resultado = $this->db->delete('usuario');
        return $resultado;
    }

    public function atualizarUsuario($id, $data) {
        $this->db->where('id_usuario', $id);
        $resultado = $this->db->update('usuario', $data);
        return $resultado;
    }

    public function retornaUsuarios() {
        $this->db->order_by('id_usuario', 'desc');
        $resultado = $this->db->get('usuario');
        return $resultado->result();
    }

    public function retornaUsuariosId($id) {
        $this->db->where('id_usuario', $id);
        $resultado = $this->db->get('usuario');
        return $resultado->result();
    }

    public function retornaUsuarioNumRowId($id) {
        $this->db->where('id_usuario', $id);
        return $this->db->get('usuario')->num_rows();
    }

    public function verificaNivelUsuario($id) {
        $this->db->where('id_usuario', $id);
        $resultado = $this->db->get('usuario');
        return $resultado->result();
    }

    public function retornaUsuariosEmail($email) {
        $this->db->where('email', $email);
        $resultado = $this->db->get('usuario');
        return $resultado->result();
    }

    public function verificaNivelUsuarioLogado() {
        $id_pessoa = $this->session->userdata('usuario')->id_usuario;
        $nivelUsuario['usuario'] = $this->pessoa->retornaUsuariosId($id_pessoa);
        foreach ($nivelUsuario['usuario'] as $data) {
            $nivelUsuario = $data->nivel_usuario;
        }
        return $nivelUsuario;
    }

    public function retornaDadosEquipe() {
        $this->db->where('flAtivo', 1);
        $this->db->order_by('id_usuario');
        $resultado = $this->db->get('usuario');
        return $resultado->result();
    }

}
