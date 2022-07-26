<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 21/03/2019
 * Time: 22:08
 */
class Permission_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	protected $table = 'permission';

	public function get_by_per($id_per)
	{
		$this->db->select(
			'users.id as id_user,
		 	 users.name AS name_user,users.id_google,
		 	 users.email, users.address,users.introduce,
		 	 users.avatar, permission.id AS id_per,
		 	 permission.name AS name_per');
		$this->db->from($this->table);
		$this->db->join('users', 'users.id_per =' . $this->table . '.id');
		$this->db->where(array('permission.id' => $id_per));
		$query = $this->db->get();
		return $query->result();
	}
}
