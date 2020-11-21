<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginc extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('LEVEL') != '' ){
            redirect('userc');
        };

        $data=array(
        );		
		$this->load->view('pages/login',$data);
	}

/*===========================================================================================================================================*/
/*===========================================================================================================================================*/


    function proses_login() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //query the database
        $result = $this->adminm->login($username, $password);
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                //create the session
                $sess_array = array(
                    'ID' => $row->id_user,
                    'USERNAME' => $row->username,
                    'PASS'=>$row->password,
                    'NAME'=>$row->nm_user,
                    'LEVEL' => $row->level_user,
                    'login_status'=>true,
                );
                //set session with value from database
                $this->session->set_userdata($sess_array);

                if ($this->session->userdata('LEVEL') == 'Admin'){ 
                redirect('userc','refresh');
                } else {
                redirect('frontendc','refresh');                    
                }

            }
            return TRUE;
        } else {
            //jika validasi salah
            $this->session->set_flashdata('notif','Username atau Password salah');
            redirect('','refresh');
            return FALSE;
        }
    }

    function proses_signup() {

        $username = $this->input->post('username');
        $email = $this->input->post('email_user');

        $result = $this->adminm->cek_username($username);
        $result2 = $this->adminm->cek_email($email);

        if ($result) {
            $this->session->set_flashdata('notif','Username sudah digunakan');
            redirect('frontendc/login','refresh');
        } elseif ($result2) {
            $this->session->set_flashdata('notif','Email sudah digunakan');
            redirect('frontendc/login','refresh');
        }

        $id_user = $this->adminm->id_user();
        $data=array(
            'id_user'=>$id_user,
            'nm_user'=>$this->input->post('nm_user'),
            'username'=>$this->input->post('username'),
            'password'=>md5($this->input->post('password')),
            'email_user'=>$this->input->post('email_user'),
            'alamt_user'=>$this->input->post('alamt_user'),
            'notelp_user'=>$this->input->post('notelp_user'),
            'level_user'=>'User',
        );

        $this->adminm->insertData('tbl_user',$data);
/*
        $sess_array = array(
            'ID' => $id_user,
            'USERNAME' => $this->input->post('username'),
            'PASS'=>$this->input->post('username'),
            'NAME'=>$this->input->post('nm_user'),
            'LEVEL' => 'User',
            'login_status'=>true,
        );
        //set session with value from database
        $this->session->set_userdata($sess_array);
*/
        $this->session->set_flashdata('notif_berhasil','Pendaftaran telah berhasil');
        redirect('frontendc/login','refresh');

    }

    function logout() {

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();

        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('PASS');
        $this->session->unset_userdata('NAME');
        $this->session->unset_userdata('LEVEL');
        $this->session->unset_userdata('login_status');
        $this->session->sess_destroy();
        redirect('');
    }

}
