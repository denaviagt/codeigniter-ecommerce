<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud');
    }
    public function index()
    {
        $data['member'] = $this->M_crud->get_all_data('tbl_member')-> result();
        $this->template->load('layout_admin', 'admin/member/index', $data);
    }

    public function add()
    {
        $data['kota'] =  $this->M_crud->get_all_data('tbl_kota')-> result();
        $this->template->load('layout_admin', 'admin/member/form_add', $data);
    }

    public function store()
    {
       $username = $this->input->post('username');
       $email = $this->input->post('email');
       $namaKonsumen = $this->input->post('namaKonsumen');
       $idKota = $this->input->post('idKota');
       $alamat = $this->input->post('alamat');
       $telp = $this->input->post('telp');
       $status = $this->input->post('status');

       $data = array(
                    'username' => $username, 
                    'email' => $email,
                    'namaKonsumen' => $namaKonsumen,
                    'idKota' => $idKota,
                    'alamat' => $alamat,
                    'tlpn' => $telp,
                    'statusAktif' => $status,
                    'password' => 'password');
       $this->M_crud->insert('tbl_member', $data);
       redirect('member');
    }

    public function edit($id)
    {
        $dataid = array('idKonsumen' => $id);
        $data['member'] = $this->M_crud->get_by_id('tbl_member', $dataid)->row_object();
        $data['kota'] =  $this->M_crud->get_all_data('tbl_kota')-> result();
        $this->template->load('layout_admin', 'admin/member/form_edit', $data);
    }

    public function update()
    {
        // var_dump($this->input->post('telp')); die();
        $id = $this->input->post('id');

        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $namaKonsumen = $this->input->post('namaKonsumen');
        $idKota = $this->input->post('idKota');
        $alamat = $this->input->post('alamat');
        $telp = $this->input->post('telp');
        $status = $this->input->post('status');
 
        $data = array(
                     'username' => $username, 
                     'email' => $email,
                     'namaKonsumen' => $namaKonsumen,
                     'idKota' => $idKota,
                     'alamat' => $alamat,
                     'tlpn' => $telp,
                     'statusAktif' => $status,
                     'password' => 'password');
        $this->M_crud->update('tbl_member', $data, 'idKonsumen', $id);
        redirect('member');
    }

    public function delete($id)
    {
        $where = array('idKonsumen' => $id);
		$this->M_crud->delete('tbl_member',$where);
		redirect('member');
    }
}