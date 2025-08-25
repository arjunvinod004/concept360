<?php
class Approved extends CI_Controller {

    //Load enquiry page list - index()
    //Load add enquiry page - add()
    //Load edit enquiry page - edit()
    //Save new enquiry - save()
    //Update enquiry - update()
    //Delete enquiry - delete()


    public function __construct() {
        
        parent::__construct();
        $this->load->model('admin/Enquirymodel');
        $this->load->model('admin/Commonmodel');
        $this->load->library('pagination');
    }

    public function success(){
        $this->load->view('admin/success');
    }

    public function index()
	{
        // print_r($company_code); exit;
        $controller = $this->router->fetch_class(); // Gets the current controller name
		$method = $this->router->fetch_method();   // Gets the current method name
		$data['controller'] = $controller;
        //  print_r($data['controller']);
        $company_id = $this->session->userdata('logged_in_company_id');
		$role_id = $this->session->userdata('roleid'); // Role id of logged in user
		$user_id = $this->session->userdata('loginid'); // Loged in user id
        // print_r($data['controller']); exit;
        $logged_store_id=$this->session->userdata('logged_in_store_id');
        $config['base_url'] = site_url('admin/Enquiry/index');
        // $config['total_rows'] = $this->Enquirymodel->getEnquiryCount($company_id);
        // $config['base_url'] = base_url() . $controller .;
        //  print_r($config['base_url']); 
        $config['per_page'] =5 ; // number of rows per page
        $config['uri_segment'] = 4; // which URI segment contains the page numberg
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['prev_link'] = '<span class="pagination-previous">Previous</span>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '<span class="pagination-next">Next</span>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="application-navigation__a application-navigation__a--active page-link" href="#">';
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
        //$data['products'] = $this->Enquirymodel->shopAssignedProductsbyPagination($config['per_page'], $page);
        $company_id = $this->session->userdata('logged_in_company_id');
        // print_r($company_id);
         $company_code = 1;
		$role_id = $this->session->userdata('roleid'); // Role id of logged in user
		$user_id = $this->session->userdata('loginid'); // Loged in user id
		// echo $user_id; exit;
		$store_disp_name = $this->Commonmodel->get_company_name($company_id);
		$store_address = $this->Commonmodel->get_company_address($user_id);
        $get_user_name = $this->Commonmodel-> get_user_name($company_id,$user_id);
        $all_approved_enquiries = $this->Enquirymodel->approved_enquiry_details($company_id);
        // print_r($all_enquiries);
       
        $store_logo = $this->Commonmodel->get_company_logo($company_id);
		// echo $store_logo; exit;
        // print_r($company_code);
        // $data['company_code'] = $company_code;
        $data['all_companies'] = $this->Commonmodel->list_companies();
        $data['purposes'] = $this->Commonmodel->list_purposes(); //print_r($data['purposes']);
        // $config['per_page']
        $data['all_approved_enquiries'] = array_slice($all_approved_enquiries, $page, $config['per_page'], $company_code);
        //  print_r($data['enquiries']);
         $data['pagination'] = $this->pagination->create_links();
        $date =date('Y-m-d');
        $data['date'] =$date;
        $data['store_disp_name'] =$store_disp_name;
        $data['store_address'] = $store_address;
        $data['support_no'] = "9841234567";
        $data['support_email'] ="test@.com";
		$data['store_logo'] =$store_logo;
        $data['role_id'] = $role_id;
        $data['unread_count']= $this->Enquirymodel->get_unread_count($company_id);
        $data['completed_count']= $this->Enquirymodel->get_completed_count($company_id);
        $data['company_code']=$company_code;      
        $data['get_user_name'] = $get_user_name;
        //  print_r($data['unread_count']);
        
        $this->load->view('admin/includes/header',$data);
        $this->load->view('admin/includes/owner-dashboard',$data);
		$this->load->view('admin/approved_enquiry',$data);
		$this->load->view('admin/includes/footer');
     
      
     
        
        
       // $data['currentStock'] =$this->Ordermodel->getCurrentStock( $product_ids_string,$date,$logged_store_id);
// 		$this->load->view('admin/includes/header',$data);
//         $this->load->view('admin/includes/owner-dashboard',$data);
//         // $this->load->view('admin/includes/user-dashboard',$data);
// 		$this->load->view('admin/enquiry/enquiries',$data);
// 		$this->load->view('admin/includes/footer');
	}

   

    public function delete(){

	    $this->Enquirymodel->delete_enquiry($this->input->post('id'));
		$this->session->set_flashdata('error','Category deleted successfully');
	}





   

