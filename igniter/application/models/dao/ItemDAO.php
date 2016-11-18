<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of itemDAO
 *
 * @author Dias
 */
class itemDAO extends CI_Model{
    //put your code here

	function lista_item(){
            $sql = "SELECT i.*, c.nome categoria FROM item i "
                    . "inner join categoria c on c.categoriaId = i.categoriaId "
                    . "WHERE isAchadoDono = 0 "
                    . "order by i.itemId desc";
            $res = $this->db->query($sql);
            return $res->result_array();
	}
        
        //forma uma query hibrida que pode pesquisar por item,
        //por categoria ou pelos dois ao mesmo tempo
       function pesquisa_item($query){
           $item = $query['pesquisa'];
           $cat = $query['categoriaId'];
           
           if(!empty($item)){
               $item = "and i.nome like '%$item%'";
           }
           else{
               $item = "and i.nome is not null";
           }
           
           if(!empty($cat)){
               $cat = " and i.categoriaId = $cat";
           }
           else{
               $cat = "";
           }           
            
           $sql = "SELECT i.*, c.nome categoria FROM item i "
                    . "inner join categoria c on c.categoriaId = i.categoriaId "
                    . "WHERE isAchadoDono = 0  $item $cat";
            $res = $this->db->query($sql);
            return $res->result_array();
            
	}
        
        function inserir_item($data) {            
            $this->db->insert('item', $data); 
            return true;		
	}
               
        
        function lista_categoria(){
            $sql = "SELECT * FROM categoria";
            $res = $this->db->query($sql);
            return $res->result_array();
	}
        
        function updateItem($id){
            $sql = "UPDATE item set isAchadoDono = 1 where itemId = $id";
            $res = $this->db->query($sql);
        }
        
        function buscarUsuarioCategoria($id){
            $sql = "SELECT u.nome, u.email, c.nome categoriaNome, c.categoriaId"
                    . " FROM usuario u "
                    . "inner join categoria c on c.categoriaId = u.categoriaId "
                    . "WHERE u.categoriaId = $id";
            $res = $this->db->query($sql);
            return $res->result_array();
        }
}
