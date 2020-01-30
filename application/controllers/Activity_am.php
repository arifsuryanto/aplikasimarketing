<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_am extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('kode_am'))
        {
            redirect('login?pesan=Silakan Login dahulu');
        }
        $this->load->model("modelActivity_am");
        
        

        error_reporting(0);
    }

    // bagian sidebar plan
    public function index()
	{
        // if($_POST['addPlan'])
		// {
        //     $name=$this->input->post('name');
        //     $type=$this->input->post('type');
        //     $customer=$this->input->post('customer');
        //     $stage=$this->input->post('stage');
        //     $note=$this->input->post('note');
        //     $data=array
		// 	(
		// 		'name'=>$name,
		// 		'type'=>$type,
		// 		'customer'=>$customer,
		// 		'stage'=>$stage,
		// 		'note'=>$note
        //     );
        //     $insert=$this->modelActivity->insertData('plans',$data);
		// 	if ($insert) 
		// 	{
		// 		redirect(base_url('activity/index'));
		// 	}
        // }
        $getPlan['plans']=$this->modelActivity_am->getJoinPlan("*","activity","type_act","stage",
        "customer","type_act.id_type=activity.id_type","stage.id_stage=activity.id_stage",
        "customer.id_customer=activity.id_customer","activity.done=0","time");
        $data ['title'] = 'Marketing';
        $this->load->view ('am/activity_template/header',$data); 
        $this->load->view ('am/activity_template/sidebar',$data); 
        $this->load->view ('am/activity_template/topbar',$data); 
        $this->load->view ('am/activity/plan',$getPlan,$data); 
        $this->load->view ('am/activity_template/footer',$data); 
    }
    public function activity()
    {
        $getActivity['activities']=$this->modelActivity_am->getJoinActivity("*","activity","type_act","stage",
        "customer","type_act.id_type=activity.id_type","stage.id_stage=activity.id_stage",
        "customer.id_customer=activity.id_customer","activity.done=1","time");


        $this->load->view ('am/activity_template/header',$data); 
        $this->load->view ('am/activity_template/sidebar',$data); 
        $this->load->view ('am/activity_template/topbar',$data); 
        $this->load->view ('am/activity/activity',$getActivity,$data); 
        $this->load->view ('am/activity_template/footer',$data);
    }
    public function profile()
    {
        $getProfile['profiles']=$this->modelActivity_am->getData("*","am",array('kode_am'=>$kode_am));
        $this->load->view ('am/activity_template/header',$data); 
        $this->load->view ('am/activity_template/sidebar',$data); 
        $this->load->view ('am/activity_template/topbar',$data); 
        $this->load->view ('am/activity/profile',$getProfile,$data); 
        $this->load->view ('am/activity_template/footer',$data);
    }
    public function customer()
    {
        $this->load->view ('am/activity_template/header',$data); 
        $this->load->view ('am/activity_template/sidebar',$data); 
        $this->load->view ('am/activity_template/topbar',$data); 
        $this->load->view ('am/activity/customer',$data); 
        $this->load->view ('am/activity_template/footer',$data);
    }
    
    public function get_autocomplete(){
		if (isset($_GET['term'])) {
            $result = $this->modelActivity_am->search_blog($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
            $arr_result[] = array(
                'label'			=> $row->nama_customer,
                'id'            => $row->id_customer
            );
             echo json_encode($arr_result);
		   	}
		}
    }
    
    
    public function update($id_activity)
	{
		$update = [	'id_activity' => $id_activity,'done' => '1',
	];
	$this->modelActivity_am->update($update);
    redirect(base_url('activity_am'));
    }
    
    public function getCust()
	{
        $data=$this->modelActivity_am->getCustomer();
        echo json_encode($data);
        
    }
    
    public function addCust()
    {
        $cust = array(
			'name_activity' => $this->input->post('name_activity'),
			'id_type' => $this->input->post('type'),
            'id_customer' => $this->input->post('id_customer'),
            'id_stage' => $this->input->post('stage'),
            'note' => $this->input->post('note'),
            'id_am' =>$this->session->userdata('id_am')
		);
        $this->modelActivity_am->addCustomer($cust);
        redirect('/Activity_am');
    }




    // Ganti jadi select-Option
    // public function autocomplete_type(){
	// 	if (isset($_GET['term'])) {
    //         $result = $this->modelActivity_am->search_type($_GET['term']);
	// 	   	if (count($result) > 0) {
	// 	    foreach ($result as $row)
    //         $arr_result[] = array(
    //             'label'			=> $row->type,
    //         );
    //          echo json_encode($arr_result);
	// 	   	}
	// 	}
	// }
    // public function autocomplete_stage(){
	// 	if (isset($_GET['term'])) {
    //         $result = $this->modelActivity_am->search_stage($_GET['term']);
	// 	   	if (count($result) > 0) {
	// 	    foreach ($result as $row)
    //         $arr_result[] = array(
    //             'label'			=> $row->stage,
    //         );
    //          echo json_encode($arr_result);
	// 	   	}
	// 	}
    // }
    
    
}
?>