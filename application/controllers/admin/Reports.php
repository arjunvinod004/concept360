<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Loginmodel');
		$this->load->model('admin/Enquirymodel');
		$this->load->model('admin/Commonmodel');
	}


    public function index()
	{
        $controller = $this->router->fetch_class(); // Gets the current controller name
		$method = $this->router->fetch_method();   // Gets the current method name
		$data['controller'] = $controller;
        // $logged_store_id=$this->session->userdata('logged_in_store_id');
        $company_id=$this->session->userdata('logged_in_company_id');
		$role_id = $this->session->userdata('roleid'); // Role id of logged in user
		$user_id = $this->session->userdata('loginid'); // Loged in user id
		$company_code = $this->Commonmodel->get_company_code($company_id);
		$Companyusers = $this->Commonmodel->getCompanyusers($company_id);
		    //echo $company_id;
		$store_disp_name = $this->Commonmodel->get_company_name($company_id);
		$store_address = $this->Commonmodel->get_company_address($user_id);
		$get_user_name = $this->Commonmodel-> get_user_name($company_id,$user_id);
		$store_logo = $this->Commonmodel->get_company_logo($company_id);
        // $reports= $this->Commonmodel->get_user_reports($company_id);
        // print_r($reports);
        $date =date('Y-m-d');
        $data['date'] =$date;
        $data['company_id'] = $company_id;
		$data['company_code'] = $company_code;
		$data['unread_count']= $this->Enquirymodel->get_unread_count($company_id);
		$data['Companyusers'] = $Companyusers;
		$data['get_user_name'] = $get_user_name;
        // $data['reports'] = $reports;

        
        $data['store_disp_name'] = $store_disp_name;
        $data['store_address'] = $store_address;
        $data['support_no'] = "9841234567";
        $data['support_email'] ="test@.com";
		$data['store_logo'] = $store_logo;
		$this->load->view('admin/includes/header',$data);
        $this->load->view('admin/includes/owner-dashboard',$data);
        $this->load->view('admin/reports',$data);
		$this->load->view('admin/includes/footer');
	}


    public function fetchUsersReport(){
		$user_id = $this->session->userdata('loginid'); // Loged in user id
		// echo $user_id;
        $company_id = $this->input->post('company_id');	
		$from_date = $this->input->post('from_date'); // Match JS
		$to_date = $this->input->post('to_date');     // Match JS
		$users_id = $this->input->post('users_id');   // Match JS
        // echo json_encode([$company_id, $from_date, $to_date, $users_id]);


        $reports= $this->Commonmodel->get_user_reports($company_id,$from_date,$to_date,$users_id);
        $table = '';
		$table .= '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
		$table .= '<thead>';
		$table .= '<tr>';
		$table .= '<th> NO.</th>';
		$table .= '<th>Activity</th>';

		$table .= '</tr>';
		$table .= '</thead>';	
		$table .= '<tbody>';
        $count=1;

		// Assume $deliveryReports is an array containing multiple rows of sales report data
		if (!empty($reports)) {
			foreach ($reports as $Report) {
				// $seen_by_name = $this->db->get_where('users', ['userid' => $Report['seen_by']])->row('UserName');
				//  print_r($seen_by_name);
				$table .= '<tr>';
                $table .= '<td>' .$count++ . '</td>';
				$table .= '<td>' .$Report['activity'] . '</td>';
				$table .= '</tr>';
			}
		} else {
			// Handle the case where there's no data
			$table .= '<tr>';
			$table .= '<td colspan="4" class="text-center">No  data available.</td>';
			$table .= '</tr>';
		}

		// Close the table structure
		$table .= '</tbody>';
		$table .= '</table>';

		// Echo the table
		echo $table;


       
    }

	public function fetchEnquiryReport(){
		$user_id = $this->session->userdata('loginid'); // Loged in user id
		// echo $user_id;
        $company_id = $this->input->post('company_id');	
		$from_date = $this->input->post('from_date'); 
		$to_date = $this->input->post('to_date');   
        // echo json_encode([$company_id, $from_date, $to_date]);

		$enquiry_report= $this->Commonmodel->get_enquiry_reports($company_id,$from_date,$to_date);
		// print_r($enquiry_report);
        $table = '';
		$table .= '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
		$table .= '<thead>';
		$table .= '<tr>';
		$table .= '<th> NO.</th>';
		$table .= '<th>Name</th>';
		$table .= '<th>Phone Number</th>';
		$table .= '<th>Email</th>';
		$table .= '<th>Purpose of visit</th>';
		$table .= '<th>contact_person</th>';

		$table .= '</tr>';
		$table .= '</thead>';	
		$table .= '<tbody>';
        $count=1;

		// Assume $deliveryReports is an array containing multiple rows of sales report data
		if (!empty($enquiry_report)) {
			foreach ($enquiry_report as $report) {
				// $seen_by_name = $this->db->get_where('users', ['userid' => $Report['seen_by']])->row('UserName');
				//  print_r($seen_by_name);
				$table .= '<tr>';
                $table .= '<td>' .$count++ . '</td>';
				$table .= '<td>' .$report['visitor_name'] . '</td>';
				$table .= '<td>' .$report['phone_number'] . '</td>';
				$table .= '<td>' .$report['email'] . '</td>';
				$table .= '<td>' .$report['purpose_of_visit'] . '</td>';
				$table .= '<td>' .$report['contact_person'] . '</td>';
				$table .= '</tr>';
			}
		} else {
			// Handle the case where there's no data
			$table .= '<tr>';
			$table .= '<td colspan="4" class="text-center">No  data available.</td>';
			$table .= '</tr>';
		}

		// Close the table structure
		$table .= '</tbody>';
		$table .= '</table>';

		// Echo the table
		echo $table;
	}
}


