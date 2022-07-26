<?php

/**
 * Created by PhpStorm.
 * User: hana
 * Date: 21/03/2019
 * Time: 09:54
 */
class MY_Model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	protected $table = '';

	public function get_all($limit = null, $start = 0, $data = array())
	{
		if ($limit != null) {
			$this->db->limit($limit, $start);
		}
		if ($data != array())
		{
			$this->db->where($data);
		}
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_where($data = array())
	{

		$query = $this->db->get_where($this->table, $data);
		return $query->first_row();
	}



	public function add($data = array())
	{
		$query = $this->db->insert($this->table, $data);
		return ($query) ? $this->db->insert_id() : false;
	}

	public function edit($id, $data = array())
	{
		$this->db->update($this->table, $data, array('id' => $id));
	}
	public function remove($id)
	{
		$this->db->delete($this->table, array('id' => $id));
	}

	public function count($data = array())
	{
		if ($data == array()) {
			$query = $this->db->get($this->table);
			return $query->num_rows();
		} else {
			$query = $this->db->get_where($this->table, $data);
			return $query->num_rows();
		}

	}

	public function count_or($data = array())
	{

		$this->db->or_where($data);
		$query = $this->db->get($this->table);
		return $query->num_rows();


	}

	public function search_by($data = array())
	{
		$this->db->like($data);
		$query = $this->db->get($this->table);
		return $query->result();
	}
}
