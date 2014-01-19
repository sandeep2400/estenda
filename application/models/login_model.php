<?php
class Login_Model extends CI_Model
{
	public function validate($creds)
	{   
		$this->db->where('email', $creds['email']);
		$this->db->where('pswd', md5($creds['pwd']));
		$result = $this->db->get('membership');
		if ($result->num_rows == 1)	{ 
			  return true;
			}
		else {
				return false;
			}
	}
//-------------------------------------------------------
	public function write_data($signup)
	{		
		$this->db->set('fname', $signup['fname']);
		$this->db->set('lname', $signup['lname']);
		$this->db->set('email', $signup['email']);				
		$this->db->set('pswd', md5($signup['password']));
		$this->db->set('tel', $signup['tel']);
		$this->db->insert('membership');	
	}
//-------------------------------------------------------
	public function update_data($item)
	{		
		$data = array (
			'lname' => $item['lname'],
			'fname' => $item['fname'],
			'tel' => $item['tel'],

			);
		$this->db->where('email', $item['email']);
		$this->db->update('membership', $data);	
	}

//-------------------------------------------------------
	public function write_pass($account)
	{		
		$data = array (
			'password' => md5($account['password'])
			);
		$this->db->where('email', $account['email']);
		$this->db->update('membership', $data);	
	}
	
	public function getall()
	{	$this->db->select('lname, fname, tel, email');
		$this->db->order_by("lname", "asc"); 
		$result = $this->db->get('membership');
		if (!$result->num_rows() > 0) 
			{ echo ("No rows were found");
			}
		else
		{   foreach ($result->result() as $row)
				{ $data[] = $row;
				}
			return($data);
		}	
	}
}
?>