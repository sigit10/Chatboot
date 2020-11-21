<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userc extends CI_Controller {
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') == FALSE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
    }

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

	public function data_user()
	{
		if ($this->session->userdata('LEVEL') == 'User') {

	        $id_user['id_user']= $this->session->userdata('ID');
	        $data=array(
	            'headerTitle'=>'Data User',
	            'formTitle'=>'Data User',
	            'active_admin'=>'active',

	            'data_user'=>$this->adminm->getSelectedData('tbl_user',$id_user),
	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/user/manage_data_user');
			$this->load->view('elements/footer');

		} else {
	        $data=array(
	            'headerTitle'=>'Data User',
	            'formTitle'=>'Data User',
	            'active_admin'=>'active',
	            'data_user'=>$this->adminm->get_all_data_user(),
	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/user/data_user');
			$this->load->view('elements/footer');			
		}
	}

	public function manage_data_user()
	{
        $id= $this->uri->segment(3);
		if ($id == '') {

	        $data=array(
	            'headerTitle'=>'Form Tambah Data User',
	            'formTitle'=>'Data User',
	            'active_admin'=>'active',

	            'id'=>$this->adminm->id_user(),
	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/user/manage_data_user');
			$this->load->view('elements/footer');

		} else {
	        $id_user['id_user']= $this->uri->segment(3);
	        $data=array(
	            'headerTitle'=>'Data User',
	            'formTitle'=>'Data User',
	            'active_admin'=>'active',

	            'data_user'=>$this->adminm->getSelectedData('tbl_user',$id_user),
	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/user/manage_data_user');
			$this->load->view('elements/footer');

		}
	}

    function proses_data_user() {
        $key     = $this->input->post('id_user');
        $pass    = $this->input->post('password');
    	if ($key != '') {

	        $data=array(
		        'id_user'=>$this->input->post('id_user'),
	            'nm_user'=>$this->input->post('nm_user'),
	            'username'=>$this->input->post('username'),
	            'password'=>md5($this->input->post('password')),
	            'level_user'=>$this->input->post('level_user'),
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

		if ($this->session->userdata('LEVEL') == 'User') {
	        redirect("loginc/logout");		
		} else {
	        redirect("userc/data_user");
		}

    }

    function proses_hapus_user(){
        $id['id_user'] = $this->uri->segment(3);
        $this->adminm->deleteData('tbl_user',$id);
        redirect("userc/data_user");
    }

}
