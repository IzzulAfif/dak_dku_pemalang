<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_dak extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get( $id=false)
	{
		$this->db->select('*');
		$this->db->where('deleted', 0);
		if ($id!=false) {
			$this->db->where('id', $id);
		}
		$this->db->where('tahun', $this->session->userdata('tahun'));
		$this->db->from('dak');
		$query 	= $this->db->get();
		$result = $query->result_array();
		return $result;
	}
		public function get_by_jenis_sub_jenis( $id_jenis=false, $id_sub_jenis=false)
	{
		$this->db->select('*');
		$this->db->where('deleted', 0);
		if ($id_jenis!=false) {
			$this->db->where('id_jenis', $id_jenis);
		}
		if ($id_sub_jenis!=false) {
			$this->db->where('id_sub_jenis', $id_sub_jenis);
		}
		$this->db->where('tahun', $this->session->userdata('tahun'));
		$this->db->from('dak');
		$query 	= $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function add()
	{

		$object  	= $_POST;

		$query = $this->db->insert('dak', $object);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}

	public function edit()
	{
		$object = $_POST;

	
		$this->db->where('id', $this->input->post('id'));
		$query = $this->db->update('dak', $object);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}

	public function delete($id)
	{
		$object = array('deleted' => 1);
		$this->db->where('id', $id);
		$this->db->update('dak', $object);
	}

	public function create($object)
	{

		$object  	= $_POST;

		$query = $this->db->insert('dak', $object);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}

}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */