<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{

    public $table = 'Pelanggan';
    public $id = 'id_pelanggan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('Kode_Pelanggan,Nama_Pelanggan,Alamat_pelanggan,Nomor_HP,Jenis_Pelanggan,Tanggal_Aktif,id_pelanggan');
        $this->datatables->from('Pelanggan');
        //add this line for join
        //$this->datatables->join('table2', 'Pelanggan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('pelanggan/read/$1'),'Read')." | ".anchor(site_url('pelanggan/update/$1'),'Update')." | ".anchor(site_url('pelanggan/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pelanggan');
        return $this->datatables->generate();
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
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pelanggan', $q);
	$this->db->or_like('Kode_Pelanggan', $q);
	$this->db->or_like('Nama_Pelanggan', $q);
	$this->db->or_like('Alamat_pelanggan', $q);
	$this->db->or_like('Nomor_HP', $q);
	$this->db->or_like('Jenis_Pelanggan', $q);
	$this->db->or_like('Tanggal_Aktif', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pelanggan', $q);
	$this->db->or_like('Kode_Pelanggan', $q);
	$this->db->or_like('Nama_Pelanggan', $q);
	$this->db->or_like('Alamat_pelanggan', $q);
	$this->db->or_like('Nomor_HP', $q);
	$this->db->or_like('Jenis_Pelanggan', $q);
	$this->db->or_like('Tanggal_Aktif', $q);
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

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-14 19:35:00 */
/* http://harviacode.com */