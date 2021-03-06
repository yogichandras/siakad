<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelnilai extends CI_Model
{

    public $table = 'nilai';
    public $id = 'id_nilai';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    function get_nim()
    {
        $this->db->order_by('nim', 'asc');
        return $this->db->get('table_mahasiswa')->result();
    }

    function get_matakuliah()
    {
        $this->db->order_by('kode_matakuliah', 'asc');
        return $this->db->get('table_matakuliah')->result();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_nilai', $q);
	$this->db->or_like('nilai', $q);
	$this->db->or_like('grade', $q);
    $this->db->or_like('sksn', $q);
	$this->db->or_like('table_mahasiswa_nim', $q);
	$this->db->or_like('table_matakuliah_kode_matakuliah', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_nilai', $q);
	$this->db->or_like('nilai', $q);
	$this->db->or_like('grade', $q);
    $this->db->or_like('sksn', $q);
	$this->db->or_like('table_mahasiswa_nim', $q);
	$this->db->or_like('table_matakuliah_kode_matakuliah', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Modelnilai.php */
/* Location: ./application/models/Modelnilai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-28 14:44:41 */
/* http://harviacode.com */