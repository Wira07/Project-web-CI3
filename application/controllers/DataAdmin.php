<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAdmin extends CI_Controller {

	public function index()
	{
		$this->load->view('tampilan_data_admin');
	}
	
	public function tambah()
	{
		$this->load->view('tampilan_data_admin_tambah');
	}
	
	public function tambah_proses()
	{
		$data = $this->input->post();

		$arr = array(
			'nm_user' 		=> $data['nama'],
			'password'	=> $data['password'],
			'role'	=> $data['jabatan'],
		);

		$result = $this->db->insert('user', $arr);

		redirect("DataAdmin");
	}

	public function edit($id)
	{
		$data = array(
			'data'	=> $this->db->get_where('user', ['id_user' => $id])->row()
		);
		$this->load->view('tampilan_data_admin_edit', $data);
	}
	
	public function edit_proses($id)
	{
		$data = $this->input->post();

		if ($data['password'] == ""){
			$arr = array(
				'nm_user' 		=> $data['nama'],
				'role'	=> $data['jabatan'],
			);
		}else{
			$arr = array(
				'nm_user' 		=> $data['nama'],
				'password'	=> $data['password'],
				'role'	=> $data['jabatan'],
			);
		}

		$result = $this->db->update('user', $arr, ['id_user' => $id]);

		redirect("DataAdmin");
	}

	public function hapus($id)
	{
		$result = $this->db->delete('user', ['id_user' => $id]);

		redirect("DataAdmin");
	}
}
