<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('download');
        $this->load->model('admin_model');
        // date_default_timezone_set("Asia/Jakarta");
        error_reporting(E_ALL);
	}

	public function index(){
		$data['page'] = 'dashboard';
        $data['berkas'] = $this->admin_model->get_data('berkas')->result();
		$this->load->view('layout/head');
		$this->load->view('layout/nav',$data);
		$this->load->view('v_admin/beranda');
		$this->load->view('layout/foot');
	}

	public function view_gambar(){
		// 
	}
}
