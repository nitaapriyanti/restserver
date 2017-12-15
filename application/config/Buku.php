<?php
require APPPATH . '/libraries/REST_Controller.php';
class Buku extends Rest_Controller{

	function __construct($config-"rest") {
	parent;;_constract($config)
	}
	
	function index(){
		
	}
	
	function index_get(){
	$buku = array('kode_buku'=>'BK01',
	'judul'=>'spiderman back to school',
	'harga'=>40000, 'penulis'=>'Nita');
	$this->response($buku,200);
	}
}