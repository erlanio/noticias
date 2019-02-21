<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Contato extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Inserircontato($data) {
        $this->db->insert('mensagem', $data);
    }

    public function retornaContato($limit = null) {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->order_by('id_mensagem', 'desc');
        $resultado = $this->db->get('mensagem');
        return $resultado->result();
    }
    
    public function apagarMensagem($id) {
        $this->db->where('id_mensagem', $id);
        $resultado = $this->db->delete('mensagem');
        return $resultado;
    }

}
