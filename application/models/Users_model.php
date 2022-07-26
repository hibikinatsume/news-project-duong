<?php

/**
 * Created by PhpStorm.
 * User: hana
 * Date: 21/03/2019
 * Time: 22:11
 */
class Users_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	protected $table = 'users';

	public function get_users($limit = null, $start = 0, $data = array())
	{
		if ($limit != null) {
			$this->db->limit($limit,$start);
		}
		if ($data != array())
		{
			$this->db->where($data);
		}
		$this->db->select(
			'users.id as id_user,
		 users.name AS name_user,
		 users.email, users.address,users.introduce,users.id_google,
		 users.avatar, permission.id AS id_per,
		 permission.name AS name_per');
		$this->db->from($this->table);
		$this->db->join('permission', 'permission.id =' . $this->table . '.id_per');
		$query = $this->db->get();
		return $query->result();


	}

	public function search_users_by($data = array())
	{
		$this->db->select(
			'users.id as id_user,
		 	 users.name,
		 	 users.email, users.address,users.introduce,users.id_google,
		 	 users.avatar, permission.id AS id_per,
		 	 permission.name AS name_per');
		$this->db->from($this->table);
		$this->db->join('permission', 'permission.id =' . $this->table . '.id_per');
		$this->db->like($data);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by($data)
	{
		$this->db->select(
			'users.id as id_user,
		 	 users.name,users.id_google,
		 	 users.email, users.address, users.password,users.introduce,
		 	 users.avatar, permission.id AS id_per,
		 	 permission.name AS name_per,permission.news,
		 	 permission.users,permission.category,
		 	 permission.permission,permission.comments');
		$this->db->from($this->table);
		$this->db->join('permission', 'permission.id =' . $this->table . '.id_per');
		$this->db->where($data);
		$query = $this->db->get();
		return $query->first_row();
	}
}