    public function add($token = null) {
        $expire_time = $this->session->userdata('data_expire');

        if ($expire_time && time() < $expire_time) {
          redirect('admin/Enquiry/success'); 

        }
            $data['token'] = $token;
            $id = $this->Commonmodel->get_company_id_by_token($token);
            $user_id = $this->session->userdata('loginid'); // Loged in user id
            // echo $user_id; exit;
            $company_id = $this->session->userdata('logged_in_company_id');
            $store_disp_name = $this->Commonmodel->get_company_name($company_id);
            $store_address = $this->Commonmodel->get_company_address($user_id);
            $store_logo = $this->Commonmodel->get_company_logo($user_id);
            $data['selected_company'] = $id;
            // print_r($data['selected_company']);
            $controller = $this->router->fetch_class(); // Gets the current controller name
            $method = $this->router->fetch_method();   // Gets the current method name
            $data['controller'] = $controller;
            $data['companies']=$this->Commonmodel->list_companies();
              if ($user_id) {
                $data['store_disp_name'] =$store_disp_name;
                $data['store_address'] = $store_address;
            }
            $data['support_no'] = "9841234567";
            $data['support_email'] ="test@.com";
            $data['store_logo'] = "logo image path";
            // $this->load->view('admin/includes/header',$data);
            $this->load->view('admin/includes/owner-dashboard',$data);
            $this->load->view('admin/enquiry/add-enquiry');
            // $this->load->view('admin/includes/footer');
    }


    public function save() {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('purpose_of_visit', 'purpose of visit', 'required');
        // $this->form_validation->set_rules('contact_person', 'contact person', 'required');
        $this->form_validation->set_rules('task_name', 'name', 'required');
         $this->form_validation->set_rules('due_date', 'Date', 'required');
    
        
        // if ($requires_company) {
        //     $this->form_validation->set_rules('company_name', 'company Name', 'required');
        // }
        
        if ($this->form_validation->run() == FALSE) {
            $errors = [
                'task_name' => form_error('task_name'),
                'due_date' => form_error('due_date'),
                'purpose_of_visit' => form_error('purpose_of_visit'),
            ];
            
            
            echo json_encode([
                'success' => false,
                'errors' => $errors
            ]);
            
        } else {
            $data = [
                'task_name' => $this->input->post('task_name'),
                'company_id' => 1,
                'purpose_of_visit' => $this->input->post('purpose_of_visit'),
                'is_approved' => 0,
                'date' => $this->input->post('due_date'),
            ];
            

            $this->Enquirymodel->insert_enquiry($data);
            // $this->session->set_userdata('enquiry_id', $this->db->insert_id());
            // $this->session->set_userdata('data_expire', time() + 60); // 120 seconds = 2 minutes
            echo json_encode(['success' => 'success']);

        
            
            // Check if visitor_name or email already exists
            // $this->db->where('visitor_name', $data['visitor_name']);
            // $this->db->or_where('email', $data['email']);
            // $query = $this->db->get('tbl_enquiry');
            
            // if ($query->num_rows() > 0) {
            //     echo json_encode([
            //         'success' => 'false', 
            //         'errors' => [
            //             'duplicate' => 'Name or Email already exists'
            //         ]
            //     ]);
            // } else {
            //     $this->Enquirymodel->insert_enquiry($data);
            //     echo json_encode(['success' => 'success']);
            // }
        }
    }


    public function approved(){
        $id = $this->input->post('id');
        $company_id = $this->session->userdata('logged_in_company_id');
        // $user_id = $this->session->userdata('loginid');
        $this->Enquirymodel->approved_enquiry($id,$company_id);
    }

    


