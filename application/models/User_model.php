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
}