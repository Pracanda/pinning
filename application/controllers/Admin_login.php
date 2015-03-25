<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->check_login();
	}

	function check_login(){
		$data = $this->session->userdata('admin_logged_in');
		if(isset($data) && $data == true){
			$check = $this->db->get_where("admin", array("username"=>$this->session->userdata("admin"), "password"=>$this->session->userdata("password")))->num_rows;
			if($check == 1){
				redirect("home");
			}
		}
	}

	function index(){
		$data = array(
			'id'=>'login',
			'title' => 'Login'
		);
		$this->load->view('admin/login', $data);
	}
	public function user_login(){
			$data=array(
					'username'=>$this->input->post('username'),
					'password'=>sha1($this->input->post('password'))
				);
			$result=$this->Admin_model->admin_validate($data);
			if($result==1){
							$user_session = array(
							'admin_logged_in' => true,
							'admin' => $this->input->post('username'),
							'password'=>sha1($this->input->post('password'))
						);

						$this->session->set_userdata($user_session);

						redirect('home');
			}
			else{
				$this->session->set_flashdata('msg', 'username or password not matched! </br> Please sign in again!');
				redirect('home');
			}
	}
}