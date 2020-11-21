<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produkc extends CI_Controller {
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') == FALSE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
    }


/*===========================================================================================================================================*/
/*===========================================================================================================================================*/

	public function data_produk()
	{
		if ($this->session->userdata('LEVEL') == 'User') {

	        $id_user = $this->session->userdata('ID');
	        $data=array(
	            'headerTitle'=>'Data Produk',
	            'formTitle'=>'Data Produk',
	            'active_admin'=>'active',

	            'data_produk'=>$this->adminm->get_user_produk($id_user),
	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/produk/data_produk');
			$this->load->view('elements/footer');

		} else {
	        $data=array(
	            'headerTitle'=>'Data Produk',
	            'formTitle'=>'Tabel Data Produk',

	            'active_produk'=>'active',            
	            'data_produk'=>$this->adminm->getAllData('tbl_produk'),
	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/produk/data_produk');
			$this->load->view('elements/footer');

		}

	}

	public function manage_data_produk()
	{
        $id= $this->uri->segment(3);
		if ($id == '') {

	        $data=array(
	            'headerTitle'=>'Data Produk',
	            'formTitle'=>'Form Tambah Produk',

	            'active_produk'=>'active',            
	            'id'=>$this->adminm->id_produk(),

	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/produk/manage_data_produk');
			$this->load->view('elements/footer');

		} else {
	        $id_produk['id_produk']= $this->uri->segment(3);
	        $data=array(
	            'headerTitle'=>'Data Produk',
	            'formTitle'=>'Form Ubah Produk',

	            'active_produk'=>'active',            
	            'data_produk'=>$this->adminm->getSelectedData('tbl_produk',$id_produk),
	        );		
			$this->load->view('elements/header', $data);
			$this->load->view('pages/produk/manage_data_produk');
			$this->load->view('elements/footer');

		}
	}

    function proses_data_produk() {
        $key     = $this->input->post('id_produk');
    	if ($key != '') {

			$config['upload_path'] = './uploads/img';
			$config['allowed_types'] = 'jpg|png|gif';
			$config['max_size']	= '100000';
	
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto_produk')) {
	            $this->session->set_flashdata('notif','File harus pdf !');
				redirect('produkc/manage_data_produk');
			} else {
				$foto_produk = $this->upload->data();
				$data_surat = array (
			        'id_produk'=>$this->input->post('id_produk'),
		            'id_user'=>$this->session->userdata('ID'),
		            'nm_produk'=>$this->input->post('nm_produk'),
		            'stok_produk'=>$this->input->post('stok_produk'),
			        'harga_produk'=>$this->input->post('harga_produk'),
		            'deskripsi_produk'=>$this->input->post('deskripsi_produk'),
					'foto_produk' => $foto_produk['file_name']
				);
		        $this->adminm->insertData('tbl_produk',$data_surat);
			}

    	} elseif ($key == '') {

	        $id['id_produk'] = $this->input->post('id');
	        $data=array(
	            'nm_produk'=>$this->input->post('nm_produk'),
	            'stok_produk'=>$this->input->post('stok_produk'),
		        'harga_produk'=>$this->input->post('harga_produk'),
	            'deskripsi_produk'=>$this->input->post('deskripsi_produk'),
	        );
	        $this->adminm->updateData('tbl_produk',$data,$id);

    	} 
        redirect("produkc/data_produk");
    }

    function proses_hapus_produk(){
        $id['id_produk'] = $this->uri->segment(3);
        $this->adminm->deleteData('tbl_produk',$id);

        redirect("produkc/data_produk");
    }


}
