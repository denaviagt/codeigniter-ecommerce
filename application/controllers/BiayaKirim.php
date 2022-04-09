<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BiayaKirim extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud');
    }
    public function index()
    {
        $this->db->select('a.*, b.namaKurir as namaKurir, c.namaKota as kotaAsal, d.namaKota as kotaTujuan');
        $this->db->from('tbl_biaya_kirim a');
        $this->db->join('tbl_kurir b', 'a.idKurir = b.idKurir');
        $this->db->join('tbl_kota c', 'a.idKotaAsal = c.idKota');
        $this->db->join('tbl_kota d', 'a.idKotaTujuan = d.idKota');
        $query = $this->db->get();

        $data['biaya_kirim'] = $query->result();
        // var_dump($data);die();
        $this->template->load('layout_admin', 'admin/biaya_kirim/index', $data);
    }

    public function add()
    {
        $data['kurir'] =  $this->M_crud->get_all_data('tbl_kurir')-> result();
        $data['kota'] =  $this->M_crud->get_all_data('tbl_kota')-> result();
        $this->template->load('layout_admin', 'admin/biaya_kirim/form_add', $data);
    }

    public function store()
    {
       $kurir = $this->input->post('kurir');
       $kotaAsal = $this->input->post('kotaAsal');
       $kotaTujuan = $this->input->post('kotaTujuan');
       $biaya = $this->input->post('biaya');
       $data = array('idKurir' => $kurir, 'idKotaAsal' => $kotaAsal, 'idKotaTujuan' => $kotaTujuan, 'biaya' =>  $biaya );
       $this->M_crud->insert('tbl_biaya_kirim', $data);
       redirect('biayakirim');
    }

    public function edit($id)
    {
        $dataid = array('idBiayaKirim' => $id);
        $data['biaya_kirim'] = $this->M_crud->get_by_id('tbl_biaya_kirim', $dataid)->row_object();
        $this->template->load('layout_admin', 'admin/biaya_kirim/form_edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');

        $namaBiayaKirim = $this->input->post('namaBiayaKirim');
        $data = array('namaBiayaKirim' => $namaBiayaKirim);
        $this->M_crud->update('tbl_biaya_kirim', $data, 'idBiayaKirim', $id);
        redirect('biaya_kirim');
    }

    public function delete($id)
    {
        $where = array('idBiayaKirim' => $id);
		$this->M_crud->delete('tbl_biaya_kirim',$where);
		redirect('biaya_kirim');
    }
}