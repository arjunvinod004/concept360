<?php
class Loginmodel extends CI_Model {
    // public function checkLogin()
    // {
    //     $username = $_POST['username'];
    //     $password = $_POST['login']['password'];
    //     $encrypt_password = md5($password);

    //     $sql = "SELECT * FROM users WHERE (UserName = ? OR UserEmail = ?) AND Is_Active = 1";
    //     $query = $this->db->query($sql, [$username, $password]);

    //     if ($query->num_rows() == 0) {
    //         echo "User not found or inactive.";
    //         exit;
    //     }

    //     $row = $query->row();

    //     echo "Password from DB: " . $row->UserPassword . "<br>";
    //     echo "Encrypted input password: " . $encrypt_password . "<br>";

    //     if (strtoupper($encrypt_password) == strtoupper($row->UserPassword)) {
    //         $this->db->insert('user_login_logout', [
    //             'user_id' => $row->userid,
    //             'company_id' => $row->company_id,
    //             'date' => date('Y-m-d'),
    //             'login_time' => date('Y-m-d H:i:s'),
    //             'logout_time' => '',
    //             'created_at' => date('Y-m-d H:i:s')
    //         ]);
    //         return $query->result_array();
    //     } else {
    //         echo "Password mismatch.";
    //         return;
    //     }
    // }



    public function checkLogin() 
{
    $password = $_POST['login']['password'];
    $encrypt_password = strtoupper(md5($password));
    $query = "SELECT * FROM users WHERE (UserName='".$_POST['username']."' OR UserEmail='".$_POST['login']['password']."') AND Is_Active='1'";
    $query = $this->db->query($query);
    $rows = $query->num_rows();
    
    // Check if any rows were returned before proceeding
    if($rows > 0) {
        $row = $query->row();
        
        // Now check password
        if($encrypt_password == strtoupper($row->UserPassword)) { 
            $currentDateTime = date('Y-m-d H:i:s A');
            
            $this->db->insert('user_activity', [
                'user_id'     => $row->userid,
                'company_id'  => $row->company_id,
                'date'        => $currentDateTime,
                'activity'    => $_POST['username'] . ' logged in on ' . $currentDateTime,
                'created_at'  => $currentDateTime,
            ]);
            
            return $query->result_array();
        }
    }
    
    // Return empty result for invalid login (either no user found or password mismatch)
    return [];
}
//     public function checkLogin()
//     {
//         //print_r($_POST);
//         $password = $_POST['login']['password'];
//         $encrypt_password = strtoupper(md5($password));
//         $query="SELECT * FROM users WHERE (UserName='".$_POST['username']."' OR UserEmail='".$_POST['login']['password']."') AND Is_Active='1'";
//         $query = $this->db->query($query);
//         // echo $this->db->last_query();exit;
//         $rows = $query->num_rows();
//     //  $rows = $this->db->affected_rows();
//         $row=$query->row();
//         //  echo "Password from DB: " . $row->UserPassword . "<br>";
//         // echo "Encrypted input password: " . $encrypt_password . "<br>";
//           // print_r($row); exit;
//         //  echo $rows;
        
//       if($encrypt_password == strtoupper($row->UserPassword))
// 	    {
// 	       // echo "User Password from DB: " . $row->UserPassword . "<br>";
//         //     echo "Encrypted Password (from input): " . $encrypt_password . "<br>";
//         $currentDateTime = date('Y-m-d H:i:s A');

// $this->db->insert('user_activity', [
//     'user_id'     => $row->userid,
//     'company_id'  => $row->company_id,
//     'date'        => $currentDateTime,
//     'activity'    => $_POST['username'] . ' logged in on ' . $currentDateTime,
//     // 'login_time'  => $currentDateTime,
//     // 'logout_time' => '',
//     'created_at'  => $currentDateTime,
// ]);

// 			// $this->db->insert('user_login_logout', [
// 			// 	'user_id' => $row->userid,
// 			// 	'company_id' => $row->company_id,
// 			// 	'date' => date('Y-m-d H:i:s'),
// 			// 	// 'login_time' => date('Y-m-d H:i:s'),
// 			// 	// 'logout_time' => '',
// 			// 	// 'created_at' => date('Y-m-d H:i:s')
// 			// ]);
// 			return $query->result_array();
// 		}
// 		else
// 		{
// 		   //  echo "Password mismatch.";
// 			return ;
// 		}
//     }

    public function emailValidate($email)
    {
        $query=$this->db->query("SELECT * from users where userEmail='".$email."'");
        if($query->num_rows() == 1)
        {
          return $query->row();
        }
        else
        {
          return false;
        }
    }

    public function updatePassword($data,$user_id)
    {
        $this->db->where('userid',$user_id);
        $this->db->update('users',$data);
    }

     // Password auto generation
	public function passwordGenerate()
	{
		// Random password generation
		$len=8;
		if($len < 8)
		$len = 8;

		//define character libraries - remove ambiguous characters like iIl|1 0oO
		$sets = array();
		$sets[] = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
		$sets[] = '0123456789';
		//$sets[]  = '@#$%&?';
		$password = '';    
		//append a character from each set - gets first 4 characters
		foreach ($sets as $set) {
		$password .= $set[array_rand(str_split($set))];
		}
		//use all characters to fill up to $len
		while(strlen($password) < $len) {
			//get a random set
			$randomSet = $sets[array_rand($sets)];				
			//add a random char from the random set
			$password .= $randomSet[array_rand(str_split($randomSet))]; 
		}			
		//shuffle the password string before returning!
		return  $pswd= str_shuffle($password);
	}
	public function get_notification_count($login_user){
		$this->db->select('id');
		$this->db->from('notification');
		$this->db->where('reciever',$login_user );
		$this->db->where('status',0 );
		$query = $this->db->get();
		return $query->num_rows();
	}
}
?>