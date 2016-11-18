<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'My_Controller.php';

class Item extends MY_Controller  {
	
	function Item(){
            parent::__construct();
            $this->load->model('ItemModel', 'i');
            $this->load->helper(array('form', 'url'));
	}
	
        //lista todos os itens cadastrados
	function index(){                       
            $title['title'] = "Todos os Itens";   
            $data['lista'] = $this->i->lista_item();
            $this->load->view('common/header', $title);
            $this->load->view('custom/lista_item.php', $data);            
            $this->load->view('common/footer');
	}
        
        //formulário de cadastrar um item
        function cadastrarItem(){
            $data['lista'] = $this->i->lista_categoria();            
            $title['title'] = "Cadastrar Item";   
            $this->load->view('common/header', $title);
            $this->load->view('custom/cadastraItem', $data);
            $this->load->view('common/footer');
        }
        
        //insere um item no banco e manda email caso exista necessidade 
        //redireciona para a página de listagem de todos os itens
        function insereItem(){
            $this->i->insereItem();
            redirect('item/index');
        }
        
        //Carrega a página de pesquisa e os Itens pesquisados
        function pesquisa_item(){
            $title['title'] = "Pesquisar por Item";            
            $pesquisa = $this->i->ler_dados_get();
            $data['categoria'] = $this->i->lista_categoria();
            
            $this->load->view('common/header', $title);
            $this->load->view('custom/pesquisar-form.php', $data);
            
            //verfica se foi digitado algo para pesquisar, caso sim, será carregada a listagem de item
            if($this->i->foi_pesquisada($pesquisa)){
                $item['lista'] = $this->i->pesquisa_item($pesquisa);
                $this->load->view('custom/lista_item.php', $item);//
            }
            
            $this->load->view('common/footer');
        }
        
        //Atualiza a lista de item quando um usuário informa que o item é dele
        function updateItem($id){
            $this->i->updateItem($id);
            redirect('item/index');
        }
        
}
