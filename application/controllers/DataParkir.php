<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataParkir extends CI_Controller {

	public function index()
	{
		$this->load->view('tampilan_data_parkir');
	}
	
	public function tambah()
	{
		$this->load->view('tampilan_data_parkir_tambah');
	}
	
	public function tambah_proses()
	{
		date_default_timezone_set("asia/jakarta");
		$data = $this->input->post();

		$cekMember = $this->db->get_where('member', ['no_pol' => $data['plat_nomor']]);
		if ($cekMember->num_rows() > 0){
			$id_member = $cekMember->row()->id_member;
			$status = "member";
		}else{
			$id_member = null;
			$status = "tidak member";
		}

		$arr = array(
			'no_pol' 		=> $data['plat_nomor'],
			'id_kategori'	=> $data['jenis_kendaraan'],
			'jam_masuk'		=> date('Y-m-d H:i:s'),
			'id_user'		=> $this->session->userdata('userdata')->id_user,
			'status_member'	=> $status,
			'id_member'		=> $id_member
		);

		$result = $this->db->insert('data_kendaraan', $arr);

		redirect("DataParkir");
	}

	public function edit($id)
	{
		$data = array(
			'data'	=> $this->db->get_where('data_kendaraan', ['id_kendaraan' => $id])->row()
		);
		$this->load->view('tampilan_data_parkir_edit', $data);
	}
	
	public function edit_proses($id)
	{
		$data = $this->input->post();

		$arr = array(
			'no_pol' 		=> $data['plat_nomor'],
			'id_kategori'	=> $data['jenis_kendaraan'],
		);

		$result = $this->db->update('data_kendaraan', $arr, ['id_kendaraan' => $id]);

		redirect("DataParkir");
	}

	public function bayar($id)
	{
		$data = array(
			'data'	=> $this->db->join('kategori', 'data_kendaraan.id_kategori = kategori.id_kategori')->get_where('data_kendaraan', ['id_kendaraan' => $id])->row()
		);
		$this->load->view('tampilan_data_parkir_bayar', $data);
	}
	
	public function bayar_proses($id)
	{
		$dataHarga = $this->input->post('harga');
		$dataBayar = $this->input->post('bayar');

		if ($dataBayar < $dataHarga){
			$kembalian = "Uang kurang";
			redirect("DataParkir/bayar/".$id."?kurang=uang");
		}else{
			$data['kembalian'] = $dataBayar - $dataHarga;
			$this->load->view('tampilan_data_parkir_karcis', $data);
		}
		
	}

	public function keluar_sekarang($id = null)
	{
		date_default_timezone_set("asia/jakarta");
		$cekData = $this->db->join('kategori', 'data_kendaraan.id_kategori = kategori.id_kategori')->get_where('data_kendaraan', 
			[
				'id_kendaraan' => $id
			]
		)->row();

		$cekMember = $this->db->get_where('member', ['no_pol' => $cekData->no_pol])->num_rows();

		if ($cekMember > 0){
			$harga = 0;
		}else{
			$harga = $cekData->harga_1jam;
		}

		$first_date = new DateTime($cekData->jam_masuk);
		$second_date = new DateTime(date('Y-m-d H:i:s'));

		$difference = $first_date->diff($second_date);

		$total_jam_hari = $difference->format("%d") * 24;
		$total_jam		= $difference->format('%h');
		$totalJam = $total_jam_hari + $total_jam;

		if ($totalJam <= 0){
			$totalJam = 1;
		}

		$total = $harga * $totalJam;

		$editDB = $this->db->update('data_kendaraan', 
			[
				'jam_keluar'	=> date('Y-m-d H:i:s'),
				'harga'			=> $total
			],
			[
				'id_kendaraan'	=> $id
			]
			);
		
			redirect("DataParkir/bayar/".$id);
	}

	public function hapus($id)
	{
		$result = $this->db->delete('data_kendaraan', ['id_kendaraan' => $id]);

		redirect("DataParkir");
	}
}
