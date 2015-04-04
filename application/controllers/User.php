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

	function projects(){
		$data = array(
			'id' => 'projects',
		);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('User');
	}

	public function create_log(){
		$data=array(
			'id'=>'log',
			'title'=>'select project',
			'content'=>'user/clients',
			'clients' => $this->db->get("client")->result()
		);
		$this->load->view('user/includes/template', $data);
	}

	function income_log(){
		$client = $this->db->get_where("client", array("id"=>$this->uri->segment(3)))->result();
		if(empty($client)){
			show_404();
		}
		$data = array(
			'id' => 'log',
			'title' => 'income log of '.$client[0]->client,
			'content' => 'user/income_log',
			'income' => $this->db->get_where("income", array("client_id"=>$client[0]->id))->result(),
			'client' => $client[0]
		);

		$this->load->view("user/includes/template", $data);
	}

	public function log_new(){
		$client = $this->db->get_where("client", array("id" => $this->uri->segment(3)))->result();
		if(empty($client)){
			show_404();
		}
		$data = array(
			'id' => 'log',
			'title' => 'log for '.$client[0]->client,
			'content' => 'user/create_logs',
			'client' => $client[0]
		);

		$this->load->view("user/includes/template", $data);
	}

	public function log_entry(){
		$result=$this->User_model->log_entry();
		if($result){
			$this->session->set_flashdata('success', 'Added Successfully');
			redirect('log/work/'.$this->input->post('project_id'));
		}
		else{
			$this->session->set_flashdata('error', 'Error! Try Again! ');
			redirect('log/work/'.$this->input->post('project_id'));
		}
	}

	public function my_profile(){
		$data=array(
			'id'=>'my-profile',
			'title'=>'my-profile',
			'content'=>'user/my_profile'
			);
		$this->load->view('user/includes/template', $data);
	}
	function change_password(){
		$confirm = $this->User_model->change_password();
		if($confirm === true){
			$this->session->set_flashdata('success', 'Password changed');
			redirect('myProfile');
		}
		else if($confirm === false){
			$this->session->set_flashdata('error', 'Error! Try again');
			redirect('myProfile');
		}
		else{
			$this->session->set_flashdata('error', 'Something went wrong! Try again');
			redirect('myProfile');
		}
	}
}