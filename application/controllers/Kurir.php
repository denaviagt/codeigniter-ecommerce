<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurir extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud');
    }
    public function index()
    {
        $data['kurir'] = $this->M_crud->get_all_data('tbl_kurir')-> result();
        $this->template->load('layout_admin', 'admin/kurir/index', $data);
    }

    public function add()
    {
        $this->template->load('layout_admin', 'admin/kurir/form_add');
    }

    public function store()
    {
       $namaKurir = $this->input->post('namaKurir');
       $data = array('namaKurir' => $namaKurir);
       $this->M_crud->insert('tbl_kurir', $data);
       redirect('kurir');
    }

    public function edit($id)
    {
        $dataid = array('idKurir' => $id);
        $data['kurir'] = $this->M_crud->get_by_id('tbl_kurir', $dataid)->row_object();
        $this->template->load('layout_admin', 'admin/kurir/form_edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');

        $namaKurir = $this->input->post('namaKurir');
        $data = array('namaKurir' => $namaKurir);
        $this->M_crud->update('tbl_kurir', $data, 'idKurir', $id);
        redirect('kurir');
    }

    public function delete($id)
    {
        $where = array('idKurir' => $id);
		$this->M_crud->delete('tbl_kurir',$where);
		redirect('kurir');
    }
}