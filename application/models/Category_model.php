<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 20/03/2019
 * Time: 15:38
 */
class Category_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	protected $table = 'category';
	public function removeAll($data = array()){
		$this->db->where_in('id', $data);
		$this->db->delete('category');
	}

}
