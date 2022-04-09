<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud');
    }
    public function index()
    {
        $data['kota'] = $this->M_crud->get_all_data('tbl_kota')-> result();
        $this->template->load('layout_admin', 'admin/kota/index', $data);
    }

    public function add()
    {
        $this->template->load('layout_admin', 'admin/kota/form_add');
    }

    public function store()
    {
       $namaKota = $this->input->post('namaKota');
       $data = array('namaKota' => $namaKota);
       $this->M_crud->insert('tbl_kota', $data);
       redirect('kota');
    }

    public function edit($id)
    {
        $dataid = array('idKota' => $id);
        $data['kota'] = $this->M_crud->get_by_id('tbl_kota', $dataid)->row_object();
        $this->template->load('layout_admin', 'admin/kota/form_edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');

        $namaKota = $this->input->post('namaKota');
        $data = array('namaKota' => $namaKota);
        $this->M_crud->update('tbl_kota', $data, 'idKota', $id);
        redirect('kota');
    }

    public function delete($id)
    {
        $where = array('idKota' => $id);
		$this->M_crud->delete('tbl_kota',$where);
		redirect('kota');
    }
}