<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_crud');
        $this->load->model('M_frontend');
        $this->load->model('M_user');
    }   

    public function index()
    {
        $data['kategori'] = $this->M_frontend->get_all_data('tbl_kategori')-> result();
        $data['produk_terbaru'] = $this->M_frontend->get_all_produk_terbaru()-> result();
        // if (empty($this->session->userdata('username'))) {
        //     redirect('front');
        // }
		$this->template->load('layout_frontend', 'frontend/dashboard', $data);
    }
    
    public function login()
    {
        $this->load->view('frontend/form_login');
    }

    public function register()
    {
        $data['kota'] = $this->M_frontend->get_all_data('tbl_kota')->result();
        $data['kategori'] = $this->M_frontend->get_all_data('tbl_kategori')->result();

        $this->template->load('layout_frontend', 'frontend/register', $data);
    }

    public function insert_register()
    {
        $namaKonsumen   = $this->input->post('nama');
        $email          = $this->input->post('email');
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');
        $alamat         = $this->input->post('alamat');
        $idKota         = $this->input->post('kota');
        $telp           = $this->input->post('no_telpon');

        $data = array(
            'username'      => $username, 
            'email'         => $email,
            'namaKonsumen'  => $namaKonsumen,
            'idKota'        => $idKota,
            'alamat'        => $alamat,
            'tlpn'          => $telp,
            'statusAktif'   => 'Y',
            'password'      => $password);
            
        $this->M_frontend->insert_reg($data);
        redirect('home/dashboard');
    }
    
	public function dashboard()
	{
        $data['kategori'] = $this->M_frontend->get_all_data('tbl_kategori')-> result();
        $data['produk_terbaru'] = $this->M_frontend->get_all_produk_terbaru()-> result();
        if (empty($this->session->userdata('username'))) {
            redirect('front');
        }
        $this->template->load('layout_frontend', 'frontend/menu_member', $data);
		// $this->template->load('layout_frontend', 'frontend/dashboard', $data);
	}

    public function menu_member()
    {
        $data['kategori'] = $this->M_frontend->get_all_data('tbl_kategori')-> result();
        $data['produk_terbaru'] = $this->M_frontend->get_all_produk_terbaru()-> result();
        if (empty($this->session->userdata('username'))) {
            redirect('front');
        }
		$this->template->load('layout_frontend', 'frontend/menu_member', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }

    public function toko()
    {
        $data['kategori'] = $this->M_frontend->get_all_data('tbl_kategori')-> result();
        $data['data_toko'] = $this->M_frontend->get_all_data('tbl_toko')-> result();
        $this->template->load('layout_frontend', 'frontend/list_toko', $data);
    }

    public function create_toko()
    {
        $data['kategori'] = $this->M_frontend->get_all_data('tbl_kategori')-> result();
        $data['id']     = $this->M_user->cek_user_id();
        $this->template->load('layout_frontend', 'frontend/form_tambah_toko', $data);
    }

    public function insert_toko()
    {
        $nama_toko      = $this->input->post('nama_toko');
        $deskripsi      = $this->input->post('deskripsi');
        $idKonsumen      = $this->input->post('idKonsumen');

        $config['upload_path'] = 'upload/';
        $config['allowed_types']        = 'jpeg|jpg|png';

        $this->load->library('upload', $config);

        if($this->upload->do_upload('logo_toko')){
            $data_file = $this->upload->data();

            $data = array(
                'idKonsumen'    => $idKonsumen,
                'namaToko'      => $nama_toko, 
                'logo'          => $data_file['file_name'],
                'deskripsi'     => $deskripsi,
                'statusAktif'   => 'Y',
            );
            $this->M_frontend->insert('tbl_toko', $data);
            redirect('home/toko');
        }else{
            $data = $this->upload->display_errors();
            echo $data;
        }
                    
    
    }

    public function detail_toko($id)
    {
        $data['id'] = $id;
        $data['kategori'] = $this->M_frontend->get_all_data('tbl_kategori')-> result();
        $data['toko'] = $this->M_frontend->get_data_by_id('tbl_toko', $id)-> result();
        $data['data_produk'] = $this->M_frontend->get_data_produk_by_toko('tbl_produk', $id)->result();
        $this->template->load('layout_frontend', 'frontend/detail_toko', $data);
    }

    public function create_produk($id)
    {
        $data['kategori']   = $this->M_frontend->get_all_data('tbl_kategori')-> result();
        $data['id_user']    = $this->M_user->cek_user_id();
        $data['id_toko']    = $id;
        $this->template->load('layout_frontend', 'frontend/form_tambah_produk', $data);
    }

    public function insert_produk($id)
    {
        $nama_produk    = $this->input->post('nama_produk');
        $id_kategori    = $this->input->post('id_kategori');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');
        $berat          = $this->input->post('berat');
        $deskripsi      = $this->input->post('deskripsi');

        $config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'jpeg|jpg|png';

        $this->load->library('upload', $config);

        if($this->upload->do_upload('foto')){
            $data_file = $this->upload->data();

            $data = array(
                'idToko'        => $id,
                'idKategori'    => $id_kategori, 
                'namaProduk'    => $nama_produk, 
                'foto'          => $data_file['file_name'],
                'harga'         => $harga,
                'stok'          => $stok,
                'berat'         => $berat,
                'deskripsiProduk'=> $deskripsi,
            );
            $this->M_frontend->insert('tbl_produk', $data);
            redirect('home/detail_toko/'.$id);
        }else{
            $data = $this->upload->display_errors();
            echo $data;
        }
                    
    
    }

    
}