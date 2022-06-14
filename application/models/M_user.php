<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function cek_user_id()
    {
        $this->db->select('idKonsumen')->from('tbl_member')->where('username',$this->session->username);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->idKonsumen;
        }
        return false;
    }

}