    public function getEnquiryDetails() 
    {
            $id = $this->input->post('id');
            // print_r($id);
            $user_id = $this->session->userdata('loginid');
            $company_id = $this->session->userdata('logged_in_company_id');
            $get_user_name = $this->Commonmodel-> get_user_name($company_id,$user_id);

            // echo "$id"; exit;
           
            $enquiry_details = $this->Enquirymodel->getEnquiryDetailsById($id,$company_id,$user_id);
          

            // print_r($enquiry_details);
            $seen_by= $this->Enquirymodel->seen_enquiry($id,$company_id,$user_id);


           
            // print_r($seen_by);
            // Check if enquiry_details is valid
            if (!$enquiry_details || !is_array($enquiry_details)) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Invalid enquiry_details data.'
                ]);
                return;
            }

            $seen_by_db = trim($this->db->get_where('users', ['userid' => $enquiry_details['seen_by']])->row('UserName') ?? '');
            // Decide final display name
            if (!empty($enquiry_details['seen_by']) && $user_id == $enquiry_details['seen_by'] && !empty($get_user_name)) {
                $seen_by_name = $seen_by_db;
            } elseif (!empty($seen_by_db)) {
                $seen_by_name = $seen_by_db;
            } else {
                $seen_by_name = $get_user_name;
            }

            $result = [
                //$seen_by_name = $this->db->get_where('users', ['userid' => $enquiry_details['seen_by']])->row('UserName'),
                'created_date' => $enquiry_details['created_date'] ?? null,
                'visitor_name' => $enquiry_details['visitor_name'] ?? null,
                'phone_number' => $enquiry_details['phone_number'] ?? null,
                'email' => $enquiry_details['email'] ?? null,
                'company_id' => $enquiry_details['company_id'] ?? null,
                'purpose_of_visit' => $enquiry_details['purpose_of_visit'] ?? null,
                'contact_person' => $enquiry_details['contact_person'] ?? null,
                // 'remarks' => $enquiry_details['remarks'] ?? null,
                // 'visitor_message' => $enquiry_details['visitor_message'] ?? null,
                'company_name' => $enquiry_details['company_name'] ?? null,
                'seen_by' =>$seen_by_name
            ];

            if ($enquiry_details) {
                $currentDateTime = date('Y-m-d h:i:s A');
                $this->db->insert('user_activity', [
                    'user_id'     => $user_id,
                    'company_id'  => $company_id,
                    'date'        => $currentDateTime,
                    'activity'    => $get_user_name . ' viewed enquiry of ' . $enquiry_details['visitor_name'] . ' on ' . $currentDateTime,
                    'created_at'  => $currentDateTime,
                ]);
            }
            // Respond with success and data
            echo json_encode([
                'success' => true,
                'data' => $result
            ]);
    }
    public function updateEnquirydetails()
    {
            $productId = $this->input->post('enquiry_id_new');

                     $data = array(
                'visitor_name' => $this->input->post('visitor_name'),
                'phone_number' => $this->input->post('phone_number'),
                'email' => $this->input->post('email'),
                'company_id' => $this->input->post('company_id'),
                'purpose_of_visit' => $this->input->post('purpose_of_visit'),
                'contact_person' => $this->input->post('contact_person'),
                'remarks' => $this->input->post('remarks'),
                'visitor_message' => $this->input->post('visitor_message'),
                'is_read' => 0

            );

               $this->Enquirymodel->update_enquiry_details($data,$productId);
             $response = (['success' => 'success','data'=>$data]);
             echo json_encode($response);
    }

    public function DeleteEnquiry(){
	    $this->Enquirymodel->delete_enquiry($this->input->post('id'));
		$this->session->set_flashdata('error','Category deleted successfully');
	}

