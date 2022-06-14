<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_frontend extends CI_Model {

    public function get_all_data($table)
    {
        $q = $this->db->get($table);
        return $q;
    }

    public function get_data_by_id($table, $id)
    {
        $query = $this->db->get_where($table, array('idToko' => $id));
        return $query;
    }

    public function get_data_produk_by_toko($table, $id)
    {
        $query = $this->db->get_where($table, array('idToko' => $id));
        return $query;
    }

   public function get_all_produk_terbaru()
   {
       $this->db->order_by('idProduk', 'DESC');
       $this->db->limit(4);
       return $this->db->get('tbl_produk');
   }

   public function insert_reg($data)
   {
    $this->db->insert('tbl_member', $data);
   }

   public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

}