<?php
class Getusersbyid extends CI_Controller {

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

    public function html(){
        $company_id = $this->input->post('id');
        $list_users = $this->Commonmodel->list_users($company_id);
        $this->output
        ->set_content_type('text/html')
        ->set_output("<h1>Hello</h1>");
        // // <h1>hello</h1>
        // echo "<h1>Hello</h1>";

        json_encode($this->output->get_output());

    

    }
}