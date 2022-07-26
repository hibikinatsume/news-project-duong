<?php

/**
 * Created by PhpStorm.
 * User: hana
 * Date: 21/03/2019
 * Time: 22:11
 */
class News_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    protected $table = 'news';

    public function get_news($key = null, $limit = null, $start = 0, $data = array())
    {
        if ($limit != null) {
            $this->db->limit($limit, $start);
        }
        if ($data != array()) {
            $this->db->where($data);
        }
        if ($key != null) {
            $this->db->like('title', $key);
        }
        $this->db->select(
            'category.id as id_type,category.name AS name_type,
			 news.title,news.id as id_new,news.describe,
			  news.thumbnail,news.status,news.day_update,users.introduce,
			   users.name AS name_user,
				users.avatar,users.id_google,
				 permission.name AS name_per');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id =' . $this->table . '.id_type');
        $this->db->join('users', 'users.id =' . $this->table . '.id_user');
        $this->db->join('permission', 'permission.id = users.id_per');
        $query = $this->db->get();
        return $query->result();


    }

    public function search_posts($key, $limit = null, $start = 0, $data = array())
    {
        if ($limit != null) {
            $this->db->limit($limit, $start);
        }
        if ($data != array()) {
            $this->db->where($data);
        }
        if ($key != array()) {
            $this->db->like('news.title', $key);
        }
        $this->db->select(
            'category.id as id_type,category.name AS name_type,
			 news.title,news.id as id_new,news.describe,
			  news.thumbnail,news.status,news.day_update,users.introduce,
			   users.name AS name_user,
				users.avatar,users.id_google,
				 permission.name AS name_per');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id =' . $this->table . '.id_type');
        $this->db->join('users', 'users.id =' . $this->table . '.id_user');
        $this->db->join('permission', 'permission.id = users.id_per');
        $query = $this->db->get();
        return $query->result();
    }

    public function search_users_by($data = array())
    {
        $this->db->select(
            'category.name AS name_type,
				 news.title,news.describe,
				  news.thumbnail,news.status,news.day_update,users.introduce,
				   users.name AS name_user,
				    users.avatar,users.id_google,
				     permission.name AS name_per');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id =' . $this->table . '.id_type');
        $this->db->join('users', 'users.id =' . $this->table . '.id_user');
        $this->db->join('permission', 'permission.id = users.id_per');
        $this->db->like($data);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by($limit = null, $start = 0, $data = array())
    {

        if ($limit != null) {
            $this->db->limit($limit, $start);

        }
        $this->db->select(
            'category.name AS name_type, category.id as id_type, news.date, news.id,
				 news.title,news.describe,news.content,
				  news.thumbnail,news.status,news.day_update,
				   news.hot,users.name AS name_user,users.introduce,
				    users.avatar,users.id_google,
				     permission.name AS name_per');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id =' . $this->table . '.id_type');
        $this->db->join('users', 'users.id =' . $this->table . '.id_user');
        $this->db->join('permission', 'permission.id = users.id_per');
        $this->db->where($data);
        $this->db->order_by('news.day_update', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_array($limit = null, $start = 0, $data = array())
    {

        if ($limit != null) {
            $this->db->limit($limit, $start);

        }
        $this->db->select(
            'category.name AS name_type, category.id as id_type, news.date, news.id,
				 news.title,news.describe,news.content,
				  news.thumbnail,news.status,news.day_update,
				   news.hot,users.name AS name_user,users.introduce,
				    users.avatar,users.id_google,
				     permission.name AS name_per');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id =' . $this->table . '.id_type');
        $this->db->join('users', 'users.id =' . $this->table . '.id_user');
        $this->db->join('permission', 'permission.id = users.id_per');
        $this->db->where($data);
        $this->db->order_by('news.day_update', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_order_by($limit = null)
    {
        if ($limit != null) {
            $this->db->limit($limit);
        }
        $this->db->select(
            'category.name AS name_type,news.date, news.id,
				 news.title,news.describe,news.content,
				  news.thumbnail,news.status,news.day_update,
				   news.hot,users.name AS name_user,users.introduce,
				    users.avatar,users.id_google,
				     permission.name AS name_per');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id =' . $this->table . '.id_type');
        $this->db->join('users', 'users.id =' . $this->table . '.id_user');
        $this->db->join('permission', 'permission.id = users.id_per');
        $this->db->where(array('news.status' => 1));
        $this->db->order_by('news.day_update', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_or($limit = null, $start = 0, $id = null)
    {

        if ($limit != null) {
            $this->db->limit($limit, $start);

        }
        $this->db->select(
            'category.name AS name_type,news.date, news.id,
				 news.title,news.describe,news.content,
				  news.thumbnail,news.status,news.day_update,
				   news.hot,users.name AS name_user,users.introduce,
				    users.avatar,users.id_google,
				     permission.name AS name_per');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id =' . $this->table . '.id_type');
        $this->db->join('users', 'users.id =' . $this->table . '.id_user');
        $this->db->join('permission', 'permission.id = users.id_per');
        $this->db->where('news.status', 1)->where("(category.id=$id OR category.id_parent=$id)");
        $this->db->order_by('news.day_update', 'DESC');
        $query = $this->db->get();
        return $query->result();


    }

    public function count_news_or($id, $id_parent)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id = ' . $this->table . '.id_type');
        $this->db->where('news.status', 1)->where("(category.id=$id OR category.id_parent=$id_parent)");
        $query = $this->db->Count_all_results();
        return $query;

    }

    public function get_by_row_limit($limit = null, $start = 0, $data = array())
    {
        if ($limit != null) {
            $this->db->limit($limit, $start);
        }
        $this->db->select(
            'category.id as id_type, category.name AS name_type,news.date, news.id,
				 news.title,news.describe,news.content,
				  news.thumbnail,news.status,news.day_update,
				   news.hot,users.name AS name_user,users.introduce,
				    users.avatar,users.id_google,
				     permission.name AS name_per');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id =' . $this->table . '.id_type');
        $this->db->join('users', 'users.id =' . $this->table . '.id_user');
        $this->db->join('permission', 'permission.id = users.id_per');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->first_row();


    }

    public function get_by_row($data = array())
    {
        $this->db->select(
            'category.id as id_type, category.name AS name_type,news.date, news.id,
				 news.title,news.describe,news.content,
				  news.thumbnail,news.status, news.day_update,
				   news.hot,users.name AS name_user,users.introduce,
				    users.avatar,users.id_google,
				     permission.name AS name_per');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id =' . $this->table . '.id_type');
        $this->db->join('users', 'users.id =' . $this->table . '.id_user');
        $this->db->join('permission', 'permission.id = users.id_per');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->first_row();


    }

    public function get_random($limit = null, $start = 0, $data = array())
    {

        if ($limit != null) {
            $this->db->limit($limit, $start);

        }
        $this->db->select(
            'category.id as id_type, category.name AS name_type,news.date, news.id,
				 news.title,news.describe,news.content,
				  news.thumbnail,news.status,news.day_update,
				   news.hot,users.name AS name_user,users.introduce,
				    users.avatar,users.id_google,
				     permission.name AS name_per');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id =' . $this->table . '.id_type');
        $this->db->join('users', 'users.id =' . $this->table . '.id_user');
        $this->db->join('permission', 'permission.id = users.id_per');
        $this->db->where($data);
        $this->db->order_by('rand()');
        $query = $this->db->get();
        return $query->result();

    }

    public function get_view($limit = null, $data = array())
    {

        if ($limit != null) {
            $this->db->limit($limit);

        }
        if ($data != array()) {
            $this->db->where($data);
        }
        $this->db->select(
            'category.name AS name_type, category.id as id_type,news.date, news.id,
				 news.title,news.describe,news.content,
				  news.thumbnail,news.status,news.day_update,
				   news.hot,users.name AS name_user,users.introduce,
				    users.avatar,users.id_google,
				     permission.name AS name_per');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id =' . $this->table . '.id_type');
        $this->db->join('users', 'users.id =' . $this->table . '.id_user');
        $this->db->join('permission', 'permission.id = users.id_per');
        $this->db->order_by('news.view DESC', 'news.day_update DESC');
        $query = $this->db->get();
        return $query->result();

    }

    public function get_first_view($data = array())
    {

        $this->db->select(
            'category.name AS name_type,category.id AS id_type,news.date, news.id,
				 news.title,news.describe,news.content,
				  news.thumbnail,news.status,news.day_update,
				   news.hot,users.name AS name_user,users.introduce,
				    users.avatar,users.id_google,
				     permission.name AS name_per');
        $this->db->from($this->table);
        $this->db->join('category', 'category.id =' . $this->table . '.id_type');
        $this->db->join('users', 'users.id =' . $this->table . '.id_user');
        $this->db->join('permission', 'permission.id = users.id_per');
        $this->db->where($data);
        $this->db->order_by('news.view DESC', 'news.day_update DESC');
        $query = $this->db->get();
        return $query->first_row('array');

    }

    public function count_view($id, $data = array())
    {
        $this->db->set($data[0], $data[1], false);
        $this->db->where(array('id' => $id));
        $this->db->update($this->table);
    }

    public function sum_view()
    {
        $this->db->select_sum('view');
        $query = $this->db->get($this->table)->row();
        return $query->view;
    }

    public function count_comment($data =array())
    {
        $this->db->select('count(comment.id) as count');
        $this->db->from($this->table);
        $this->db->join('comment','comment.id_new ='.$this->table. '.id');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->first_row('array');
    }
}
