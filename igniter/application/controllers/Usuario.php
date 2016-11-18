<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'My_Controller.php';

class Usuario extends MY_Controller  {
	
	function Usuario(){
            parent::__construct();
            $this->load->model('UsuarioModel', 'u');
            $this->load->helper(array('form', 'url'));
	}
	
        //carrega for de cadastro do usuario
	function index(){                       
            $data['lista'] = $this->u->lista_categoria();            
            $title['title'] = "Cadastrar Email";   
            $this->load->view('common/header', $title);
            $this->load->view('custom/cadastraUsuario', $data);
            $this->load->view('common/footer');
	}
        
        //insere um usuário
        function insereUsuario(){
            $this->u->insereUsuario();
            redirect('item/index');
        }
        
        
}
