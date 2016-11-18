<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Item
 *
 * @author Dias
 */
class UsuarioModel extends CI_Model{
    //put your code here
    
    function UsuarioModel() {
	parent::__construct();
        $this->load->model('dao/usuarioDAO', 'dao');
        
    }

    // Le os dados submetidos pelo usuário 
    function ler_dados_post(){      
        $data = $this->input->post(NULL, TRUE);               
        return $data;
    }
    
    //insere usuario no banco de dados caso seja um usuário válido
    function insereUsuario(){
        $data = $this->ler_dados_post();
        $this->dao->inserir_usuario($data);
    }
    
    function lista_categoria(){
        return $this->dao->lista_categoria();
    }
    

}
