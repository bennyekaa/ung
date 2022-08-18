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
		$data['kategori'] = $this->admin_model->get_data('kategori')->result();
		$this->load->view('layout/front/app',$data);
	}

	public function atlas($kode){
		$data['panel_atas'] = false;
		$data['next'] = false;
		$data['breadcrums'] = true;
		$data['var'] = true;
		$data['nama_view'] = 'beranda/beranda_next';
		// $data['content']['judulhalaman'] = $judul;
		// $data['content']['halaman'] = $hal;
		$data['berkas'] = $this->admin_model->get_data('berkas')->result();
		$this->load->view('layout/front/app', $data);
	}

	public function atlas_next($judul,$hal,$kode){
		$data['panel_atas'] = false;
		$data['next'] = true;
		$data['breadcrums'] = true;
		$data['var'] = true;
		$data['nama_view'] = 'beranda/beranda_next_open';
		$data['content']['judulhalaman'] = $judul;
		$data['content']['halaman'] = $hal;

		$where = array('kode_berkas' => $kode);
		$data['berkas'] = $this->admin_model->getGambar($where);
		$data['detailBerkas'] = $this->admin_model->get_detailData($kode);

		$data['kode_berkas'] = $kode;

	}

}
