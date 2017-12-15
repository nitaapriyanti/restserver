<?php
require APPPATH . '/libraries/REST_Controller.php';
class Buku extends Rest_Controller{

	function __construct($config = 'rest') {
		parent::__construct($config);
	}
	
	function index_get(){
	/*$buku = array('kode_buku'=>'BK01',
	'judul'=>'spiderman back to school',
	'harga'=>40000, 'penulis'=>'Nita');*/
	
	$buku=$this->db->get('buku')->result();
	
	$this->response($buku,200);
	}
	function index_post(){
		$data = array(
						'kode_buku' => $this->post('kode_buku'),
						'judul_buku' => $this->post('judul_buku'),
						'harga_buku' => $this->post('harga_buku'),
						'penulis' => $this->post('penulis'));
	$insert = $this->db->insert('buku',$data);
	if($insert){
		$this->response($data,200);
	}else{
		$data = array('status'=>'gagal insert');
		$this->response($data,200);
	}
	}

	function index_put() {
        $kode_buku = $this->put('kode_buku');
        $data = array(
                    'kode_buku' => $this->put('kode_buku'),
						'judul_buku' => $this->put('judul_buku'),
						'harga_buku' => $this->put('harga_buku'),
						'penulis' => $this->put('penulis'));
        $this->db->where('kode_buku', $kode_buku);
        $update = $this->db->update('buku', $data);
        if ($update){
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete(){
    	$kode_buku = $this->delete('kode_buku');
    	$this->db->where('kode_buku', $kode_buku);
    	$delete = $this->db->delete('buku');
    	if($delete){
    		$this->response(array('status' => 'success'), 201);
    	} else {
    		$this->response(array('status' => 'fail', 502));
    	}

    }
}
?>