<?php

class adminm extends CI_Model{

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data)->result();
    }

    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }

    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

    public function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }
  
/*======================================================================================================*/
/*======================================================================================================*/
    public function id_user()
    {
        $q = $this->db->query("select MAX(RIGHT(id_user,4)) as id_max from tbl_user");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "US-".$id;
    }

    function get_all_data_admin(){
        return $this->db->query("
            SELECT *
            FROM tbl_user a
            WHERE a.level_user = 'Admin'
        ")->result();
    }

    function get_all_data_user(){
        return $this->db->query("
            SELECT *
            FROM tbl_user a
            WHERE a.level_user = 'User'
        ")->result();
    }


/*======================================================================================================*/
/*======================================================================================================*/
    public function id_produk()
    {
        $q = $this->db->query("select MAX(RIGHT(id_produk,4)) as id_max from tbl_produk");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "PR-".$id;
    }

    function get_produk_kat($kategori_produk){
        return $this->db->query("
            SELECT *
            FROM tbl_produk a
            INNER JOIN tbl_user b ON a.id_user = b.id_user
            WHERE a.kategori_produk = '$kategori_produk'
        ")->result();
    }

    function get_produk_katnam($kategori_produk,$nm_produk){
        return $this->db->query("
            SELECT *
            FROM tbl_produk a
            INNER JOIN tbl_user b ON a.id_user = b.id_user
            WHERE a.kategori_produk = '$kategori_produk' AND a.nm_produk LIKE '%$nm_produk%'
        ")->result();
    }

    function get_produk_nam($nm_produk){
        return $this->db->query("
            SELECT *
            FROM tbl_produk a
            INNER JOIN tbl_user b ON a.id_user = b.id_user
            WHERE a.nm_produk LIKE '%$nm_produk%'
        ")->result();
    }

    function get_user_produk($id_user){
        return $this->db->query("
            SELECT *
            FROM tbl_produk a
            INNER JOIN tbl_user b ON a.id_user = b.id_user
            WHERE a.id_user = '$id_user'
        ")->result();
    }

    public function find($id){
        //Query mencari record berdasarkan ID-nya
        $hasil = $this->db->where('id_produk', $id)
                          ->limit(1)
                          ->get('tbl_produk');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    }

/*======================================================================================================*/
/*======================================================================================================*/

    public function id_pembelian()
    {
        $q = $this->db->query("select MAX(RIGHT(id_pembelian,3)) as id_max from tbl_pembelian");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "PM-".$id;
    }

    function get_all_pembelian($bulan, $tahun, $status){
        return $this->db->query("
            SELECT *
            FROM tbl_pembelian a
            INNER JOIN tbl_user b ON a.id_user = b.id_user
            INNER JOIN tbl_kurir c ON a.id_kurir = c.id_kurir
            WHERE MONTH(a.tgl_pembelian) = '$bulan' AND YEAR(a.tgl_pembelian) = '$tahun' AND a.status_pembelian = '$status'
        ")->result();
    }

    function get_all_pembelian_bulan($bulan, $tahun){
        return $this->db->query("
            SELECT *
            FROM tbl_pembelian a
            INNER JOIN tbl_user b ON a.id_user = b.id_user
            INNER JOIN tbl_kurir c ON a.id_kurir = c.id_kurir
            WHERE MONTH(a.tgl_pembelian) = '$bulan' AND YEAR(a.tgl_pembelian) = '$tahun'
        ")->result();
    }

    function get_all_pembelian_status($status){
        return $this->db->query("
            SELECT *
            FROM tbl_pembelian a
            INNER JOIN tbl_user b ON a.id_user = b.id_user
            INNER JOIN tbl_kurir c ON a.id_kurir = c.id_kurir
            WHERE a.status_pembelian = '$status'
        ")->result();
    }

    function get_detail_penjualan($id_user){
        return $this->db->query("
            SELECT
            c.nm_produk, sum(a.jumlah_pembelian) as jumlah_pembelian
            FROM tbl_detail_pembelian a
            INNER JOIN tbl_pembelian b ON a.id_pembelian = b.id_pembelian
            INNER JOIN tbl_produk c ON a.id_produk = c.id_produk
            WHERE c.id_user = '$id_user'
            GROUP BY c.id_produk
        ")->result();
    }

    function get_pembelian($id_pembelian){
        return $this->db->query("
            SELECT *
            FROM tbl_pembelian a
            INNER JOIN tbl_kurir c ON a.id_kurir = c.id_kurir
            WHERE a.id_pembelian = '$id_pembelian'
        ")->result();
    }

    function get_data_pembelian($id_user){
        return $this->db->query("
            SELECT *
            FROM tbl_pembelian a
            INNER JOIN tbl_kurir c ON a.id_kurir = c.id_kurir
            WHERE a.id_user = '$id_user'
        ")->result();
    }

    function get_detail_pembelian($id_pembelian){
        return $this->db->query("
            SELECT *
            FROM tbl_detail_pembelian a
            INNER JOIN tbl_pembelian b ON a.id_pembelian = b.id_pembelian
            INNER JOIN tbl_produk c ON a.id_produk = c.id_produk
            WHERE b.id_pembelian = '$id_pembelian'
        ")->result();
    }

    function login($username, $password) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }

    function cek_username($username) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }

    function cek_email($email) {
        //create query to connect user login database
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email_user', $email);
        $this->db->limit(1);

        //get query and processing
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
    }

    function get_detail_penjualn($id_user){
        return $this->db->query("
            SELECT *
            FROM tbl_detail_pembelian a
            INNER JOIN tbl_pembelian b ON a.id_pembelian = b.id_pembelian
            INNER JOIN tbl_produk c ON a.id_produk = c.id_produk
            WHERE b.id_user = '$id_user'
        ")->result();
    }

    public function get_kurang_stok($id_produk,$kurang)
    {
        $q = $this->db->query("select stok_produk from tbl_produk where id_produk='".$id_produk."'");
        $stok_produk = "";
        foreach($q->result() as $d)
        {
            $stok_produk = $d->stok_produk - $kurang;
        }
        return $stok_produk;
    }

    public function id_detail_pembelian()
    {
        $q = $this->db->query("select MAX(RIGHT(id_detail_pembelian,3)) as id_max from tbl_detail_pembelian");
        $id = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->id_max)+1;
                $id = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $id = "0001";
        }
        return "DP-".$id;
    }

    function get_all_topologi(){
        return $this->db->query("
            SELECT *
            FROM tbl_topologi a
            INNER JOIN tbl_balai b ON a.id_balai = b.id_balai
        ")->result();
    }

    function get_selected_topologi($id){
        return $this->db->query("
            SELECT *
            FROM tbl_topologi a
            INNER JOIN tbl_balai b ON a.id_balai = b.id_balai
            WHERE a.id_topologi = '$id'
        ")->result();
    }


// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //


}
