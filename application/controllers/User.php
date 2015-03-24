<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->check_login();
	}

	function check_login(){
		$data = $this->session->userdata('user_logged_in');
		if(!isset($data) || $data != true){
			redirect("User_login");
		}
		else{
			$check = $this->db->get_where("user", array("username"=>$this->session->userdata("user"), "password"=>$this->session->userdata("password")))->num_rows();
			if($check != 1){
				redirect("User_login");
			}
		}
	}
	public function index()
	{
		$data = array(
			'id' => 'home',
			'title' => 'Home',
			'content' => 'user/home'
		);
		$this->load->view('user/includes/template', $data);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('User');
	}
}