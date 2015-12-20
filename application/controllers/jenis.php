<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_in')) {
			redirect(base_url('index.php/home'));
		}
		$this->load->model('model_jenis');
	}

	public function index($jenise=false, $id=false)
	{
		$data['jenis'] = $this->model_jenis->get($jenise, $id);
		$data['fokus'] = $jenise;
		if ($id!=false) {
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/jenis/edit_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
		else{
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/jenis/list_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
	}
	public function dak($id=false)
	{
		$data['jenis'] = $this->model_jenis->get("dak", $id);
		$data['fokus'] = "dak";
		if ($id!=false) {
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/jenis/edit_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
		else{
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/jenis/list_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
	}
	public function bku($id=false)
	{
		$data['jenis'] = $this->model_jenis->get("bku", $id);
		$data['fokus'] = "bku";
		if ($id!=false) {
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/jenis/edit_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
		else{
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/jenis/list_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
	}

	public function add($fokus)
	{
		$data['fokus'] = $fokus;
		$this->load->view('template_backoffice/header');
		$this->load->view('content_backoffice/jenis/add_jenis', $data);
		$this->load->view('template_backoffice/footer');
	}

	public function submit()
	{

		$this->form_validation->set_rules('jenis', 'Bidang', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		// $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<h6 class="w-500 alert bg-red">','</h6>');

		if ($this->form_validation->run() == FALSE)
		{
			$data['fokus'] = $this->input->post('dak_bku');
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/jenis/add_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$insert = $this->model_jenis->add();
			if ($insert==true) {
				redirect('jenis/'.$this->input->post('dak_bku'));
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}

	}

	public function edit()
	{
		$this->form_validation->set_rules('jenis', 'Bidang', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		// $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<h6 class="w-500 alert bg-red">','</h6>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['jenis'] = $this->model_jenis->get($this->input->post('id'));

			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/jenis/edit_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$update = $this->model_jenis->edit();
			if ($update==true) {
				redirect('jenis/'.$this->input->post('dak_bku'));
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}
	}

	public function delete($fokus, $id)
	{
		$this->model_jenis->delete($id);
		redirect('jenis/'.$fokus);
		}


}

/* End of file user.php */
/* Location: ./application/controllers/user.php */