<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class frontendc extends CI_Controller {
    function __construct(){
        parent::__construct();
/*
        if($this->session->userdata('LEVEL') == '' ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
*/
    }

/*===========================================================================================================================================*/
/*===========================================================================================================================================*/

	public function index()
	{
        $data=array(
            'data_produk'=>$this->adminm->getAllData('tbl_produk'),
        );
		$this->load->view('elements/frontend_header', $data);
		$this->load->view('pages/frontend/slider');
		$this->load->view('pages/frontend/home');
		$this->load->view('elements/frontend_footer');
	}

    public function cari_produk()
    {
        $kategori_produk = $this->input->post('kategori_produk');
        $nm_produk = $this->input->post('nm_produk');

        if ($kategori_produk == '' AND $nm_produk == '') {

            $data=array(
                'data_produk'=>$this->adminm->getAllData('tbl_produk'),
            );

        } elseif ($kategori_produk != '' AND $nm_produk == '') {

            $data=array(
                'data_produk'=>$this->adminm->get_produk_kat($kategori_produk),
            );

        } elseif ($kategori_produk != '' AND $nm_produk != '') {

            $data=array(
                'data_produk'=>$this->adminm->get_produk_katnam($kategori_produk, $nm_produk),
            );

        } elseif ($kategori_produk == '' AND $nm_produk != '') {

            $data=array(
                'data_produk'=>$this->adminm->get_produk_nam($nm_produk),
            );

        }


        $this->load->view('elements/frontend_header', $data);
        $this->load->view('pages/frontend/home');
        $this->load->view('elements/frontend_footer');
    }

	public function login()
	{
        $data=array(

        );
		$this->load->view('elements/frontend_header', $data);
		$this->load->view('pages/frontend/login');
		$this->load->view('elements/frontend_footer');
	}

    public function tentang_kami()
    {
        $data=array(

        );
        $this->load->view('elements/frontend_header', $data);
        $this->load->view('pages/frontend/tentang_kami');
        $this->load->view('elements/frontend_footer');
    }

    public function cara_beli()
    {
        $data=array(

        );
        $this->load->view('elements/frontend_header', $data);
        $this->load->view('pages/frontend/cara_beli');
        $this->load->view('elements/frontend_footer');
    }

	public function keranjang()
	{
        $data=array(

        );
		$this->load->view('elements/frontend_header', $data);
		$this->load->view('pages/frontend/keranjang');
		$this->load->view('elements/frontend_footer');
	}
    public function chatToko()
    {
        $data=array(

        );
      $this->load->view('elements/chatbot', $data);
      //  $this->load->view('pages/frontend/keranjang');
      //  $this->load->view('elements/frontend_footer');
    }


    function update_qty($id_produk){
        $stok_produk =  $this->input->post('stok_produk');
        $qty =  $this->input->post('qty');
        if ($qty > $stok_produk) {

            $this->session->set_flashdata('notif','Stok tidak memenuhi !');
            redirect('frontendc/keranjang');

        }
        $id = $this->uri->segment(3);
        $data = array(
            'rowid' => $id,
            'qty'   =>$qty,
        );

        $this->cart->update($data);

        redirect('frontendc/keranjang');

    }

    function delete_qty($id_produk){
        $id = $this->uri->segment(3);
        $data = array(
            'rowid' => $id,
            'qty'   => '0',
        );

        $this->cart->update($data);
        
        redirect('frontendc/keranjang');

    }

    function masukan_keranjang($id_produk){

        if ($this->session->userdata('login_status') == FALSE) {
            redirect('frontendc/login');
        }

        $product = $this->adminm->find($id_produk);
        $data = array(
                        'id'      => $product->id_produk,
                        'qty'     => 1,
                        'price'   => $product->harga_produk,
                        'name'    => $product->nm_produk,
                        'options' => array(
                            'foto_produk' => $product->foto_produk,
                            'stok_produk' => $product->stok_produk
                            )
                    );

        $this->cart->insert($data);
        redirect('frontendc/keranjang');

    }

    function chat_bot($id_produk){

        if ($this->session->userdata('login_status') == FALSE) {
            redirect('chatbot');
        }

        $product = $this->adminm->find($id_produk);
        $data = array(
                        'id'      => $product->id_produk,
                        'qty'     => 1,
                        'price'   => $product->harga_produk,
                        'name'    => $product->nm_produk,
                        'options' => array(
                            'foto_produk' => $product->foto_produk,
                            'stok_produk' => $product->stok_produk
                            )
                    );

        $this->cart->insert($data);
        redirect('chatbot');

    }


    function bersihkan_keranjang(){

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();

        redirect('frontendc/keranjang');
    }

    function proses_pembelian(){
        $id_pembelian = $this->adminm->id_pembelian();
        $data = array(
            'id_pembelian'=>$id_pembelian,
            'id_user'=>$this->session->userdata('ID'),
            'id_kurir'=>$this->input->post('id_kurir'),
            'tgl_pembelian'=>date('Y-m-d'),
            'status_pembelian'=>'Proses',
            'total_pembelian'=>$this->cart->total(),
        );
        $this->adminm->insertData("tbl_pembelian",$data);

        foreach($this->cart->contents() as $items){
            $id_produk = $items['id'];
            $qty = $items['qty'];
            $data_detail = array(
                'id_detail_pembelian' => $this->adminm->id_detail_pembelian(),
                'id_pembelian' => $id_pembelian,
                'id_produk'=> $id_produk,
                'jumlah_pembelian'=>$qty,
            );
            $this->adminm->insertData("tbl_detail_pembelian",$data_detail);

            $update['stok_produk'] = $this->adminm->get_kurang_stok($id_produk,$qty);
            $key['id_produk'] = $id_produk;
            $this->adminm->updateData("tbl_produk",$update,$key);

        }

        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('frontendc/pembelian');
    }

    function proses_pembayaran() {

        $id_pembelian = $this->input->post('id_pembelian');

        $config['upload_path'] = './uploads/bukti';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = '100000';

        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('foto_transfer')) {
            $this->session->set_flashdata('notif','Upload file berupa png, jpg, atau gif !');
            redirect('frontendc/detail_pembelian/'.$id_pembelian);
        } else {
            $foto_transfer = $this->upload->data();
            $id['id_pembelian'] = $id_pembelian;
            $data = array (
                'no_resi' => $this->input->post('no_resi'),
                'status_pembelian' => 'Kirim',
                'foto_transfer' => $foto_transfer['file_name']
            );
            $this->adminm->updateData('tbl_pembelian',$data,$id);
        }

        redirect('frontendc/detail_pembelian/'.$id_pembelian);
    }

    function kirim_resi() {

        $id_pembelian = $this->input->post('id_pembelian');

        $id['id_pembelian'] = $id_pembelian;
        $data = array (
            'no_resi' => $this->input->post('no_resi'),
            'status_pembelian' => 'Kirim',
        );
        $this->adminm->updateData('tbl_pembelian',$data,$id);

        redirect('frontendc/detail_pembelian/'.$id_pembelian);
    }

    function terima_pembayaran() {

        $id['id_pembelian'] = $this->input->post('id_pembelian');
        $data=array(
            'status_pembelian'=>'Selesai',
        );
        $this->adminm->updateData('tbl_pembelian',$data,$id);

        redirect('frontendc/detail_pembelian/'.$this->input->post('id_pembelian'));
    }

    public function pembelian()
    {
        $id = $this->session->userdata('ID');
        $data=array(
            'data_pembelian'=>$this->adminm->get_data_pembelian($id),
        );
        $this->load->view('elements/frontend_header', $data);
        $this->load->view('pages/frontend/pembelian');
        $this->load->view('elements/frontend_footer');
    }

    public function detail_pembelian()
    {
        $id =  $this->uri->segment(3);
        $data=array(
            'id_pembelian'=>$id ,
            'data_pembelian'=>$this->adminm->get_pembelian($id),
            'detail_pembelian'=>$this->adminm->get_detail_pembelian($id),
        );
        $this->load->view('elements/frontend_header', $data);
        $this->load->view('pages/frontend/detail_pembelian');
        $this->load->view('elements/frontend_footer');
    }

    function proses_hapus_topologi(){
        $id['id_topologi'] = $this->uri->segment(3);
        $this->adminm->deleteData('tbl_topologi',$id);
        redirect("frontend/data_topologi");
    }

}
