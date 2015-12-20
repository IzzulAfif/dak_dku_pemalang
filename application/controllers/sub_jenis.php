<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_jenis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_in')) {
			redirect(base_url('index.php/home'));
		}
		$this->load->model('model_sub_jenis');
		$this->load->model('model_jenis');
		}

	public function index($jenise=false, $id=false)
	{
		$data['sub_jenis'] = $this->model_sub_jenis->get($jenise, $id);
		$data['fokus'] = $jenise;
		if ($id!=false) {
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/sub_jenis/edit_sub_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
		else{
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/sub_jenis/list_sub_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
	}
	public function json_by_id_jenis($jenise=false, $id_jenis=false)
	{
		$data['data'] = $this->model_sub_jenis->get_by_id_jenis($jenise, $id_jenis);
			$this->output->set_content_type('application/json')->set_output(json_encode($data));
	
	}
	public function dak($id=false)
	{
		$data['sub_jenis'] = $this->model_sub_jenis->get("dak", $id);
		$data['fokus'] = "dak";
		$data['jenis'] = $this->model_jenis->get("dak");
		
		if ($id!=false) {
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/sub_jenis/edit_sub_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
		else{
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/sub_jenis/list_sub_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
	}
	public function bku($id=false)
	{
		$data['sub_jenis'] = $this->model_sub_jenis->get("bku", $id);
		$data['fokus'] = "bku";
			$data['jenis'] = $this->model_jenis->get("bku");
	
		if ($id!=false) {
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/sub_jenis/edit_sub_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
		else{
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/sub_jenis/list_sub_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
	}

	public function add($fokus)
	{
		$data['jenis'] = $this->model_jenis->get($fokus);
		$data['fokus'] = $fokus;
		$this->load->view('template_backoffice/header');
		$this->load->view('content_backoffice/sub_jenis/add_sub_jenis', $data);
		$this->load->view('template_backoffice/footer');
	}

	public function submit()
	{

		$this->form_validation->set_rules('sub_jenis', 'Sub Bidang', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		// $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<h6 class="w-500 alert bg-red">','</h6>');

		if ($this->form_validation->run() == FALSE)
		{
			$data['jenis'] = $this->model_jenis->get($this->input->post('dak_bku'));;
			$data['fokus'] = $this->input->post('dak_bku');
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/sub_jenis/add_sub_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$insert = $this->model_sub_jenis->add();
			if ($insert==true) {
				redirect('sub_jenis/'.$this->input->post('dak_bku'));
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}

	}

	public function edit()
	{
		$this->form_validation->set_rules('sub_jenis', 'Bidang', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		// $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<h6 class="w-500 alert bg-red">','</h6>');
		
		if ($this->form_validation->run() == FALSE)
		{

			$data['sub_jenis'] = $this->model_sub_jenis->get($this->input->post('id'));
			$data['jenis'] = $this->model_jenis->get($data['sub_jenis'][0]['dak_bku']);;
			
		
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/sub_jenis/edit_sub_jenis', $data);
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$update = $this->model_sub_jenis->edit();
			if ($update==true) {
				redirect('sub_jenis/'.$this->input->post('dak_bku'));
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}
	}

	public function delete($fokus, $id)
	{
		$this->model_sub_jenis->delete($id);
		redirect('sub_jenis/'.$fokus);
		}


}

/* End of file user.php */
/* Location: ./application/controllers/user.php */