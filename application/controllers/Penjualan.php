<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function index(){
		$data['data'] = $this->db->query("SELECT *, jumlah_beli*harga_satuan 'subtotal', ((jumlah_beli*harga_satuan) - (jumlah_beli*harga_satuan / 100)) 'totalharga'
			FROM penjualan JOIN produk ON produk.`id_produk` = penjualan.`id_product` 
			JOIN kategori ON kategori.`id_kategory` = produk.`id_kategory`
	   	ORDER BY id_penjualan ASC");
		$this->load->view('halaman-penjualan',$data);
	}

	public function filter(){
		$awal = $this->input->post('awal');
		$akhir = $this->input->post('akhir');
		if($awal == '' || $akhir == ''){
			redirect('');
		}
		$data['data'] = $this->db->query("SELECT *, jumlah_beli*harga_satuan 'subtotal', ((jumlah_beli*harga_satuan) - (jumlah_beli*harga_satuan / 100)) 'totalharga'
			FROM penjualan JOIN produk ON produk.`id_produk` = penjualan.`id_product` 
			JOIN kategori ON kategori.`id_kategory` = produk.`id_kategory` WHERE tgl_penjualan BETWEEN '$awal' AND '$akhir'
	   	ORDER BY id_penjualan ASC");
		$this->load->view('halaman-penjualan',$data);
	}
}
