<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class laporanc extends CI_Controller {
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') == FALSE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
    }



/*===========================================================================================================================================*/
/*===========================================================================================================================================*/

	public function data_laporan()
	{
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $status = $this->input->post('status');

        if ($status == '') {
            $data=array(
                'headerTitle'=>'Data Laporan',
                'formTitle'=>'Data Laporan',

                'active_admin'=>'active',

                'data_pembelian'=>$this->adminm->get_all_pembelian_bulan($bulan, $tahun),
            );      

        } elseif($status != '' AND $tahun != '' AND $bulan != '') {

            $data=array(
                'headerTitle'=>'Data Laporan',
                'formTitle'=>'Data Laporan',

                'active_admin'=>'active',

                'data_pembelian'=>$this->adminm->get_all_pembelian($bulan, $tahun, $status),
            );      

        } else {

            $data=array(
                'headerTitle'=>'Data Laporan',
                'formTitle'=>'Data Laporan',

                'active_admin'=>'active',

                'data_pembelian'=>$this->adminm->get_all_pembelian_status($status),
            );      

        }
		$this->load->view('elements/header', $data);
		$this->load->view('pages/laporan/data_laporan');
		$this->load->view('elements/footer');
	}

}
