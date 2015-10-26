<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filmes extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('filmes_model');
        $this->load->helper('form');
    }
    
    public function index(){
        $this->load->view('filmes');
    }
    
    public function cadastrar(){
        $filme = new Filmes_model();
        $filme->setTitulo($this->input->post('titulo'));
        $filme->setAno($this->input->post('ano'));
        
        if ($filme->getAno() != NULL && $filme->getTitutlo() != NULL):
            $filme->save();
        endif;

        //$this->load->view('filmes');
        redirect('/');
    }
    
    public function editar(){
        $filme = new Filmes_model();
        $filme->setId($this->uri->segment(3));
        
        if ($filme->getId() != NULL):
            $filme = $filme->get_by_id($filme)->custom_row_object(0,'Filmes_model');        
            $this->load->view('filmes_editar', $filme);
        else:
            $filme->setId($this->input->post('id'));
            $filme->setTitulo($this->input->post('titulo'));
            $filme->setAno($this->input->post('ano'));
            
            $filme->save();
            
            //$this->load->view('filmes');
            redirect('/');
        endif;
        
    }
    
    public function excluir(){
        $filme = new Filmes_model();
        $filme->setId($this->uri->segment(3));
        
        $filme->delete();
        
        //$this->load->view('filmes');
        redirect('/');
    }

}