<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->check_login();
	}

	function check_login(){
		$data = $this->session->userdata('admin_logged_in');
		if(!isset($data) || $data != true){
			redirect("Admin_login");
		}
		else{
			$check = $this->db->get_where("admin", array("username"=>$this->session->userdata("admin"), "password"=>$this->session->userdata("password")))->num_rows();
			if($check != 1){
				redirect("Admin_login");
			}
		}
	}
	public function index()
	{
		$data = array(
			'id' => 'home',
			'title' => 'Home',
			'content' => 'admin/home'
		);
		$this->load->view('admin/includes/template', $data);
	}

	/*Company Profile*/
	public function company_profile(){
		$data=array(
			'id'=>'profile',
			'title'=>'profile',
			'content'=>'admin/company_profile'
			);
		$this->load->view('admin/includes/template', $data);
	}

	public function check_expiry(){
		$data = array(
			'id' => 'check-expiry',
			'title' => 'check-expiry',
			'content' => 'admin/check_expiry',
			'clients'=>$this->db->get("client")->result()
		);
		$this->load->view('admin/includes/template', $data);
	}

	public function my_client(){
		$data=array(
			'id'=>'myClient',
			'title'=>'myClient',
			'content'=>'admin/my_client',
			'clients'=>$this->db->order_by("id", "desc")->get("client")->result()
			);
		$this->load->view('admin/includes/template',$data);
	}
	public function my_account(){
		$data=array(
			'id'=>'myAccount',
			'title'=>'myAccount',
			'content'=>'admin/my_account',
			'income'=>$this->db->get("income")->result(),
			'fund'=>$this->db->get("funding")->result()
			);
		$this->load->view('admin/includes/template',$data);
	}

	public function add_client(){
		$data=array(
			'id'=>'add_client',
			'title'=>'add_client',
			'content'=>'admin/add_client'
			);
		$this->load->view('admin/includes/template',$data);
	}

	//add client
	public function store_entry(){
		$result=$this->Admin_model->store_entry();
		if($result){
			$this->session->set_flashdata('success', 'Added Successfully');
			redirect('myClient');
		}
		else{
			$this->session->set_flashdata('error', 'Error! Try Again! ');
			redirect('myClient');
		}
	}
	public function edit_client(){
		$data=array(
			'id'=>'edit-client',
			'title'=>'edit-client',
			'content'=>'admin/edit_client',
			'info'=>$this->db->get_where('client',array('id'=>$this->uri->segment(3)))->result()
			);
		$this->load->view('admin/includes/template',$data);
	}
	public function client_edited(){
		$result=$this->Admin_model->client_edited();
		if($result){
			$this->session->set_flashdata('success', 'Edeted Successfully');
			redirect('myClient');
		}
		else{
			$this->session->set_flashdata('error', 'Error!! Try Again.');
			redirect('myClient');
		}
	}
	public function add_income(){
		$data=array(
			'id'=>'add-income',
			'title'=>'add-income',
			'content'=>'admin/add_income'
			);
		$this->load->view('admin/includes/template',$data);
	}
	public function income_add(){
		$result=$this->Admin_model->income_add();
		if($result){
			$this->session->set_flashdata('success', 'Added Successfully');
			redirect('myAccount');
		}
		else{
			$this->session->set_flashdata('error', 'Error! Try Again! ');
			redirect('myAccount');
		}
	}
	public function fund(){
		$data=array(
			'id'=>'distribution',
			'title'=>'distribution',
			'content'=>'admin/fund'
			);
		$this->load->view('admin/includes/template',$data);
	}

	public function fund_add(){
		$result=$this->Admin_model->fund_add();
		if($result){
			$this->session->set_flashdata('success', 'Added Successfully');
			redirect('myAccount');
		}
		else{
			$this->session->set_flashdata('error', 'Error! Try Again! ');
			redirect('myAccount');
		}
	}
	public function add_expense(){
		$result=$this->Admin_model->add_expense();
		if($result){
			$this->session->set_flashdata('success', 'Added Successfully');
			redirect('myAccount');
		}
		else{
			$this->session->set_flashdata('error', 'Error! Try Again.');
			redirect('myAccount');
		}
	}

	public function admin_logout(){
			$this->session->sess_destroy();
			redirect('Home');
		}
	public function create_user(){
		$data=array(
			'id'=>'create-user',
			'title'=>'create-user',
			'content'=>'admin/create_user'
			);
		$this->load->view('admin/includes/template',$data);
	}
	public function creating_user(){
		$check=$this->db->get_where('user',array('username'=>$this->input->post('username')))->result();
		if(empty($check)){
			$pass=uniqid();
			$user=$this->input->post('username');
			$email=$this->input->post('email');
			$message="Username:".$user."Password:".$pass;
			if($this->sendEmail("pinesofts",$email,"user account",$message)){
				$data=array(
					'username'=>$user,
					'password'=>sha1($pass),
					'email'=>$email
					);
				$result=$this->Admin_model->create_user($data);
				if($result){
					$this->session->set_flashdata('success', 'Added Successfully');
					redirect('createUser');
				}
				else{
					$this->session->set_flashdata('error', 'Error! Try Again');
					redirect('createUser');
				}
			}
		}
		else{
			$this->session->set_flashdata('error', 'Username Already Taken!! Choose Another.');
			$this->session->set_flashdata('new_user', $this->input->post('username'));
			$this->session->set_flashdata('new_email', $this->input->post('email'));
			redirect('createUser');
		}
	}
	public function update_income(){
		$data=array(
			'id'=>'update-income',
			'title'=>'update-income',
			'income'=>$this->db->get_where('income',array('id'=>$this->uri->segment(3)))->result(),
			'content'=>'admin/update_income'
			);
		$this->load->view('admin/includes/template',$data);
	}

	public function income_updated(){
		$result=$this->Admin_model->income_updated();
		if($result){
			$this->session->set_flashdata('success', 'Edeted Successfully');
			redirect('myAccount');
		}
		else{
			$this->session->set_flashdata('error', 'Error!! Try Again.');
			redirect('myAccount');
		}
	}

	public function view_log(){
		$project=$this->input->post('project');
		$data=array(
			'id'=>'view-log',
			'title'=>'view-log',
			'log'=>$this->db->order_by('date','desc')->get_where('project_logs',array('project_id'=>$project))->result(),
			'content'=>'admin/home'
			);
		$this->load->view('admin/includes/template',$data);
	}

	function sendEmail($from,$to,$subject,$message){
		 $config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'smtp.sendgrid.net',
		  'smtp_user' => 'seansdaud',
		  'smtp_pass' => 'Mym@!ln0w',
		  'smtp_port' => 587,
		  'crlf' => "\r\n",
		  'newline' => "\r\n",
		  'mailtype' => "html"
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
		    
		    return true;
		}
		else {
		    $error=show_error($this->email->print_debugger());
		    return $error;
		  }
		
	}
}
