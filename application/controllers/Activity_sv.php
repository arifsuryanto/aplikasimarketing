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
        error_reporting(0);
    }

    // bagian sidebar plan
    public function index()
	{
        $data ['title'] = 'Marketing';
        $this->load->view ('sv/activity_sv_template/header',$data); 
        $this->load->view ('sv/activity_sv_template/sidebar',$data); 
        $this->load->view ('sv/activity_sv_template/topbar',$data); 
        $this->load->view ('sv/activity_sv/am',$data); 
        $this->load->view ('sv/activity_sv_template/footer',$data); 
    }
}
?>