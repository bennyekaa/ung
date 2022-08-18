<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {
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
		$data['nama_view'] = 'beranda/index';
		$data['panel_atas'] = true;
		$data['breadcrums'] = false;
		$data['var'] = false;
		$this->load->view('layout/front/app',$data);
	}

	public function atlas($judul,$hal){
		$data['panel_atas'] = false;
		$data['next'] = false;
		$data['breadcrums'] = true;
		$data['var'] = true;
		$data['nama_view'] = 'beranda/beranda_next';
		$data['content']['judulhalaman'] = $judul;
		$data['content']['halaman'] = $hal;
		$this->load->view('layout/front/app', $data);
	}

}
