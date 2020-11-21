<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminc extends CI_Controller {
/*
    function __construct(){
        parent::__construct();
        if($this->session->userdata('LEVEL') == '' ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
    }
*/
	public function index()
	{
        
        $data=array(
            'headerTitle'=>'Dashboard',
            'formTitle'=>'Dashboard',
        );		
		$this->load->view('elements/header', $data);
		$this->load->view('pages/dashboard');
		$this->load->view('elements/footer');
	}

/*===========================================================================================================================================*/
/*===========================================================================================================================================*/

	public function data_admin()
	{
        $data=array(
            'headerTitle'=>'Data Admin',
            'formTitle'=>'Data Admin',
            'active_user'=>'active',
            'data_admin'=>$this->adminm->get_all_data_admin(),
        );		
		$this->load->view('elements/header', $data);
		$this->load->view('pages/admin/data_admin');
		$this->load->view('elements/footer');
	}

	public function manage_data_admin()
	{
        $id= $this->uri->segment(3);
		if ($id == '') {

	        $data=array(
	            'headerTitle'=>'Form Tambah Data Admin',
	            'formTitle'=>'Data Admin',
	            'active_user'=>'active',

	            'id'=>$this->adminm->id_user(),
	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/admin/manage_data_admin');
			$this->load->view('elements/footer');

		} else {
	        $id_user['id_user']= $this->uri->segment(3);
	        $data=array(
	            'headerTitle'=>'Data Admin',
	            'formTitle'=>'Data Admin',
	            'active_user'=>'active',

	            'data_admin'=>$this->adminm->getSelectedData('tbl_user',$id_user),
	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/admin/manage_data_admin');
			$this->load->view('elements/footer');

		}
	}

    function proses_data_admin() {
        $key     = $this->input->post('id_user');
        $pass    = $this->input->post('password');
    	if ($key != '') {
	        $id_user     = $this->input->post('id_user');
	        $nm_user     = $this->input->post('nm_user');
	        $username    = $this->input->post('username');
	        $password    = $this->input->post('password');
	        $level_user    = $this->input->post('level_user');

	        $data=array(
		        'id_user'=>$this->input->post('id_user'),
	            'nm_user'=>$this->input->post('nm_user'),
	            'username'=>$this->input->post('username'),
	            'password'=>md5($this->input->post('password')),
	            'email_user'=>$this->input->post('email_user'),
	            'alamt_user'=>$this->input->post('alamt_user'),
	            'notelp_user'=>$this->input->post('notelp_user'),
	        );
	        $this->adminm->insertData('tbl_user',$data);

    	} elseif ($key == '' AND $pass == '') {

	        $id['id_user'] = $this->input->post('id');
	        $data=array(
	            'nm_user'=>$this->input->post('nm_user'),
	            'username'=>$this->input->post('username'),
	            'email_user'=>$this->input->post('email_user'),
	            'alamt_user'=>$this->input->post('alamt_user'),
	            'notelp_user'=>$this->input->post('notelp_user'),
	        );
	        $this->adminm->updateData('tbl_user',$data,$id);

    	} elseif ($key == '' AND $pass != '') {
	        $id['id_user'] = $this->input->post('id');
	        $data=array(
	            'nm_user'=>$this->input->post('nm_user'),
	            'username'=>$this->input->post('username'),
	            'password'=>md5($this->input->post('password')),
	            'email_user'=>$this->input->post('email_user'),
	            'alamt_user'=>$this->input->post('alamt_user'),
	            'notelp_user'=>$this->input->post('notelp_user'),
	        );
	        $this->adminm->updateData('tbl_user',$data,$id);
    	}
        redirect("adminc/data_admin");
    }

    function proses_hapus_user(){
        $id['id_user'] = $this->uri->segment(3);
        $this->adminm->deleteData('tbl_user',$id);
        redirect("adminc/data_admin");
    }


}
