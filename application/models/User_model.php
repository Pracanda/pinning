<?php 
class User_model extends CI_Model{
	function user_validate($data){
		$array = array('username' => $data['username'], 'password' => $data['password']);
		$this->db->where($array);
		$result=$this->db->get('user')->num_rows();
		return $result; 
 	}

 	function log_entry(){
 		$id=$this->db->select('id')->get_where('user',array('username'=>$this->session->userdata('user')))->result();
		$id=$id[0]->id;
 		$data = array(
  				'date'=>$this->input->post('date'),
				'start_time' => $this->input->post('start_time'),
				'end_time' =>$this->input->post('end_time'),
				'commitment' => $this->input->post('commitment'),
				'user_id'=>$id,
				'project_id' => $this->input->post('project_id')
				);
			 $this->db->insert("project_logs", $data);
  			if($this->db->affected_rows()>0){
  				return true;
  			}
  			else{
  				return false;
  			}
 	}
 	function change_password(){
		$this->db->where('password', sha1($this->input->post('current_password')));
		if($this->db->get('user')->num_rows() == 1){

			$data = array(
				'password' => sha1($this->input->post('new_password'))
			);

			$this->db->where('username', $this->session->userdata('user'));
			if($this->db->update('user', $data)){
				$this->session->set_userdata("password", sha1($this->input->post("new_password")));
				return true;
			}
			return false;
		}
		return "Invalid current password.";
	}
}