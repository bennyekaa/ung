<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->model('admin_model');
		// $this->session->keep_flashdata('message');
		date_default_timezone_set("Asia/Jakarta");
		// error_reporting(E_ALL);
		if ($this->session->userdata('level') != 'admin' ){
			redirect('log');
		}
	}

	//beranda
	public function index()
	{
		$data['page'] = 'dashboard';
		$data['berkas'] = $this->admin_model->get_data('berkas')->result();
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/beranda');
		$this->load->view('layout/foot');
	}
	
	public function beranda_next($kode)
	{
		$where = array('kode_berkas' => $kode);
		$data['berkas'] = $this->admin_model->getGambar($where);
		$data['detailBerkas'] = $this->admin_model->get_detailData($kode);
	
		$data['kode_berkas'] = $kode;
		
	
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/beranda_next', $data);
		$this->load->view('layout/foot');
	}

	//gambar utama
	public function gambar()
	{
		$data['page'] = 'master';
		$data['berkas'] = $this->admin_model->get_data('berkas')->result();

		$session['url'] = current_url();
		$this->session->set_userdata($session);
		// $data['kategori'] = $this->admin_model->getselect();
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/berkas', $data);
		$this->load->view('layout/foot');
	}

	public function upload_berkas()
	{
		$dariDB = $this->admin_model->cekkode('berkas', 'kode_berkas', 'id_gambar');
		$nourut = (int)substr($dariDB->kode_berkas, 3, 4); //GMB0001
		$kodeskrg = $nourut + 1;
		// print_r($data['kategori']);
		// die();
		$data = array(
			'kode_berkas' => $kodeskrg,
			'page' => 'master',
			'kategori' => $this->admin_model->get_data('kategori')->result()
		);
		// var_dump($data['kode_berkas']);die();
		// $data['page'] = 'master';
		// $data['isian'] = $this->Admin_model->check_isi_press_test($id)->result();
		// var_dump($data['isian']);die();
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/upload_berkas', $data);
		$this->load->view('layout/foot');
	}

	public function aksi_upload()
	{
		// var_dump(FCPATH);
		$config['upload_path']          = FCPATH . 'dist/upload/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		// $config['max_size']             = 10000;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			// echo "kosong";die();
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', $error);
			redirect($this->session->userdata('url'));
		} else {
			// echo "ada";die();
			$image_data = $this->upload->data();
			$imgdata = file_get_contents($image_data['full_path']);
			// var_dump($_FILES['berkas']['tmp_name']);
			// die();
			// $imgdata = file_get_contents($_FILES['berkas']['tmp_name']);
			$file_encode = base64_encode($imgdata);
			$kodekategori = $this->input->post('kode_kategori');
			$keterangan = $this->input->post('keterangan');
			$kodeberkas = $this->input->post('kode_berkas');
			$tipeberkas = $this->upload->data('file_type');
			$ukuranberkas = $this->upload->data('file_size');
			$berkas = $file_encode;
			$namaberkas =  $this->upload->data('file_name');
			$data = array(
				'kode_berkas'	=> $kodeberkas,
				'nama_berkas' 	=> $namaberkas,
				'berkas' 		=> $berkas,
				'tipe_berkas' 	=> $tipeberkas,
				'ukuran_berkas' => $ukuranberkas,
				'keterangan' 	=> $keterangan,
				'kode_kategori' => $kodekategori
			);
			$this->db->insert('berkas', $data);
			unlink($image_data['full_path']);
			$this->session->set_flashdata('message', 'Berhasil ditambahkan');
			redirect($this->session->userdata('url'));
		}
		// var_dump($this->input->post());
		// exit;
	}
	
	public function edit($id)
	{
		$where = array('kode_berkas' => $id);
		$data['kategori'] = $this->admin_model->get_data('kategori')->result();
		$data['berkas'] = $this->admin_model->edit_data($where, 'berkas')->result();
		// var_dump($data);
		// die();
		$this->load->view('layout/head');
		$this->load->view('layout/nav');
		$this->load->view('v_admin/upload_berkas_edit', $data);
		$this->load->view('layout/foot');
	}
	
	public function update($id)
	{
		// var_dump(FCPATH);
		$config['upload_path']          = FCPATH . 'dist/upload/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		// $config['max_size']             = 10000;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			// echo "kosong";die();
			$kodekategori = $this->input->post('kode_kategori');
			$keterangan = $this->input->post('keterangan');
			$kodeberkas = $this->input->post('kode_berkas');
			$data = array(
				'kode_berkas'	=> $kodeberkas,
				'keterangan' 	=> $keterangan,
				'kode_kategori' => $kodekategori
			);
			$where = array(
				'kode_berkas' => $id
			);
			$this->admin_model->update_data($where, $data, 'berkas');
			$this->session->set_flashdata('message', 'Berhasil diubah');
			redirect($this->session->userdata('url'));
		} else {
			// echo "ada";die();
			$image_data = $this->upload->data();
			$imgdata = file_get_contents($image_data['full_path']);
			// var_dump($_FILES['berkas']['tmp_name']);
			// die();
			// $imgdata = file_get_contents($_FILES['berkas']['tmp_name']);
			$file_encode = base64_encode($imgdata);
			$kodekategori = $this->input->post('kode_kategori');
			$keterangan = $this->input->post('keterangan');
			$kodeberkas = $this->input->post('kode_berkas');
			$tipeberkas = $this->upload->data('file_type');
			$ukuranberkas = $this->upload->data('file_size');
			$berkas = $file_encode;
			$namaberkas =  $this->upload->data('file_name');
			$data = array(
				'kode_berkas'	=> $kodeberkas,
				'nama_berkas' 	=> $namaberkas,
				'berkas' 		=> $berkas,
				'tipe_berkas' 	=> $tipeberkas,
				'ukuran_berkas' => $ukuranberkas,
				'keterangan' 	=> $keterangan,
				'kode_kategori' => $kodekategori
			);
			$where = array(
				'kode_berkas' => $id
			);
			$this->admin_model->update_data($where, $data, 'berkas');
			unlink($image_data['full_path']);
			$this->session->set_flashdata('message', 'Berhasil diubah');
			redirect($this->session->userdata('url'));
		}
	}

	public function hapus($id)
	{
		$where = array('kode_berkas' => $id);
		$this->admin_model->hapus_data($where, 'berkas');
		$this->admin_model->hapus_data($where, 'detail_berkas');
		$this->session->set_flashdata('message', 'Berhasil dihapus');
		redirect($this->session->userdata('url'));
	}



	//gambar pendukung
	public function gambar_next($id)
	{
		$data['kodeBerkas'] = $id;
		$data['detailBerkas'] = $this->admin_model->get_detailData($id);
		$data['page'] = 'master';

		$session['url'] = current_url();
		$this->session->set_userdata($session);
		// var_dump($_SESSION);
		// die();
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/berkas_next', $data);
		$this->load->view('layout/foot');
	}

	public function upload_berkas_next($id)
	{
		$dariDB = $this->admin_model->cekkode('detail_berkas', 'kode_detail_berkas', 'id_detail_berkas');
		if ($dariDB == null) {
			$nourut = 0;
		} else {
			$nourut = (int)substr($dariDB->kode_detail_berkas, 2, 4); //DT0001
		}
		$kodeskrg = $nourut + 1;
		$kodeberkas = $id;
		$data = array(
			'kode_detail_berkas' => $kodeskrg,
			'kode_berkas' => $kodeberkas,
			'page' => 'master'
		);
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/upload_berkas_next', $data);
		$this->load->view('layout/foot');
	}

	public function aksi_upload_next()
	{
		$config['upload_path']          = FCPATH . 'dist/detail_upload/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		// $config['max_size']             = 10000;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);
		// var_dump($this->upload->do_upload('berkas'));
		// die;

		if (!$this->upload->do_upload('berkas')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', $error);
			redirect($this->session->userdata('url'));
		} else {
			$kodeDetailberkas = $this->input->post('kode_detail_berkas');
			$kodeBerkas = $this->input->post('kode_berkas');
			$namaberkas =  $this->upload->data('file_name');
			$ukuranberkas = $this->upload->data('file_size');

			$image_data = $this->upload->data();
			$imgdata = file_get_contents($image_data['full_path']);
			$file_encode = base64_encode($imgdata);
			$berkas = $file_encode;

			$tipeberkas = $this->upload->data('file_type');
			$keterangan = $this->input->post('keterangan');

			$data = array(
				'kode_detail_berkas'		=> $kodeDetailberkas,
				'kode_berkas'				=> $kodeBerkas,
				'nama_detail_berkas' 		=> $namaberkas,
				'ukuran_detail_berkas' 		=> $ukuranberkas,
				'file_upload' 				=> $berkas,
				'tipe_detail_berkas' 		=> $tipeberkas,
				'keterangan_detail_berkas' 	=> $keterangan
			);

			$this->db->insert('detail_berkas', $data);
			unlink($image_data['full_path']);
			$this->session->set_flashdata('message', 'Berhasil ditambahkan');
			redirect($this->session->userdata('url'));
		}
		// var_dump($this->input->post());
		// exit;
	}

	public function edit_next($id)
	{
		$where = array('kode_detail_berkas' => $id);
		$data['berkas'] = $this->admin_model->edit_data($where, 'detail_berkas')->result();
		$this->load->view('layout/head');
		$this->load->view('layout/nav');
		$this->load->view('v_admin/upload_berkas_next_edit', $data);
		$this->load->view('layout/foot');
	}

	public function update_next()
	{
		// var_dump(FCPATH);
		$config['upload_path']          = FCPATH . 'dist/upload/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		// $config['max_size']             = 10000;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('detail_berkas')) {
			// =echo "kosong";die();
			$keterangan = $this->input->post('keterangan_detail_berkas');
			$kodedetailberkas = $this->input->post('kode_detail_berkas');
			$kodeberkas = $this->input->post('kode_berkas');
			$data = array(
				'kode_berkas'	=> $kodeberkas,
				'kode_detail_berkas'	=> $kodedetailberkas,
				'keterangan_detail_berkas' 	=> $keterangan
			);
			$where = array(
				'kode_detail_berkas' => $kodedetailberkas
			);
			$this->admin_model->update_data($where, $data, 'detail_berkas');
			$this->session->set_flashdata('message', 'Berhasil diubah');
			redirect($this->session->userdata('url'));
		} else {
			// echo "ada";die();
			$image_data = $this->upload->data();
			$imgdata = file_get_contents($image_data['full_path']);
			// var_dump($_FILES['berkas']['tmp_name']);
			// die();
			// $imgdata = file_get_contents($_FILES['berkas']['tmp_name']);
			$file_encode = base64_encode($imgdata);
			$keterangan = $this->input->post('keterangan_detail_berkas');
			$kodeberkas = $this->input->post('kode_berkas');
			$kodedetailberkas = $this->input->post('kode_detail_berkas');
			$tipeberkas = $this->upload->data('file_type');
			$ukuranberkas = $this->upload->data('file_size');
			$upload = $file_encode;
			$namaberkas =  $this->upload->data('file_name');
			$data = array(
				'kode_berkas'	=> $kodeberkas,
				'kode_detail_berkas'	=> $kodedetailberkas,
				'nama_detail_berkas' 	=> $namaberkas,
				'file_upload' 		=> $upload,
				'tipe_detail_berkas' 	=> $tipeberkas,
				'ukuran_detail_berkas' => $ukuranberkas,
				'keterangan_detail_berkas' 	=> $keterangan
			);
			// var_dump($data);
			// die();
			$where = array(
				'kode_detail_berkas' => $kodedetailberkas
			);
			$this->admin_model->update_data($where, $data, 'detail_berkas');
			unlink($image_data['full_path']);
			$this->session->set_flashdata('message', 'Berhasil diubah');
			redirect($this->session->userdata('url'));
		}
	}

	public function hapus_next($id)
	{
		$where = array('kode_detail_berkas' => $id);
		$this->admin_model->hapus_data($where, 'detail_berkas');
		$this->session->set_flashdata('message', 'Berhasil dihapus');
		redirect($this->session->userdata('url'));
	}

	//kategori
	public function kategori()
	{
		$data['page'] = 'master';
		$data['kategori'] = $this->admin_model->get_data('kategori')->result();

		$session['url'] = current_url();
		$this->session->set_userdata($session);
		// $data['kategori'] = $this->admin_model->getselect();
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/kategori', $data);
		$this->load->view('layout/foot');
	}

	public function upload_kategori()
	{
		$dariDB = $this->admin_model->cekkode('kategori', 'kode_kategori', 'id_kategori');
		$nourut = (int)substr($dariDB->kode_kategori, 2, 3); //GMB0001
		$kodeskrg = $nourut + 1;
		// print_r($data['kategori']);
		// die();
		$data = array(
			'kode_kategori' => $kodeskrg,
			'page' => 'master',
			'kategori' => $this->admin_model->get_data('kategori')->result()
		);
		// var_dump($data['kode_berkas']);die();
		// $data['page'] = 'master';
		// $data['isian'] = $this->Admin_model->check_isi_press_test($id)->result();
		// var_dump($data['isian']);die();
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/upload_berkas_kategori', $data);
		$this->load->view('layout/foot');
	}

	public function upload_berkas_kategori()
	{
		// var_dump(FCPATH);
		$config['upload_path']          = FCPATH . 'dist/upload/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		// $config['max_size']             = 10000;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			// echo "kosong";die();
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message', $error);
			redirect($this->session->userdata('url'));
		} else {
			// echo "ada";die();
			$image_data = $this->upload->data();
			$imgdata = file_get_contents($image_data['full_path']);
			// var_dump($_FILES['berkas']['tmp_name']);
			// die();
			// $imgdata = file_get_contents($_FILES['berkas']['tmp_name']);
			$file_encode = base64_encode($imgdata);
			$kodekategori = $this->input->post('kode_kategori');
			$namakategori = $this->input->post('nama_kategori');
			$keterangan = $this->input->post('keterangan');
			$tipeberkas = $this->upload->data('file_type');
			$menu = strtolower($this->input->post('nama_kategori'));
			$berkas = $file_encode;
			$namaberkas =  $this->upload->data('file_name');
			$data = array(
				'kode_kategori'			=> $kodekategori,
				'nama_kategori' 		=> $namakategori,
				'berkas_kategori' 		=> $berkas,
				'menu'			 		=> $menu,
				'tipe_berkas_kategori' 	=> $tipeberkas,
				'nama_berkas_kategori' => $namaberkas,
				'keterangan_kategori' 	=> $keterangan
			);
			$this->db->insert('kategori', $data);
			unlink($image_data['full_path']);
			$this->session->set_flashdata('message', 'Berhasil ditambahkan');
			redirect($this->session->userdata('url'));
		}
		// var_dump($this->input->post());
		// exit;
	}

	public function edit_kategori($id)
	{
		$where = array('kode_kategori' => $id);
		$data['kategori'] = $this->admin_model->edit_data($where, 'kategori')->result();
		// var_dump($data);
		// die();
		$this->load->view('layout/head');
		$this->load->view('layout/nav');
		$this->load->view('v_admin/upload_berkas_kategori_edit', $data);
		$this->load->view('layout/foot');
	}

	public function update_kategori($id)
	{
		// var_dump(FCPATH);
		$config['upload_path']          = FCPATH . 'dist/upload/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		// $config['max_size']             = 10000;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			// echo "kosong";die();
			$kodekategori = $this->input->post('kode_kategori');
			$namakategori = $this->input->post('nama_kategori');
			$menu = strtolower($this->input->post('nama_kategori'));
			$keterangan = $this->input->post('keterangan');
			$data = array(
				'kode_kategori' => $kodekategori,
				'nama_kategori'	=> $namakategori,
				'menu'			=> $menu,
				'keterangan_kategori' 	=> $keterangan
			);
			$where = array(
				'kode_kategori' => $id
			);
			$this->admin_model->update_data($where, $data, 'kategori');
			$this->session->set_flashdata('message', 'Berhasil diubah');
			redirect($this->session->userdata('url'));
		} else {
			// echo "ada";die();
			$image_data = $this->upload->data();
			$imgdata = file_get_contents($image_data['full_path']);
			// var_dump($_FILES['berkas']['tmp_name']);
			// die();
			// $imgdata = file_get_contents($_FILES['berkas']['tmp_name']);
			$file_encode = base64_encode($imgdata);
			$kodekategori = $this->input->post('kode_kategori');
			$namakategori = $this->input->post('nama_kategori');
			$menu = strtolower($this->input->post('nama_kategori'));
			$keterangan = $this->input->post('keterangan');
			$tipeberkas = $this->upload->data('file_type');
			$berkas = $file_encode;
			$namaberkas =  $this->upload->data('file_name');
			$data = array(
				'kode_kategori' 		=> $kodekategori,
				'nama_kategori'			=> $namakategori,
				'berkas_kategori' 		=> $berkas,
				'menu' 					=> $menu,
				'tipe_berkas_kategori' 	=> $tipeberkas,
				'nama_berkas_kategori' 	=> $namaberkas,
				'keterangan_kategori' 	=> $keterangan,
			);
			$where = array(
				'kode_kategori' => $id
			);
			$this->admin_model->update_data($where, $data, 'kategori');
			unlink($image_data['full_path']);
			$this->session->set_flashdata('message', 'Berhasil diubah');
			redirect($this->session->userdata('url'));
		}
	}

	public function hapus_kategori($id)
	{
		$where = array('kode_kategori' => $id);
		$data['check'] = $this->admin_model->edit_data($where, 'berkas')->result();
		if($data['check'][0]->kode_kategori != NULL ){
			$this->session->flashdata('message' , 'data sedang digunakan, mohon ubah dahulu !');
			redirect($this->session->userdata('url'));
		}else{
			$this->admin_model->hapus_data($where, 'kategori');
			$this->session->set_flashdata('message', 'Berhasil dihapus');
			redirect($this->session->userdata('url'));
		}
	}


	//masukkan
	public function masukkan()
	{
		$data['page'] = 'master';
		$data['masuk'] = $this->admin_model->get_data('masukkan')->result();
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/masukkan', $data);
		$this->load->view('layout/foot');
	}

	//user
	public function user(){
		$data['page'] = 'master';
		$data['user'] = $this->admin_model->get_data('user')->result();

		$session['url'] = current_url();
		$this->session->set_userdata($session);

		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/user', $data);
		$this->load->view('layout/foot');
	}

	public function add_user(){
		$data['page'] = 'master';
		$this->load->view('layout/head');
		$this->load->view('layout/nav', $data);
		$this->load->view('v_admin/add_user', $data);
		$this->load->view('layout/foot');
	}

	public function proses_user_add(){
		$user		= $this->input->post('user');
		$pass 		= md5($this->input->post('pass'));
		$data = array(
			'user' 	=> $user,
			'pass' 	=> $pass,
			'level' => 'admin'
		);
		$this->admin_model->input_data($data, 'user');
		$this->session->set_flashdata('message', 'Berhasil disimpan');
		// var_dump($_SESSION);
		// die();
		redirect($this->session->userdata('url'));
	}

	public function edit_user($id){
		$where = array('id_user' => $id);
		$data['dt'] = $this->admin_model->edit_data($where, 'user')->result();
		$this->load->view('layout/head');
		$this->load->view('layout/nav');
		$this->load->view('v_admin/edit_user', $data);
		$this->load->view('layout/foot');
	}

	public function proses_user_edit(){
		$id_user 	= $this->input->post('id_user');
		$user 	= $this->input->post('user');
		$pass 	= md5($this->input->post('pass'));
		$data = array(
			'user' 	=> $user,
			'pass' => $pass,
			'level' 		=> 'admin'
		);
		$where = array(
			'id_user' => $id_user
		);
		$this->admin_model->update_data($where, $data, 'user');
		$this->session->set_flashdata('message', 'Berhasil diubah');
		redirect($this->session->userdata('url'));
	}

	public function hapus_user($id){
		$where = array('id_user' => $id);
		$this->admin_model->hapus_data($where, 'user');
		$this->session->set_flashdata('message', 'Berhasil dihapus');
		redirect($this->session->userdata('url'));
	}

}
