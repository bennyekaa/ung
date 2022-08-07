<?php
class Admin_model extends CI_Model
{

    function get_data($table)
    {
        $result = $this->db->get($table);
        return $result;
    }

    function get_detailData($kode)
    {
        $query = $this->db->query("SELECT * from detail_berkas WHERE kode_berkas = '$kode'");
        return $query->result();
    }

    function cekkode($table, $field, $id)
    {
        $query = $this->db->query("SELECT $field from $table ORDER BY $id DESC LIMIT 1");
        $hasil = $query->row();
        return $hasil;
    }

    function load_berkas($id)
    {
        $result = $this->db->query("SELECT * FROM data_berkas_upload WHERE idg_berkas = '" . $id . "'");
        return $result;
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function get_data_presstestXcustomer($id)
    {
        $result = $this->db->query("SELECT
        data_press_test.idg_press_test,
	    data_press_test.fig_no,
	    data_press_test.test_cert,
	    data_press_test.id_press_test,
	    data_press_test.id_customer,
	    ref_customer.nama_customer,
	    ref_customer.po_numb,
	    data_press_test.id_berkas,
	    count( data_berkas_upload.id_berkas ) AS jumlah 
        FROM
	    data_press_test
	    LEFT JOIN ref_customer ON data_press_test.id_customer = ref_customer.id_customer
	    LEFT JOIN data_berkas_upload ON data_berkas_upload.id_press_test = data_press_test.id_press_test 
	    AND data_berkas_upload.id_berkas = data_press_test.id_berkas 
        WHERE ref_customer.id_customer = '" . $id . "'
        GROUP BY
	    data_press_test.fig_no");

        return $result;
    }

    function check_isi_press_test($id)
    {
        $result = $this->db->query("SELECT * FROM data_press_test WHERE idg_press_test = '" . $id . "' ");
        return $result;
    }

    function get_data_presstestXberkas($id_berkas, $id_presstest)
    {
        $result = $this->db->query("SELECT
	    * 
        FROM
	    data_press_test
	    INNER JOIN data_berkas_upload ON data_press_test.id_press_test = data_berkas_upload.id_press_test 
	    AND data_press_test.id_berkas = data_berkas_upload.id_berkas
        WHERE data_press_test.id_berkas = '" . $id_berkas . "'
        AND data_press_test.id_press_test = '" . $id_presstest . "'");

        return $result;
    }



    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function cekkodecustomer()
    {
        $query = $this->db->query("SELECT MAX(id_customer) as kodecustomer from ref_customer");
        $hasil = $query->row();
        return $hasil->kodecustomer;
    }
    function cekkodeheat()
    {
        $query = $this->db->query("SELECT MAX(id_heat) as kodeheat from ref_data_heat");
        $hasil = $query->row();
        return $hasil->kodeheat;
    }
    function cekkodevalve()
    {
        $query = $this->db->query("SELECT MAX(id_detail) as kodevalve from ref_detail_valve");
        $hasil = $query->row();
        return $hasil->kodevalve;
    }
    function cekkodematerial()
    {
        $query = $this->db->query("SELECT MAX(id_material) as kodematerial from ref_material");
        $hasil = $query->row();
        return $hasil->kodematerial;
    }
    function cekkodepg1()
    {
        $query = $this->db->query("SELECT MAX(id_pg1) as kodepg1 from ref_pg1");
        $hasil = $query->row();
        return $hasil->kodepg1;
    }
    function cekkodepg2()
    {
        $query = $this->db->query("SELECT MAX(id_pg_2) as kodepg2 from ref_pg2");
        $hasil = $query->row();
        return $hasil->kodepg2;
    }
    function cekkodepg3()
    {
        $query = $this->db->query("SELECT MAX(id_pg_3) as kodepg3 from ref_pg3");
        $hasil = $query->row();
        return $hasil->kodepg3;
    }

    function get_user($data)
    {
        $query = $this->db->get_where('ref_user', $data);
        foreach ($query->result() as $ceklogin) {
            $data['id_user']    = $ceklogin->id_user;
            $data['user']       = $ceklogin->user;
            $data['level']      = $ceklogin->level;
            $this->session->set_userdata($data);
        }
        return $data;
    }

    function cekkodepresstest()
    {
        $query = $this->db->query("SELECT MAX(id_press_test) as kodepresstest from data_press_test");
        $hasil = $query->row();
        return $hasil->kodepresstest;
    }

    function cekkodeberkas()
    {
        $query = $this->db->query("SELECT MAX(id_berkas) as kodeberkas from data_berkas_upload");
        $hasil = $query->row();
        return $hasil->kodeberkas;
    }
}
