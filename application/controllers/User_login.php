<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->check_login();
	}

	function check_login(){
		$data = $this->session->userdata('user_logged_in');
		if(isset($data) && $data == true){
			$check = $this->db->get_where("user", array("username"=>$this->session->userdata("user"), "password"=>$this->session->userdata("password")))->num_rows;
			if($check == 1){
				redirect("User");
			}
		}
	}

	function index(){
		$data = array(
			'id'=>'login',
			'title' => 'Login'
		);
		$this->load->view('user/login', $data);
	}
	public function user_login(){
			$data=array(
					'username'=>$this->input->post('username'),
					'password'=>sha1($this->input->post('password'))
				);
			$result=$this->User_model->user_validate($data);
			if($result==1){
							$user_session = array(
							'user_logged_in' => true,
							'user' => $this->input->post('username'),
							'password'=>sha1($this->input->post('password'))
						);

						$this->session->set_userdata($user_session);

						redirect('User');
			}
			else{
				$this->session->set_flashdata('msg', 'username or password not matched! </br> Please sign in again!');
				redirect('User');
			}
	}
}