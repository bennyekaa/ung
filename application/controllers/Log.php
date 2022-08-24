<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Log extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('admin_model');
		date_default_timezone_set("Asia/Jakarta");
		error_reporting(E_ALL);
	}

	public function index(){
		if($this->session->userdata('level')=='admin'){
			redirect ('admin');
		}else {
			$this->load->view('v_admin/login');
		}
	}
	public function do_login(){
		$data=(array('user'=>$this->input->post('username'),					 
			 'pass'=> md5($this->input->post('password'))
			 ));
		$datauser = $this->admin_model->get_user($data);
		// var_dump($datauser);
		// die();
		if($this->session->userdata('level')=='admin'){
			redirect ('admin');
		}else  {
			$this->session->set_flashdata('gagal','Cek username dan password'); 
			redirect('log');
		}
	}
	public function logout(){
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('log');
	}
}
?>