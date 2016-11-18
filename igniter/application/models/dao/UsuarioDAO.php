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
class usuarioDAO extends CI_Model{
    //put your code here
        
        function inserir_usuario($data) {            
            $this->db->insert('usuario', $data); 
            return true;		
	}
               
        
        function lista_categoria(){
            $sql = "SELECT * FROM categoria";
            $res = $this->db->query($sql);
            return $res->result_array();
	}

}
