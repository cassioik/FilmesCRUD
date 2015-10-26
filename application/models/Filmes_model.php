<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filmes_model extends CI_Model {
    var $id;
    var $titulo;
    var $ano;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    
    public function getTitutlo(){
        return $this->titulo;
    }
    
    public function setAno($ano){
        $this->ano = $ano;
    }
    
    public function getAno(){
        return $this->ano;
    }
    
    public function save(){
        if ( isset( $this->id ) ) {
            $this->update();
        }else{
            $this->insert();
        }
    }
    
    public function insert(){
        $this->db->insert('tb_filmes', $this);
    }
    
    public function update(){
        $this->db->where('id', $this->id);
        $this->db->update('tb_filmes', $this);
    }
    
    public function delete(){
        $this->db->where('id', $this->id);
        $this->db->delete('tb_filmes');
    }
    
    public function get_by_id($filme=NULL){
        if ($filme != NULL):
            $this->db->where('id', $filme->id);
            return $this->db->get('tb_filmes');
        endif;
    }
    
    public function get_all($limit=0) {
        if ($limit > 0) $this->db->limit($limit);
        return $this->db->get('tb_filmes');
    }
    
}

/* End of file Filmes_model.php */
/* Location: ./libraries/models/Filmes_model.php */