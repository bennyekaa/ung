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

    function getGambarKategori($kode)
    {
        $query = $this->db->query("SELECT * from berkas WHERE kode_kategori = '$kode'");
        return $query->result();
    }

    public function getGambar($where)
    {
        $query = $this->db->get_where('berkas', $where);
        return $query->row();
    }

    public function get_where($table,$where)
    {
        $query = $this->db->get_where($table, $where);
        return $query->row();
    }

    function cekkode($table, $field, $id)
    {
        $query = $this->db->query("SELECT MAX($field) as $field from $table ORDER BY $id DESC LIMIT 1");
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

    function get_user($data)
    {
        $query = $this->db->get_where('user', $data);
        foreach ($query->result() as $ceklogin) {
            $data['id_user']    = $ceklogin->id_user;
            $data['user']       = $ceklogin->user;
            $data['level']      = $ceklogin->level;
            $this->session->set_userdata($data);
        }
        return $data;
    }

    function cekkodeberkas()
    {
        $query = $this->db->query("SELECT MAX(id_berkas) as kodeberkas from data_berkas_upload");
        $hasil = $query->row();
        return $hasil->kodeberkas;
    }
}
