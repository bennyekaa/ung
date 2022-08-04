<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Operator extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->model('Admin_model');
		$this->load->library('user_agent');
		date_default_timezone_set("Asia/Jakarta");
		// error_reporting(0);
		if ($this->session->userdata('level') != 'user' ){
			redirect('log');
		}
	}

	public function index(){
		// 
	}
}
?>