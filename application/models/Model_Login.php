<?php
class Model_Login extends CI_Model{
    public function buscaPorEmailSenha($email, $senha){
        $this->db->where("email", $email);
        $this->db->where("senha", $senha);
        $usuario = $this->db->get("usuario");
        return $usuario->result();
    }
}