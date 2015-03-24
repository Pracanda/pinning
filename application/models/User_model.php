<?php 
class User_model extends CI_Model{
	function user_validate($data){
		$array = array('username' => $data['username'], 'password' => $data['password']);
		$this->db->where($array);
		$result=$this->db->get('user')->num_rows();
		return $result; 
 	}
}