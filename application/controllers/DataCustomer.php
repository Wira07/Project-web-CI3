<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataCustomer extends CI_Controller {

	public function index()
	{
		$this->load->view('tampilan_data_customer');
	}
	
	public function tambah()
	{
		$this->load->view('tampilan_data_customer_tambah');
	}
	
	public function tambah_proses()
	{
		$data = $this->input->post();

		$arr = array(
			'no_pol' 		=> $data['plat_nomor'],
		);

		$result = $this->db->insert('member', $arr);

		redirect("DataCustomer");
	}

	public function edit($id)
	{
		$data = array(
			'data'	=> $this->db->get_where('member', ['id_member' => $id])->row()
		);
		$this->load->view('tampilan_data_customer_edit', $data);
	}
	
	public function edit_proses($id)
	{
		$data = $this->input->post();

		$arr = array(
			'no_pol' 		=> $data['plat_nomor'],
		);

		$result = $this->db->update('member', $arr, ['id_member' => $id]);

		redirect("DataCustomer");
	}

	public function hapus($id)
	{
		$result = $this->db->delete('member', ['id_member' => $id]);

		redirect("DataCustomer");
	}
}
