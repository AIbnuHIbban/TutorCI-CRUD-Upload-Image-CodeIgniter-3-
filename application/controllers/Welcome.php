<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
		$data['gambar'] = $this->M_Welcome->getDataGambar()->result();
		$data['error']  = '';

		$this->load->view('welcome_message', $data);
	}

	public function upload(){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'png|jpg|gif';
		$config['max_size']             = 2048;
		$config['max_width']            = 40000;
		$config['max_height']           = 40000;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('welcome_message', $error);
		}
		else{
			$upload_data = $this->upload->data();
			$name = $upload_data['file_name'];

			$insert = $this->M_Welcome->insertGambar($name);

			if ($insert) {
				redirect(base_url());
			}else{
				echo "Gagal";
			}
		}
	}

	public function hapusFile($id){
		$data = $this->M_Welcome->getDataByID($id)->row();
		$nama = './uploads/'.$data->foto;

		if(is_readable($nama) && unlink($nama)){
			$delete = $this->M_Welcome->hapusFile($id);
			redirect(base_url());
		}else{
			echo "Gagal";
		}
	}
	public function kehalamanEdit($id){
		$data['data'] = $this->M_Welcome->getDataByID($id)->row();

		$this->load->view('halaman_edit', $data);
	}

	public function editUpload(){
		$id = $this->input->post('id');
		
		$data = $this->M_Welcome->getDataByID($id)->row();
		$nama = './uploads/'.$data->foto;

		if(is_readable($nama) && unlink($nama)){
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'png|jpg|gif';
			$config['max_size']             = 2048;
			$config['max_width']            = 40000;
			$config['max_height']           = 40000;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('welcome_message', $error);
			}
			else{
				$upload_data = $this->upload->data();
				$name = $upload_data['file_name'];

				$data = array(
					'nama'	=> $this->input->post('judul'),
					'foto'	=> $name
				);
				$update = $this->M_Welcome->updateFile($id, $data);

				if ($update) {
					redirect(base_url());
				}else{
					echo "Gagal";
				}
			}



			
		}else{
			echo "Gagal";
		}



		
	}
}
