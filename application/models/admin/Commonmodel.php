<?php
Class Commonmodel extends CI_Model
{

    //Get store product details get_store_product_details()
    //Get base quantity product get_base_quantity_product($store_id,$productId);

	public function __construct()
	{ 
        parent::__construct(); 
    }

    public function list_companies() {
        $this->db->select('*');
        // $this->db->where('n_id', $company_id);
        $this->db->from('tbl_company');
        $query = $this->db->get();
        return $query->result_array();
    }

    public  function list_companies_by_id($company_id) {
        $this->db->select('*');
        $this->db->where('n_id', $company_id);
        $this->db->from('tbl_company');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function list_purposes() {
        $array = array(
            'Person meeting' => 'In Personal Meeting',
            'business meeting' => 'Business Meeting',
            'vendor supplier' => 'Vendor / Supplier',
            'delivery pickup' => 'Delivery / Pickup',
            'interview' => 'Interview',
            'others' => 'Others'
        );
        return $array;
    }
    public function get_company_name($company_id) {
        $this->db->select('company_name');
        $this->db->from('tbl_company');
        $this->db->where('n_id', $company_id);
        $query = $this->db->get();
        $row = $query->row_array();
        return ($row && isset($row['company_name'])) ? $row['company_name'] : null;
    }
    public function getUsersCount() {
        $this->db->select('n_id'); // Select only the store_product_id
        $this->db->from('tbl_company'); // Your table name
        return $this->db->count_all_results(); 
    }

    public function list_users($company_id){
        $this->db->select('*');
       $this->db->where('company_id',$company_id);
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function insert_users($data){
		$this->db->insert('users', $data);
	}

    public function getUserDetailsbyid($user_id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('userid', $user_id);
		$query = $this->db->get();
		return $query->row_array();
	}

    public function update_user_details($data,$userid){
		$this->db->where('userid', $userid);
        $this->db->update('users', $data);
	}
    public function DeleteUser($id){
        $this->db->where('userid ', $id);
        return $this->db->delete('users');
    }
    public function ChangePassword($data,$user_id) {
        $this->db->where('userid', $user_id);
        $this->db->update('users', $data);
        return $this->db->affected_rows() > 0;
    }


    public function get_company_id_by_token($token){
        $this->db->select('n_id');
        $this->db->from('tbl_company');
        $this->db->where('company_code', $token);
        $query = $this->db->get();
        $row = $query->row_array();
        // print_r($row); exit;
        // return $row['n_id'];
        return ($row && isset($row['n_id'])) ? $row['n_id'] : null;
    }

    public function get_company_code($company_id){
        $this->db->select('company_code');
        $this->db->from('tbl_company');
        $this->db->where('n_id', $company_id);
        $query = $this->db->get();
        $row = $query->row_array();
        
        return $row['company_code'];
        

    }

    public function get_company_logo($company_id){
        $this->db->select('company_logo');
        $this->db->from('tbl_company');
        $this->db->where('n_id', $company_id);
        $query = $this->db->get();
        return $this->db->last_query();
        $row = $query->row_array();
        return ($row && isset($row['company_logo'])) ? $row['company_logo'] : null;
        // return $row['company_logo'];
    }

   public function getCompanyusers($company_id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('company_id', $company_id);
        $query = $this->db->get();
        return $query->result_array();
   }



 

/*************  ✨ Windsurf Command ⭐  *************/
/*******  21265c74-5c61-4d8a-85e5-ac1b4fa46238  *******/
   public function get_user_name($company_id,$user_id){
    $this->db->select('UserName');
    $this->db->from('users');
    $this->db->where('userid', $user_id);
    $this->db->where('company_id', $company_id);
    $query = $this->db->get();
    $row = $query->row_array();
    return ($row && isset($row['UserName'])) ? $row['UserName'] : null;
   }


   public function get_company_address($user_id){
    $this->db->select('userAddress');
    $this->db->from('users');
    $this->db->where('userid', $user_id);
    $query = $this->db->get();
    $row = $query->row_array();
    return ($row && isset($row['userAddress'])) ? $row['userAddress'] : null;
    // return $row['userAddress'];
}





// public function get_user_reports($company_id,$from_date,$to_date,$users_id){
//     $this->db->select('*');
//     $this->db->from('user_activity');
//     if ($from_date !== '' && $to_date !== '' && $users_id !== 'all') {
//         // All three filters
//         $this->db->where('date >=', $from_date);
//         $this->db->where('date <=', $to_date);
//         $this->db->where('user_id', $users_id);
//     } elseif ($from_date !== '' && $to_date !== '') {
//         $this->db->where('date >=', $from_date);
//         $this->db->where('date <=', $to_date);
//     } elseif ($from_date !== '' && $to_date === '') {
//         $this->db->where('date', $from_date);
//     }
//     $query = $this->db->get();
//      return $query->result_array();

// }

// public function get_user_reports($company_id, $from_date, $to_date,$users_id) {
//     $this->db->select('*');
//     $this->db->from('user_activity');
//     // Get today's date
//     $today = date('Y-m-d');

//     // Company filter
//     $this->db->where('company_id', $company_id);

//     // If both from_date and to_date have values
//     if ($from_date !== '' && $to_date !== '') {
//         echo "from date and to date", $from_date, $to;
//         $this->db->where('date >=', $from_date);
//         $this->db->where('date <=', $to_date);
//     }

//     // If only from_date has a value, use from_date to today
//     elseif ($from_date !== '' && $to_date === '') {
//         echo "from date", $from_date;
//         $this->db->where('date >=', $from_date);
//     }

//     // If only to_date has a value, use all dates up to to_date
//     elseif ($from_date === '' && $to_date !== '') {
//         echo "from date", $to_date;
//         $this->db->where('date <=', $to_date);
//     }

//     // If neither has a value, default to today
    
//     // User filter
//     if ($users_id !== '' && $users_id !== 'all') {
//         $this->db->where('user_id', $users_id);
//     } 

//     $query = $this->db->get();
//     return $query->result_array();
// }


public function get_user_reports($company_id, $from_date, $to_date, $users_id) {
    $this->db->select('*');
    $this->db->from('user_activity');

    // Company filter
    $this->db->where('company_id', $company_id);

    // Date filter logic
    if (!empty($from_date) && !empty($to_date)) {
       // echo "Getting records BETWEEN $from_date AND $to_date<br>";
        $this->db->where('date >=', $from_date);
        $this->db->where('date <=', $to_date);
    } elseif (!empty($from_date)) {
       // echo "Getting records ONLY ON from_date = $from_date<br>";
        $this->db->where('date', $from_date); 
    } elseif (!empty($to_date)) {
       // echo "Getting records ONLY ON to_date = $to_date<br>";
        $this->db->where('date', $to_date); // 
    } else {
        $today = date('Y-m-d');
      //  echo "Getting records ONLY ON today = $today<br>";
        $this->db->where('date', $today);
    }

    // User filter
    if (!empty($users_id) && ($users_id !== 'all')) {
        // echo "Filtering by user_id = $users_id<br>";
        $this->db->where('user_id', $users_id);
        $this->db->where('company_id', $company_id);
    } 
    $query = $this->db->get();
    return $query->result_array();
}

public function get_enquiry_reports($company_id, $from_date) {
   
 $this->db->select('*');
    $this->db->from('tbl_enquiry');
    $this->db->where('company_id', $company_id);

    if (!empty($from_date)) {
        $this->db->where('date', $from_date);
    }

    $query = $this->db->get();
    return $query->result_array();
}








public function get_user_count($company_id){
    $this->db->select('user_count');
    $this->db->where('n_id', $company_id);
    $this->db->from('tbl_company');
    $query = $this->db->get();
    return $query->row_array();
      return $row['user_count'];
}
public function get_users_count($company_id, $roleid) {
    $this->db->where('company_id', $company_id);
    
    if ($roleid !== 1) {
        $this->db->where('userroleid !=', 1); // exclude role_id 1
    }

    return $this->db->count_all_results('users');
}








//     public function get_store_product_details($store_id,$productId)
//     {
//         $this->db->select('*');
//         $this->db->from('store_wise_product_assign');
//         $this->db->where('store_id', $store_id);
//         $this->db->where('store_product_id', $productId);
//         $query = $this->db->get();
//         return $query->row_array();
//     }
//     public function get_base_quantity_product($store_id, $productId) {
//         $this->db->select('GREATEST(FLOOR(MIN(variant_value)), 1) AS variant_value'); // Ensure min value is at least 1
//         $this->db->from('store_variants');
//         $this->db->where([
//             'store_id' => $store_id,
//             'store_product_id' => $productId
//         ]);
//         $query = $this->db->get();
    
//         if ($query->num_rows() > 0) {
//             return $query->row()->variant_value; // Return the minimum variant_value
//         }
//         return null; // Return null if no record found
//     }
	

// 	public function fetchtopmenu()
// 	{
		
// 		$query		= "SELECT module.modulecode, module.moduleid, module.modulename,module.icon
//                        FROM module 
// 		               WHERE module.moduletype = 'Topmenu' AND module.is_active = 1";
		
// 		$query = $this->db->query($query);
// 		$rows=$this->db->affected_rows();
//         if($rows >0)
//         {
//             return $query->result_array();
//         }
//         else
//         {
//             return ;
//         }		
// 	}
//     public function fetcleftmenu()
// 	{
		
// 		$query		= "SELECT module.modulecode, module.moduleid, module.modulename,module.icon
//                        FROM module 
// 		               WHERE module.moduletype = 'Leftmenu' AND module.is_active = 1";
		
// 		$query = $this->db->query($query);
// 		$rows=$this->db->affected_rows();
//         if($rows >0)
//         {
//             return $query->result_array();
//         }
//         else
//         {
//             return ;
//         }		
// 	}
	
//     public function fetchaccessmodules($roleid)
//     {
//         // $query		= "SELECT privilege.mainModules
//         //                FROM privilege 
//         //                WHERE privilege.roleid = '".$roleid."'";
//         $query		= "SELECT module.modulecode, module.moduleid, module.modulename,module.icon
//         FROM module 
//         WHERE module.moduletype = 'Topmenu' AND module.is_active = 1";
//         $query = $this->db->query($query);
//         $rows=$this->db->affected_rows();
//         if($rows >0)
//         {
//         return $query->result_array();
//         }
//         else
//         {
//         return ;
//         }		
//     }

//     public function fetchuserDetails($roleID,$loginID)
//     {
//         $query="SELECT * from users";
//         $query.=" WHERE userid='".$this->loginID."'";
//         $query = $this->db->query($query);
//         $rows = $this->db->affected_rows();
    
//             if($rows!=0)
//             {
//                 return $query->result_array();
//             }
//             else
//             {
//                 return;
                
//             }
//     }

    
//     public function fetch_notifications($login_user){
//         $this->db->select('id,title');
// 		$this->db->from('notification');
// 		$this->db->where('reciever',$login_user );
// 		$this->db->where('status',0 );
// 		 $this->db->order_by('id','desc');

// 		$query = $this->db->get();
//         return $query->result_array();
//     }

//     public function productsCount(){
//         $query = $this->db->query("SELECT COUNT(*) AS product_count FROM product");
//         $result = $query->row();
//         return $result->product_count;
//     }
//     public function Clientscount(){
//         $query = $this->db->query("SELECT COUNT(*) AS store_count FROM store");
//         $result = $query->row();
//         return $result->store_count;
//     }

//     public function pendingfollowup(){
//         $today = date('Y-m-d'); 
//         $after_30_days = date('Y-m-d', strtotime('+30 days')); 
//         // print_r( $after_30_days); exit;
//         $this->db->select('store_id, store_name, next_followup_date'); // Select relevant columns
//         $this->db->from('store');
//         $this->db->where('next_followup_date =',$after_30_days);
//         $query = $this->db->get();
//         return $query->result_array();


//         $this->db->select('id, name, email, next_followup_date');
//         $this->db->from('clients');
//         $this->db->where('next_followup_date >=', date('Y-m-d'));
//         $this->db->where('next_followup_date <=', date('Y-m-d', strtotime('+30 days')));
//         $query = $this->db->get();
//         return $query->result_array();
        
//         // $result = $query->row();
//         // return $result->store_count;
//     }


    
//     public function completedOrder(){
//          // Filter for completed orders
//         $this->db->from('order'); // Specify the table
//         $this->db->where('is_paid', 1);
//         return $this->db->count_all_results();
//     }


//     public function todayOrder($logged_in_store_id){
//         $today = date('Y-m-d');
//         // Filter for completed orders
//        $this->db->from('order'); // Specify the table
//        $this->db->where('store_id',$logged_in_store_id);
//        $this->db->where('Date(date)',$today);
//        return $this->db->count_all_results();
//    }

//    public function totalAmount($logged_in_store_id){
//     // $today = date('Y-m-d');
//     // Filter for completed orders
//     $this->db->select_sum('total_amount');
//    $this->db->from('order'); // Specify the table
//    $this->db->where('store_id',$logged_in_store_id);
//    $query = $this->db->get();
//    $result = $query->row();
   
//    return $result->total_amount ?? 0; 
// //    $this->db->where('Date(date)',$today);
// //    return $this->db->count_all_results();
// }


// public function todayAmount($logged_in_store_id){
//     $today = date('Y-m-d');
//     // Filter for completed orders
//     $this->db->select_sum('total_amount');
//    $this->db->from('order'); // Specify the table
//    $this->db->where('store_id',$logged_in_store_id);
//    $this->db->where('Date(date)',$today);
//    $query = $this->db->get();
//    $result = $query->row();
   
//    return $result->total_amount ?? 0; 
// //    $this->db->where('Date(date)',$today);
// //    return $this->db->count_all_results();
// }


//     public function pendingOrder(){
//         // Filter for completed orders
//        $this->db->from('order'); // Specify the table
//        $this->db->where('is_paid', 0);
//        return $this->db->count_all_results();
//    }

//     public function get_clients_total(){
//         $this->db->select('*');
//         $this->db->from('customer');
//         $this->db->where('is_active',1);
//         $query = $this->db->get();
//         return $query->num_rows();
//     }

}	
?>