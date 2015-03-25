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

	public function create_log(){
		$data=array(
			'id'=>'create-log',
			'title'=>'create-log',
			'project_id'=>$this->input->post('project'),
			'content'=>'user/create_logs'
			);
		$this->load->view('user/includes/template', $data);
	}
	public function log_entry(){
		$result=$this->User_model->log_entry();
		if($result){
			$this->session->set_flashdata('success', 'Added Successfully');
			redirect('log/'.$this->input->post('project_id'));
		}
		else{
			$this->session->set_flashdata('error', 'Error! Try Again! ');
			redirect('log/'.$this->input->post('project_id'));
		}
	}
}