// Function to add a product with translations
public function categoryname_exists($country)
	{
		if ($this->Enquirymodel->check_categoryname_exists($country)) {
			$this->form_validation->set_message('categoryname_exists', 'The {field} is already taken.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

    public function searchproduct() {
        $company_id = $this->session->userdata('logged_in_company_id');
        $search = $this->input->post('value');
        $role_id = $this->session->userdata('roleid');
    
        $this->db->select('*');
        $this->db->from('tbl_enquiry');
    
        // Only apply search filters if search is not empty
        if (!empty($search)) {
            $this->db->group_start();
                $this->db->like('visitor_name', $search);
                $this->db->or_like('purpose_of_visit', $search);
                $this->db->or_like('contact_person', $search);
            $this->db->group_end();
        }
        $this->db->where('company_id', $company_id);
    
        $query = $this->db->get();
        $results = $query->result_array();
        $table = '';
        $table .= '<table class="table table-bordered mt-3" id="dataTables-example">';
        $table .= '<thead class="table-light">';
        $table .= '<tr>';
        $table .= '<th>Sl</th>';
        $table .= '<th>Visitor Name</th>';
        $table .= '<th>Purpose of Visit</th>';
        $table .= '<th>Contact Person</th>';
        
        if ($role_id == 1) {
            $table .= '<th>Actions</th>';
        }
    
        $table .= '</tr>';
        $table .= '</thead><tbody>';
    
        $count = 1;
    
        if (!empty($results)) {
            foreach ($results as $result) {
                $row_class = ($result['is_read'] == 0) ? 'highlight-read' : '';
                $is_admin = $role_id == 1 ||$role_id==2 ||$role_id==3;
                $edit_class = $is_admin ? 'edit-btn' : '';
                $modal_attrs = $is_admin ? 'data-bs-toggle="modal" data-bs-target="#Edit-dish"' : '';
    
                $table .= '<tr class="' . $edit_class . ' ' . $row_class . '" ' . $modal_attrs . ' data-id="' . $result['id'] . '">';
                $table .= '<td>' . $count++ . '</td>';
                $table .= '<td>' . htmlspecialchars($result['visitor_name']) . '</td>';
                $table .= '<td>' . htmlspecialchars($result['purpose_of_visit']) . '</td>';
                $table .= '<td>' . htmlspecialchars($result['contact_person']) . '</td>';
    
                if ($role_id == 1) {
                    $table .= '<td>
                        <button class="btn btn-danger btn-sm delete-user" type="button" 
                            data-bs-toggle="modal" 
                            data-bs-target="#delete-enquiry"
                            data-id="' . $result['id'] . '"
                            title="Delete User">
                            Delete
                        </button>
                    </td>';
                }
    
                $table .= '</tr>';
            }
        } else {
            $table .= '<tr><td colspan="7" class="text-center">No records found.</td></tr>';
        }
    
        $table .= '</tbody></table>';
    
        echo $table;
    }
    

    // public function searchproduct(){
    //     $company_id = $this->session->userdata('logged_in_company_id');
    //     $search = $this->input->post('value');
    //     $role_id = $this->session->userdata('roleid'); // Role id of logged in user

    //     if (!empty($search)) {
    //         $this->db->select('*');
    //         $this->db->from('tbl_enquiry'); // Use your actual table
    //         $this->db->group_start();
    //             $this->db->like('visitor_name', $search);
    //             $this->db->or_like('purpose_of_visit', $search);
    //             $this->db->or_like('contact_person', $search);
    //         $this->db->group_end();
    //         $this->db->where('company_id', $company_id);
    //         $query = $this->db->get();
    //         $results = $query->result_array();
    //         // print_r($results);
    
    //         $table = '';
    //         $table .= '<table class="table table-bordered mt-3 table-striped table-hover" id="dataTables-example">';
    //         $table .= '<thead class="table-light">';
    //         $table .= '<tr>';
    //         $table .= '<th>Sl</th>';
    //         $table .= '<th>Visitor Name</th>';
    //         $table .= '<th>Purpose of Visit</th>';
    //         $table .= '<th>Contact Person</th>';
            
    //         if ($role_id == 1) {
    //             $table .= '<th>Actions</th>';
    //         }
    //         $table .= '</tr>';
    //         $table .= '</thead>';
    //         $table .= '<tbody>';
            
    //         $count = 1;
            
    //         if (!empty($results)) {
    //             foreach ($results as $result) {
    //                 $row_class = ($result['is_read'] == 0) ? 'highlight-read' : '';
    //                 $is_admin = $role_id==1 || $role_id==2 || $role_id==3;
    //                 $edit_class = $is_admin ? 'edit-btn' : '';
    //                 $modal_attrs = $is_admin ? 'data-bs-toggle="modal" data-bs-target="#Edit-dish"' : '';
            
    //                 $table .= '<tr class="' . $edit_class . ' ' . $row_class . '" ' . $modal_attrs . ' data-id="' . $result['id'] . '">';
    //                 $table .= '<td>' . $count++ . '</td>';
    //                 $table .= '<td>' . htmlspecialchars($result['visitor_name']) . '</td>';
    //                 $table .= '<td>' . htmlspecialchars($result['purpose_of_visit']) . '</td>';
    //                 $table .= '<td>' . htmlspecialchars($result['contact_person']) . '</td>';
            
    //                 if ($role_id == 1) {
    //                     $table .= '<td>
    //                         <button class="btn btn-danger btn-sm delete-user" type="button" 
    //                             data-bs-toggle="modal" 
    //                             data-bs-target="#delete-enquiry"
    //                             data-id="' . $result['id'] . '"
    //                             title="Delete User">
    //                             Delete
    //                         </button>
    //                     </td>';
    //                 } else {
    //                     $table .= '<tr><td class="text-center">No records found.</td></tr>';
    //                 }
            
    //                 $table .= '</tr>';
    //             }
    //         } 
            
    //         $table .= '</tbody></table>';
            
    //         echo $table;
            
            



    // } 

    //     // echo $search;
    // }


    public function check_gmail($email)
{
    if (strpos($email, '@gmail.com') !== false) {
        return true;
    } else {
        $this->form_validation->set_message('check_gmail', 'The Email must be a @gmail.com address.');
        return false;
    }
}

}