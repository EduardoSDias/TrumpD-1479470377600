<?php 

class PerfilModel extends CI_Model{
	
	function PerfilModel() {
		parent::__construct();
		$this->load->model('dao/PerfilDAO', 'dao');
	}
	
	function lista_usuario(){
		return $this->dao->lista_usuario();
	}
	
	function getAddress($id){
		return $this->dao->getAddress($id);
	}
	
	function getUserProfile($id) {		
		return $this->dao->getUserProfile($id); 
	}
	
	private function validate() {
		$this->define_regras_validacao(); 
		return $this->form_validation->run();
	}
	
	private function le_dados_usuario_post(){
		$nome = $this->input->post("nome");
		$idade = $this->input->post("idade");
		$naturalidade = $this->input->post("naturalidade");
		return array('nome'=>$nome, 'idade'=>$idade,
				'naturalidade'=>$naturalidade
		);
	}
	
	private function le_dados_endereco_post(){
		$rua = $this->input->post("rua");
		$cidade = $this->input->post("cidade");
		return array('rua'=>$rua,'cidade'=>$cidade);
	}
	
	private function define_regras_validacao(){
		$this->form_validation->set_error_delimiters('<div class="alert-success">', '</div><br>');
		$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]', array('required'=>'Preencha o campo {field}'));
// 		$this->form_validation->set_rules('idade', 'Idade', 'callback_valida_idade');
		$this->form_validation->set_rules('naturalidade', 'Naturalidade', 'trim|required|max_length[150]', array('required'=>'Preencha o campo {field}'));
		$this->form_validation->set_rules('rua', 'Rua', 'trim|required|max_length[150]', array('required'=>'Preencha o campo {field}'));
		$this->form_validation->set_rules('cidade', 'Cidade', 'trim|required|max_length[150]', array('required'=>'Preencha o campo {field}'));
	}
	
	private function valida_idade($idade) {
		if($idade < 18){
			$this->form_validation->set_message('valida_idade', 'Usuario menor de idade');
			return false;
		}	
		if($idade > 70){
			$this->form_validation->set_message('valida_idade', 'Usuario velho demais');
			return false;
		}	
		return true;
	} 
	
	function dados_inseridos_com_sucesso() {
		if($this->validate()){
			$data = $this->le_dados_usuario_post(); 
			$this->db->insert('usuario', $data); 
			return true;
		}
		return false;
	} 
}