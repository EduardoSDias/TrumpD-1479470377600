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
class ItemModel extends CI_Model{
    //put your code here
    
    function ItemModel() {
	parent::__construct();
        $this->load->model('dao/itemDAO', 'dao');
        
    }

    // Le os dados submetidos pelo usuário 
    function ler_dados_post(){      
        $data = $this->input->post(NULL, TRUE);               
        $data['dataCadastro'] = date("Y-m-d H:i:s");
        $data['isAchadoDono'] = false;
        $data['img'] = $this->do_upload();
        return $data;
    }
    
    function ler_dados_get(){      
        $data['pesquisa'] = $this->input->get('pesquisa');
        $data['categoriaId'] = $this->input->get('categoriaId');
        
        return $data;
    }
    
    //insere item no banco de dados caso seja um item válido e envia email
    //caso exista um usuário cadastrado com a mesma categoria do item
    function insereItem(){
        $data = $this->ler_dados_post();
        $this->enviarEmail($data['categoriaId'], $data['nome']);
        $this->dao->inserir_item($data);
    }

    //grava a imagem na pasta imgItens (caso haja uma imagem) caso não, insere uma imagem padrão.
    function do_upload(){
        $config['upload_path']          = ('assets/img/');
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload('userfile'))
        {
            return 'assets/img/noimage.jpg';
        }
        else
        {
            return 'assets/img/' . $this->upload->data('file_name');
        }             
            
    }
    
    //lista todos os itens
    function lista_item(){
        return $this->dao->lista_item();
    }
    
    //Lista todas as categorias
    function lista_categoria(){
        return $this->dao->lista_categoria();
    }
    
    //pesquisa itens por nome ou categoria
    function pesquisa_item($pesquisa){
        return $this->dao->pesquisa_item($pesquisa);
    }
    
    //verifica se o usuário digitou algo para pesquisar o item
    function foi_pesquisada($getPesquisa){
        if(empty($getPesquisa['categoriaId']) && empty($getPesquisa['pesquisa'])){
            return false;
        }else {
            return true;
        }
    }
    
    //Atualiza o item informando que já tem dono
    function updateItem($id){
        $this->dao->updateItem($id);
    }
    
    //pesquisa usuarios com emails cadastrados por categoria
    function pesquisarUsuarioCategoria($id){
        return $this->dao->buscarUsuarioCategoria($id);
    }
        
    //envia email para todos os usuarios da categoria do item cadastrados
    function enviarEmail($categoriaId, $item){
        $data = $this->pesquisarUsuarioCategoria($categoriaId);
        if(!empty($data)){
            $this->load->helper('enviaEmail');
            foreach ($data as $email){            
                enviar($email['nome'], $email['email'], $item, $categoriaId, $email['categoriaNome']);
            }            
        }
    }

}
