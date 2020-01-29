<?php 
class Login extends CI_Controller
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


	public function login()
	{
		if(isset($_POST['login']))
		{
				$kode_am = $this->input->post('kode_am');
				$password = $this->input->post('password');
			
			$data = array
			(
				'kode_am' => $kode_am,
				'password' => $password
			);

			$cek = $this->marketmodel->cekLogin("am",$data);
			if($cek)
			{
				$this->session->set_userdata(array('kode_am'=>$kode_am));
				$this->session->set_userdata(array('password'=>$password));		
				
				
				
			if ($cek->previlege == "SPV") 
				{
					$this->load->view('menu/menu');
				}
				else 
				{					
					$this->load->view('menu/menu');
				}
			}
			else
			{
				redirect('login?pesan=Gagal Login');
			}
			//error_reporting(0);
		}
	}
	public function logout(){
		$this->session->unset_userdata('kode_am');
		$this->session->set_flashdata('message','<script languange="javascript">window.alert("Anda telah logout")</script>');
		redirect ('login');
	}
	// public function register(){
	// 	$this->load->view('auth/register');
	// }
	// public function create_user(){
	// 	$user = array(
	// 		'name' => $this->input->post('name'),
	// 		'username' => $this->input->post('username'),
	// 		'email' => $this->input->post('email'),
	// 		'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
	// 	);
	// 	$this->usermodel->create($user);

	// 	$this->session->set_flashdata('message','<script languange="javascript">window.alert("register berhasil")</script>');
	// 	redirect('/auth');
	// }

}
 ?>