<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data = array(
			'id' => 'home',
			'title' => 'Home',
			'content' => 'admin/home'
		);
		$this->load->view('admin/includes/template', $data);
	}
}
