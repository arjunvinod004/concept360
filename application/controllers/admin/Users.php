<?php
class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('admin/Enquirymodel');
        $this->load->model('admin/Commonmodel');
        $this->load->library('pagination');
    }

    public function index()
	{
        $controller = $this->router->fetch_class(); // Gets the current controller name
		$method = $this->router->fetch_method();   // Gets the current method name
		$data['controller'] = $controller;
        $logged_store_id=$this->session->userdata('logged_in_store_id');
        $config['base_url'] = site_url('admin/Users/index');
        $config['total_rows'] = $this->Commonmodel->getUsersCount();
        $config['per_page'] = 2; // number of rows per page
        $config['uri_segment'] = 4; // which URI segment contains the page numberg
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['prev_link'] = '<span class="pagination-previous">Previous</span>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '<span class="pagination-next">Next</span>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        // Custom icons for first and last links
        $config['first_link'] = '<span class="pagination-first">First</span>'; // First link icon
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '<span class="pagination-last">Last</span>'; // Last link icon
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0; // Get the current page number
        // $id = $this->input->post('id');
        // print_r($id);
        $company_id=$this->session->userdata('logged_in_company_id');
		$role_id = $this->session->userdata('roleid'); // Role id of logged in user
		$user_id = $this->session->userdata('loginid'); // Loged in user id
		    //echo $company_id;
		$store_disp_name = $this->Commonmodel->get_company_name($company_id);
		$store_address = $this->Commonmodel->get_company_address($user_id);
        $get_user_name = $this->Commonmodel-> get_user_name($company_id,$user_id);
        //   print_r($company_id);
        $data['company_id'] = $company_id;
        $list_companies = $this->Commonmodel->list_companies_by_id($company_id);
         $company_code = $this->Commonmodel->get_company_code($company_id);
         $user_count = $this->Commonmodel->get_user_count($company_id);
         $get_all_users_count= $this->Commonmodel->get_users_count($company_id,$role_id);
         $store_logo = $this->Commonmodel->get_company_logo($company_id);
        // print_r($get_all_users_count);
      
        $data['companies'] = array_slice($list_companies, $page,);
        $data['pagination'] = $this->pagination->create_links();
        $date =date('Y-m-d');
        $data['date'] =$date;
         $data['company_code'] = $company_code;
         $data['unread_count']= $this->Enquirymodel->get_unread_count($company_id);
         $data['user_count'] = $user_count;
         $data['get_all_users_count'] = $get_all_users_count;
        //  print_r($data['get_all_users_count']);
         $data['role_id'] = $role_id;
         $data['get_user_name'] = $get_user_name;
        $data['store_disp_name'] = $store_disp_name;
        $data['store_address'] = $store_address;
        $data['support_no'] = "9841234567";
        $data['support_email'] ="test@.com";
		$data['store_logo'] = $store_logo;
		$this->load->view('admin/includes/header',$data);
        $this->load->view('admin/includes/owner-dashboard',$data);
        $this->load->view('admin/company/companies',$data);
		$this->load->view('admin/includes/footer');
	}


    public function save(){
        $company_id = $this->input->post('user_company_id');
        $this->load->library('form_validation'); 
        // $this->form_validation->set_rules('user_name', 'Name', 'required');
        // $this->form_validation->set_rules('user_email', 'Email', 'required'); 
        // $this->form_validation->set_rules('user_address', 'Address', 'required');    
        // $this->form_validation->set_rules('user_phoneno', 'Phone', 'required');   
        $this->form_validation->set_rules('user_username', 'username', 'required');   
        $this->form_validation->set_rules('user_password', 'password', 'required'); 
        $this->form_validation->set_rules('role', 'role', 'required');  
        
        // $this->form_validation->set_rules(
        //     'user_phoneno',
        //     'Phone Number',
        //     'required|regex_match[/^[0-9]{10}$/]',
        //     ['regex_match' => 'The Phone Number must be exactly 10 digits.']
        // );
        
        // $this->form_validation->set_rules(
        //     'user_email',
        //     'Email',
        //     'required|valid_email|regex_match[/^[a-zA-Z0-9._%+-]+@gmail\.com$/]',
        //     ['regex_match' => 'The Email must be a valid @gmail.com address.']
        // );


        if ($this->form_validation->run() == FALSE) {
            // If validation fails, send errors back to the view
            $response = [
                'success' => false,
                'errors' => [
                    // Uncomment the fields you want to validate
                    // 'user_name' => form_error('user_name'),
                    // 'user_email' => form_error('user_email'),
                    // 'user_address' => form_error('user_address'),
                    // 'user_phoneno' => form_error('user_phoneno'),
                    'user_username' => form_error('user_username'),
                    'user_password' => form_error('user_password'),
                    'role' => form_error('role'),
                ]
            ];
        
            echo json_encode($response);
        } 
        

        // if ($this->form_validation->run() == FALSE) {
        //     // If validation fails, send errors back to the view
        //     $response = [
        //         'success' => false,
        //         'errors' => [
        //             // 'user_name' => form_error('user_name'),
        //             // 'user_email' => form_error('user_email'),
        //             // 'user_address' => form_error('user_address'),
        //             // 'user_phoneno' => form_error('user_phoneno'),
        //             'user_username' => form_error('user_username'),
        //             'user_password' => form_error('user_password'),
        //             'role' => form_error('role'),
                   
        //         ]
        //     ];


        //  echo json_encode($response);
        // } 

        else 
        {

         

            $data = array(
                'userroleid' => $this->input->post('role'),
                'company_id' =>$company_id ,
                // 'Name' => $this->input->post('user_name'),
                // 'userEmail' => $this->input->post('user_email'),
                'UserName' => $this->input->post('user_username'),
                'UserPassword' =>md5(trim($this->input->post('user_password'))),
                // 'UserPhoneNumber' => $this->input->post('user_phoneno')?? null,
                // 'userAddress' => $this->input->post('user_address'),
                'is_active' => 1
            );

            $this->db->where('UserName', $data['UserName']);
            $this->db->or_where('UserPassword', $data['UserPassword']);
            $query = $this->db->get('users');
        
            if ($query->num_rows() > 0) {
                echo json_encode(['success' => false, 'errors' => 'Username or password exists']);
            } 
            else{
                $this->Commonmodel->insert_users($data);
                echo json_encode(['success' => 'success']);
            }


          

          


            // $this->db->where('UserName', $data['UserName']);
            // $this->db->or_where('UserPassword', $data['UserPassword']);
            // $query = $this->db->get('users');
            // if ($query->num_rows() > 0) 
            // {
            //     echo json_encode(['success' => false, 'errors' => 'Username or Email already exists']);
            // } else 
            // {
            //     // Insert the user since no duplicate was found
            //     $this->Commonmodel->insert_users($data);
            //     echo json_encode(['success' => 'success']);
            // }        
        }
    }



    public function getUserDetails()
    {
        $user_id = $this->input->post('edit_user_id');
        $user_details = $this->Commonmodel->getUserDetailsbyid($user_id); 
        if (!$user_details || !is_array($user_details)) 
        {
            echo json_encode([
                'success' => false,
                'message' => 'Invalid enquiry_details data.'
            ]);
            return;
        }
        $result = [
                'userroleid' => $user_details['userroleid'] ?? null,
                'Name' => $user_details['Name'],
                'UserEmail' => $user_details['UserEmail'],
                'UserName' => $user_details['UserName'],
                'UserPassword' => $user_details['UserPassword'],
                'UserPhoneNumber' => $user_details['UserPhoneNumber']?? null,
                'UserAddress' => $user_details['UserAddress'],
        ];
        echo json_encode([
            'success' => true,
            'data' => $result
        ]);
    }

    public function updateUserdetails(){
        $userid = $this->input->post('edit_user_id');
        $data = array(
                'userroleid' => $this->input->post('role'),
                // 'Name' => $this->input->post('user_name'),
                // 'UserEmail' => $this->input->post('user_email'),
                'userName' => $this->input->post('user_username'),
                'userPassword' => $this->input->post('user_password'),
                // 'UserPhoneNumber' => $this->input->post('user_phoneno')?? null,
                // 'UserAddress' => $this->input->post('user_address'),
        );

        //  print_r($data);
        $this->Commonmodel->update_user_details($data,$userid);
        echo json_encode(['success' => 'success','data'=>$data]);
    }

    public function DeleteUser(){
        $id=$this->input->post('id');
        $this->Commonmodel->DeleteUser($id);
        $this->session->set_flashdata('error','User deleted successfully');
    }

    public function ChangePassword(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password_changes', 'Password', 'required|min_length[4]|max_length[20]|callback_valid_password');
    
        if ($this->form_validation->run() === FALSE) {
            $response = [
                'success' => false,
                'errors' => [
                    'password_changes' => form_error('password_changes'),
                ]
            ];
            echo json_encode($response);
        } 
        else{
    
            $user_id= $this->input->post('user_password_change');
            $data=array(
                'userid'=> $user_id,
                'userPassword'=>md5(trim($this->input->post('password_changes')))
            );
            $passwordchanges= $this->Commonmodel->ChangePassword($data,$user_id);
            echo json_encode(['success' => 'success', 'message' => 'Success']);
        }
    }




    public function valid_password($password) {
        if (empty($password)) {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');
            return false;
        }
        if (!preg_match('/[A-Z]/', $password)) {
            $this->form_validation->set_message('valid_password', 'The {field} must contain at least one uppercase letter.');
            return false;
        }
        if (!preg_match('/[a-z]/', $password)) {
            $this->form_validation->set_message('valid_password', 'The {field} must contain at least one lowercase letter.');
            return false;
        }
        if (!preg_match('/[0-9]/', $password)) {
            $this->form_validation->set_message('valid_password', 'The {field} must contain at least one numeric digit.');
            return false;
        }
        if (!preg_match('/[\W]/', $password)) {  // Corrected here: added underscore in preg_match
            $this->form_validation->set_message('valid_password', 'The {field} must contain at least one special character.');
            return false;
        }
        return true; // Password meets all criteria
    }


    public function get_users_by_company_id(){
        $company_id = $this->input->post('company_id');
		$date = $this->input->post('date');	
        $role_id = $this->session->userdata('roleid'); // Role id of logged in user
		$Companyusers = $this->Commonmodel->getCompanyusers($company_id);
        //  print_r($Companyusers);
		// Initialize the table structure
		$table = '';
		$table .= '<table class="table table-striped mt-3" id="examplee" style="width:100%">';
		$table .= '<thead>';
		$table .= '<tr>';
		$table .= '<th scope="col"> NO.</th>';
        $table .= '<th scope="col">UserName</th>';
		$table .= '<th scope="col">Role</th>';
		$table .= '<th scope="col">Actions</th>';
		$table .= '</tr>';
		$table .= '</thead>';	
		$table .= '<tbody>';
        $count = 1; // Initialize count before the loop
		// Assume $deliveryReports is an array containing multiple rows of sales report data
		if (!empty($Companyusers) ) {
			foreach ($Companyusers as $users) {
                if ($users['userroleid'] == 1) {
                    continue; 
                }
				$table .= '<tr>';
                $table .= '<td>' . $count++ . '</td>';
				$table .= '<td>' .$users['UserName'] . '</td>';
                $table .= '<td>';
                switch ($users['userroleid']) {
                    case 1: $table .= "Admin"; break; 
                    case 2: $table .= "Admin"; break;
                    case 3: $table .= "User"; break;
                    case 6: $table .= "Kitchen"; break;
                    default: $table .= "Unknown Role"; break;
                }
                $table .= '</td>';
				$table .= '<td>';

$table .= '<button class="btn tblEditBtn pl-0 pr-0 edit-user" type="button" 
    data-bs-toggle="modal"
    data-id="' . htmlspecialchars($users['userid']) . '" 
    data-bs-target="#edituser"
    title="Edit User">
    <i class="fa fa-edit"></i>
</button>';

// Show delete button only for role_id == 1
if ($role_id == 1) {
    $table .= '<button class="btn tblDelBtn pl-0 pr-0 delete-user" type="button" 
        data-id="' . htmlspecialchars($users['userid']) . '" 
        data-bs-toggle="modal" 
        data-bs-target="#deleteuser"
        title="Delete User">
        <i class="fa fa-trash"></i>
    </button>';
}

// Password change button (always shown)
$table .= '<button class="btn tblLogBtn pl-0 pr-0 password-change" type="button" 
    data-id="' . htmlspecialchars($users['userid']) . '" 
    data-bs-toggle="modal" 
    data-bs-target="#passwordchange"
    title="Password Change">
    <i class="fas fa-key"></i>
</button>';

$table .= '</td>';


				$table .= '</tr>';
			}
		} else {
			// Handle the case where there's no data
			$table .= '<tr>';
			$table .= '<td colspan="4" class="text-center">No sales data available.</td>';
			$table .= '</tr>';
		}

		// Close the table structure
		$table .= '</tbody>';
		$table .= '</table>';

		// Echo the table
		echo $table;



    }


}
?>