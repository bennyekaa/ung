<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->model('admin_model');
		// date_default_timezone_set("Asia/Jakarta");
		error_reporting(0);
	}

	public function index()
	{
		$data['nama_view'] = 'beranda/index';
		$data['panel_atas'] = true;
		$data['breadcrums'] = false;
		$data['var'] = false;
		$data['kategori'] = $this->admin_model->get_data('kategori')->result();
		$this->load->view('layout/front/app', $data);
	}

	public function atlas($kode)
	{
		$data['panel_atas'] = false;
		$data['next'] = false;
		$data['breadcrums'] = true;
		$data['var'] = true;
		$where = array('kode_kategori' => $kode);
		$data['content']['kategori'] = $this->admin_model->get_where('kategori', $where);
		$data['nama_view'] = 'beranda/beranda_next';
		// $data['content']['judulhalaman'] = $judul;
		// $data['content']['halaman'] = $hal;
		$data['berkas'] = $this->admin_model->getGambarKategori($kode);
		$this->load->view('layout/front/app', $data);
	}

	public function atlas_next($kode)
	{
		$data['breadcrums'] = false;
		$data['panel_atas'] = false;
		$data['next'] = false;
		$data['var'] = true;
		$data['kode_berkas'] = $kode;
		$where = array('kode_berkas' => $kode);
		$data['berkas'] = $this->admin_model->getGambar($where);
		$data['detailBerkas'] = $this->admin_model->get_detailData($kode);
		// $data['content']['kategori'] = $this->admin_model->get_detailData($kode);
		$data['nama_view'] = 'beranda/beranda_next_open';
		$this->load->view('layout/front/app', $data);
		// var_dump($data);
		// die();
		// $data['content']['judulhalaman'] = $judul;
	}

	public function saran()
	{

		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$pesan = $this->input->post('pesan');
		$data = array(
			'nama' 		=> $nama,
			'email'		=> $email,
			'subject' 	=> $subject,
			'pesan' 	=> $pesan
		);
		$this->admin_model->input_data($data, 'masukkan');
		$this->session->set_flashdata('success', 'Berhasil disimpan');
		redirect(base_url());
	}

	public function coba()
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$pesan = $this->input->post('pesan');
		$data = array(
			'nama' 		=> $nama,
			'email'		=> $email,
			'subject' 	=> $subject,
			'pesan' 	=> $pesan
		);
		$this->admin_model->input_data($data, 'masukkan');
		// $this->session->set_flashdata('success', 'Berhasil disimpan');
		// redirect(base_url());
	}
}
