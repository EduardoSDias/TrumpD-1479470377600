<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'My_Controller.php';

class Home extends My_Controller {

	public function index(){		
                $this->load->view('common/header.php');            
                redirect('/item/index');
                $this->load->view('common/footer.php');
	}      

        
}