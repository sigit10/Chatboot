<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksic extends CI_Controller {
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') == FALSE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
    }

/*===========================================================================================================================================*/
/*===========================================================================================================================================*/

	public function data_penjualan()
	{
        $id = $this->session->userdata('ID');
        $data=array(
            'headerTitle'=>'Data Penjualan',
            'formTitle'=>'Data Penjualan',
            'active_admin'=>'active',
            'data_pembelian'=>$this->adminm->get_detail_penjualan($id),
        );      
        $this->load->view('elements/header', $data);
        $this->load->view('pages/pembelian/data_penjualan');
        $this->load->view('elements/footer');           
	}

    public function data_pembelian()
    {
        $id = $this->session->userdata('ID');
        $data=array(
            'headerTitle'=>'Data Pembelian',
            'formTitle'=>'Data Pembelian',
            'active_admin'=>'active',
            'data_pembelian'=>$this->adminm->get_data_pembelian($id),
        );      
        $this->load->view('elements/header', $data);
        $this->load->view('pages/pembelian/data_pembelian');
        $this->load->view('elements/footer');           
    }

    public function detail_pembelian()
    {
        $id = $this->session->userdata('ID');
        $data=array(
            'headerTitle'=>'Data Pembelian',
            'formTitle'=>'Data Pembelian',
            'active_admin'=>'active',
            'data_pembelian'=>$this->adminm->get_data_pembelian($id),
        );      
        $this->load->view('elements/header', $data);
        $this->load->view('pages/pembelian/detail_pembelian');
        $this->load->view('elements/footer');           
    }

	public function login()
	{
        $data=array(

        );
		$this->load->view('elements/frontend_header', $data);
		$this->load->view('pages/frontend/login');
		$this->load->view('elements/frontend_footer');
	}

}
