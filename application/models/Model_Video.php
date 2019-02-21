<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Video extends CI_Model {

    public function __construct() {
        parent::__construct();
        
    }

    public function atualizarVideo($id, $data) {
        $this->db->where('id_video', $id);
        $this->db->update('videos', $data);
        
    }
    
    public function retornaVideos01() {
        $this->db->where('id_video', 1);
        return $this->db->get('videos')->result();
    }
    
    public function retornaVideos02() {
        $this->db->where('id_video', 2);
        return $this->db->get('videos')->result();
    }

}
