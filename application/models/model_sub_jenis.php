<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_sub_jenis extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($jenise=false, $id=false)
	{
		$this->db->select('*');
		$this->db->where('deleted', 0);
		if ($id!=false) {
			$this->db->where('id', $id);
		}
		if ($jenise!=false) {
			$this->db->where('dak_bku', $jenise);
		}
		$this->db->from('sub_jenis_dak_bku');
		$query 	= $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function get_by_id_jenis($jenise=false, $id_jenis=false)
	{
		$this->db->select('*');
		$this->db->where('deleted', 0);
		if ($id_jenis!=false) {
			$this->db->where('id_jenis', $id_jenis);
		}
		if ($jenise!=false) {
			$this->db->where('dak_bku', $jenise);
		}
		$this->db->from('sub_jenis_dak_bku');
		$query 	= $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function add()
	{

		$object  	= $_POST;

		$query = $this->db->insert('sub_jenis_dak_bku', $object);

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
		$query = $this->db->update('sub_jenis_dak_bku', $object);

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
		$this->db->update('sub_jenis_dak_bku', $object);
	}

	public function create($object)
	{

		$object  	= $_POST;

		$query = $this->db->insert('sub_jenis_dak_bku', $object);

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