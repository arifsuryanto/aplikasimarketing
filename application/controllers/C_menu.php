<?php
/**
 * 
 */
class C_menu extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('marketmodel');
	}
	
	public function index(){
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/login');
		$this->load->view('template/footer');
	}
	public function menu()
	{
		if(isset($_POST['activity']))
		{
			$cek="SELECT previlege from am";
			if($cek=='SPV') 
				{
					$this->load->view('Activity_am/activity'); //activity SP
				}
		    else 
				{
					redirect(base_url('Activity_am/index'));
				}
		}
	}
	
}
?>