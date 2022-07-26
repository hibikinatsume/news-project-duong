<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 21/03/2019
 * Time: 22:15
 */
class Comments_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	protected $table = 'comment';

	public function get_comments($data=array(),$limit = null,$start = 0)
	{
		if ($limit != null)
		{
			$this->db->limit($limit,$start);
		}
		$this->db->select('comment.id as id_com,comment.date,
		 comment.content,
		  comment.status,
		  comment.id_rep,users.id_google,users.introduce,
		   users.avatar,
		    users.name,
		     users.id as id_user,
		      news.id as id_new');
		$this->db->from($this->table);
		$this->db->join('users','users.id = '.$this->table.'.id_user');
		$this->db->join('news','news.id = '.$this->table.'.id_new');
		$this->db->where($data);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_rep_comments($id_comment, $limit = null, $start = 0)
	{
		if ($limit != null)
		{
			$this->db->limit($limit,$start);
		}
		$this->db->select('comment.id as id_com,comment.date,
		 comment.content,
		  comment.status,
		  comment.id_rep,
		   users.avatar,users.id_google,users.introduce,
		    users.name,
		     users.id as id_user,
		      news.id as id_new');
		$this->db->from($this->table);
		$this->db->join('users','users.id = '.$this->table.'.id_user');
		$this->db->join('news','news.id = '.$this->table.'.id_new');
		$this->db->where(array('comment.id_rep' => $id_comment));
		$query = $this->db->get();
		return $query->result();
	}
	public function edit_where($data = array(),$arr = array())
    {
        $this->db->update($this->table, $arr, $data);
    }
    public function remove_where($data)
    {
        $this->db->delete($this->table, $data);
    }
}
