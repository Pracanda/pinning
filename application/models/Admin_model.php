<?php 


class Admin_model extends CI_Model{
	function admin_validate($data){
		$array = array('username' => $data['username'], 'password' => $data['password']);
		$this->db->where($array);
		$result=$this->db->get('admin')->num_rows();
		return $result; 
 	}

	public function store_entry(){
		$data = array(
  					'client'=>$this->input->post('client'),
					'org' => $this->input->post('org'),
					'website' =>$this->input->post('website'),
					'date_deal' => $this->input->post('date_deal'),
					'hosting_expire' => $this->input->post('hosting_expire'),
					'domain_expire' => $this->input->post('domain_expire'),
					'dealer' => $this->input->post('dealer'),
					'contact' => $this->input->post('contact'),
					'email' => $this->input->post('email')
				);
			 $this->db->insert("client", $data);
  			if($this->db->affected_rows()>0){
  				return true;
  			}
  			else{
  				return false;
  			}
  		}

    public function create_user($data){
        $this->db->insert("user", $data);
        if($this->db->affected_rows()>0){
          return true;
        }
        else{
          return false;
        }
    }

  	public function client_edited(){
  		$cid=$this->input->post('cid');
  		$data = array(
  					'client'=>$this->input->post('client'),
					'org' => $this->input->post('org'),
					'website' =>$this->input->post('website'),
					'date_deal' => $this->input->post('date_deal'),
					'hosting_expire' => $this->input->post('hosting_expire'),
					'domain_expire' => $this->input->post('domain_expire'),
					'dealer' => $this->input->post('dealer'),
					'contact' => $this->input->post('contact'),
					'email' => $this->input->post('email')
				);
			$this->db->where('id',$cid)->update("client", $data);
  			if($this->db->affected_rows()>0){
  				return true;
  			}
  			else{
  				return false;
  			}
  	}

  	public function income_add(){
  		$data=array(
  			'client_name'=>$this->input->post('client'),
  			'dealed_price'=>$this->input->post('dealed_price'),
  			'advance_amount'=>$this->input->post('advance_amount'),
  			'received_by'=>$this->input->post('received_by'),
  			'due_amount'=>$this->input->post('due_amount')
  			);
  		$this->db->insert("income", $data);
  			if($this->db->affected_rows()>0){
  				return true;
  			}
  			else{
  				return false;
  			}
  	}
  	public function fund_add(){
  		$data=array(
  			'taken_by'=>$this->input->post('taken_by'),
  			'amount'=>$this->input->post('amount'),
  			'date'=>$this->input->post('date')
  			);
  		$this->db->insert("funding", $data);
  			if($this->db->affected_rows()>0){
  				return true;
  			}
  			else{
  				return false;
  			}
  	}
  	public function add_expense(){
  		$data=array(
  			'expense'=>$this->input->post('expense'),
  			'amount'=>$this->input->post('amount'),
  			'date'=>$this->input->post('date')
  			);
  		$this->db->insert("expense", $data);
  			if($this->db->affected_rows()>0){
  				return true;
  			}
  			else{
  				return false;
  			}
  	}
}
