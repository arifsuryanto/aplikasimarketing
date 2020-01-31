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
        $this->load->library('form_validation');
        error_reporting(0);
    }

    // bagian sidebar plan
    public function index()
	{
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
        $kode_am=$_GET['kode_am'];
        $where=array('kode_am'=>$kode_am);
        $getProfile['profile']=$this->modelActivity_am->getData("*","am",$where);
        if($_POST['change'])
        {
            $id= $this->input->post('id_am');
            $kode_am=$this->input->post('kode_am');
            $name=$this->input->post('nama_am');
            $pass=$this->input->post('password');
            $where=array('kode_am'=>$kode_am);
            $data=array
            (
                'id_am'=>$id,
                'kode_am'=>$kode_am,
                'nama_am'=>$name,
                'password'=>$pass
            );
            $data['profile']=$this->modelActivity->updateData('am',$data,$where);
            
        }
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
    redirect(base_url('activity_am/index'));
    }
    
    public function getCust()
	{
        $data=$this->modelActivity_am->getCustomer();
        echo json_encode($data);
        
    }
    
    public function addPlan()
    {
        $plan = array(
			'name_activity' => $this->input->post('name_activity'),
			'id_type' => $this->input->post('type'),
            'id_customer' => $this->input->post('id_customer'),
            'id_stage' => $this->input->post('stage'),
            'note' => $this->input->post('note'),
            'id_am' =>$this->session->userdata('id_am')
		);
        $this->modelActivity_am->addCustomer($cust);
        redirect('/activity_am/index');
        
        $this->modelActivity_am->addPlan($plan);
        redirect('/Activity_am/index');
    }

    public function UpdatePlan()
    {
        $plan = [
            'id_activity' => $this->input->post('EditIdAct'),
			'name_activity' => $this->input->post('EditNameAct'),
			'id_type' => $this->input->post('EditType'),
            'id_customer' => $this->input->post('EditIdCust'),
            'id_stage' => $this->input->post('EditStage'),
            'note' => $this->input->post('EditNote'),
        ];
        $data['$plan'] =  $this->modelActivity_am->UpdatePlan($plan);
        redirect('/Activity_am/index');
        
    }
  

    
}
?>