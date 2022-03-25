<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud');
    }
    public function index()
    {
        $data['kategori'] = $this->M_crud->get_all_data('tbl_kategori')-> result();
        $this->template->load('layout_admin', 'admin/kategori/index', $data);
    }

    public function add()
    {
        $this->template->load('layout_admin', 'admin/kategori/form_add');
    }

    public function store()
    {
       $category_name = $this->input->post('category_name');
       $data = array('namaKategori' => $category_name);
       $this->M_crud->insert('tbl_kategori', $data);
       redirect('kategori');
    }

    public function edit($id)
    {
        $dataid = array('idKategori' => $id);
        $data['kategori'] = $this->M_crud->get_by_id('tbl_kategori', $dataid)->row_object();
        $this->template->load('layout_admin', 'admin/kategori/form_edit', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');

        $category_name = $this->input->post('category_name');
        $data = array('namaKategori' => $category_name);
        $this->M_crud->update('tbl_kategori', $data, 'idKategori', $id);
        redirect('kategori');
    }

    public function delete($id)
    {
        $where = array('idKategori' => $id);
		$this->M_crud->delete('tbl_kategori',$where);
		redirect('kategori');
    }
}