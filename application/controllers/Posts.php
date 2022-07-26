<?php

/**
 * Created by PhpStorm.
 * User: hana
 * Date: 15/03/2019
 * Time: 23:03
 */
class Posts extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('category_model');
		$this->load->model('comments_model');
		$this->load->model('users_model');
		$this->load->library('session');
	}
	public function index()
	{
		$user = $this->session->userdata('id');
		if (isset($user))
		{
			$variable = array(
				'users.id' => $user
			);
			$result['permission'] = $this->users_model->get_by($variable);
			$result['permission']->news = explode(',',$result['permission']->news);
			if (in_array('0',$result['permission']->news))
			{
				$result['new'] = $this->news_model->get_news();
                $total_records = count($result['new']);
                $page = $this->input->get('page');
                $current_page = isset($page) ? $page : 1;
                $limit = 6;
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $start = $start > 0 ? $start : 0;
                $result['news'] = $this->news_model->get_news(null,$limit,$start);
                $result['total_page'] = $total_page;
                $result['current_page'] = $current_page;
                $result['type'] = $this->category_model->get_all();
				view('master.posts.posts',$result);
			}
			else
			{
				redirect(base_url('index.php/index/error'));
			}
		}
		else
		{
            redirect(base_url('index.php/index/view_admin_login'));
		}

	}
	public function  my_posts($id)
	{
		$user = $this->session->userdata('id');
		if (isset($user))
		{
			$variable = array(
				'users.id' => $user
			);
			$result['permission'] = $this->users_model->get_by($variable);
			$result['permission']->news = explode(',',$result['permission']->news);
			if (in_array('0',$result['permission']->news) || in_array('1',$result['permission']->news))
			{
				$result['new'] = $this->news_model->get_news(null,null,null,array('users.id' => $id));
                $total_records = count($result['new']);
                $page = $this->input->get('page');
                $current_page = isset($page) ? $page : 1;
                $limit = 6;
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $start = $start > 0 ? $start : 0;
                $result['my'] = $this->news_model->get_news(null,$limit,$start,array('users.id' => $id));
                $result['total_page'] = $total_page;
                $result['current_page'] = $current_page;
                $result['type'] = $this->category_model->get_all();
				view('master.posts.myposts',$result);
			}
			else
			{
				redirect(base_url('index.php/index/error'));
			}
		}
		else
		{
            redirect(base_url('index.php/index/view_admin_login'));
		}

	}
	public function post_detail($id)
	{
		$data = array(
			'news.id' => $id
		);
		$result['news_detail'] = $this->news_model->get_by_row($data);
		$count = $this->comments_model->count(array('id_new' => $result['news_detail']->id, 'status' => 1));
		$result['news_detail']->count = $count;
		$result['relation'] = $this->news_model->get_random(2,null,array('category.id'=>$result['news_detail']->id_type));
		$cm_per_page = 3;
		$page = $this->input->get('page');
		$current_page = isset($page) ? $page : 1;
		$start = ($current_page - 1) * $cm_per_page;
		$data2 = array(
			'id_new' => $id,
			'id_rep' => null
		);
		$result['cm'] = $this->comments_model->get_comments($data2,$cm_per_page,$start);
		$result['all_cm'] = $this->comments_model->get_comments($data2,null,null);
		$count = count($result['all_cm']);
		foreach ($result['cm'] as $k => $value)
		{
			$value->con = $this->comments_model->get_rep_comments($value->id_com,null,null);
		}
		$result['checkCM'] = array('all' => $count, 'count' => $start+$cm_per_page);
		$data_2 = array(
			'view','view + 1'
		);
		$sessionKey = 'post_' . $id;
		if (!$this->session->has_userdata($sessionKey)){
			$this->news_model->count_view($id,$data_2);
			$this->session->set_userdata($sessionKey, 1);
			$this->session->mark_as_temp($sessionKey,120);
		}
		view('home.detail', $result);

	}
	public function view_write(){
        $user = $this->session->userdata('id');
		if (isset($user))
		{
			$variable = array(
				'users.id' => $user
			);
			$result['permission'] = $this->users_model->get_by($variable);
			$result['permission']->news = explode(',',$result['permission']->news);
			if (in_array('0',$result['permission']->news) || in_array('2',$result['permission']->news))
			{
				$data['type'] = $this->category_model->get_all();
				view('master.posts.write', $data);
			}
			else
			{
				redirect(base_url('index.php/index/error'));
			}
		}
		else
		{
            redirect(base_url('index.php/index/view_admin_login'));
		}
	}
	public function view_edit($id_new){
		$user = $this->session->userdata('id');
		if (isset($user))
		{
			$variable = array(
				'users.id' => $user
			);
			$result['permission'] = $this->users_model->get_by($variable);
			$result['permission']->news = explode(',',$result['permission']->news);
			if (in_array('0',$result['permission']->news) || in_array('3',$result['permission']->news))
			{
                $data['type'] = $this->category_model->get_all();
				$data['new'] = $this->news_model->get_by_row(array('news.id' => $id_new));
				view('master.posts.edit', $data);
			}
			else
			{
				redirect(base_url('index.php/index/error'));
			}
		}
		else
		{
            redirect(base_url('index.php/index/view_admin_login'));
		}

	}
    public function edit_post($id_new){
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->news = explode(',',$result['permission']->news);
            if (in_array('0',$result['permission']->news) || in_array('3',$result['permission']->news))
            {
                if (!empty($_FILES['image'])) {
                    if ($_FILES['image']['name'] != '')
                    {
                        $name_file = time() . $_FILES['image']['name'];
                        $config['upload_path'] = 'assets/upload_images/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = 10000000;
                        $config['max_width'] = 10000000;
                        $config['max_height'] = 10000000;
                        $config['file_name'] = $name_file;
                        $this->load->library('upload' , $config);
                        $this->upload->do_upload('image');
                        $data = array(
                            'title' => $this->input->post('txtTitle'),
                            'describe' => $this->input->post('txtDesc'),
                            'content' => $this->input->post('txtContent'),
                            'day_update' => date('Y-m-d'),
                            'thumbnail' =>$name_file,
                            'id_type' => $this->input->post('txtCategory'),
                            'hot' => $this->input->post('txtType'),
                        );
                        $this->news_model->edit($id_new,$data);
                        redirect(base_url('index.php/posts/post_admin_detail/'.$id_new));
                    }
                    else
                    {
                        $data = array(
                            'title' => $this->input->post('txtTitle'),
                            'describe' => $this->input->post('txtDesc'),
                            'content' => $this->input->post('txtContent'),
                            'day_update' => date('Y-m-d'),
                            'id_type' => $this->input->post('txtCategory'),
                            'hot' => $this->input->post('txtType'),
                        );
                        $this->news_model->edit($id_new,$data);
                        redirect(base_url('index.php/posts/post_admin_detail/'.$id_new));
                    }
                }
            }
            else
            {
                redirect(base_url('index.php/index/error'));
            }
        }
        else
        {
            redirect(base_url('index.php/index/view_admin_login'));
        }

    }
	public function post_admin_detail($id_new)
	{
        $_SESSION['url'] = $_SERVER['HTTP_REFERER'];
		$user = $this->session->userdata('id');
		if (isset($user))
		{
			$variable = array(
				'users.id' => $user
			);
			$result['permission'] = $this->users_model->get_by($variable);
			$result['permission']->news = explode(',',$result['permission']->news);
			if (in_array('0',$result['permission']->news) || in_array('1',$result['permission']->news))
			{
				$data['new'] = $this->news_model->get_by_row(array('news.id' => $id_new));
				$data['cm'] = $this->comments_model->get_comments(array('id_new' => $id_new, 'id_rep' => null),null,null);
				foreach ($data['cm'] as $k => $value)
				{
					$value->con = $this->comments_model->get_rep_comments($value->id_com,null,null);
				}
				$data['new']->url = $_SESSION['url'];
				view('master.posts.detail',$data);
			}
			else
			{
				redirect(base_url('index.php/index/error'));
			}
		}
		else
		{
            redirect(base_url('index.php/index/view_admin_login'));
		}

	}

	public function add_post(){
		$user = $this->session->userdata('id');
		if (isset($user))
		{
			$variable = array(
				'users.id' => $user
			);
			$result['permission'] = $this->users_model->get_by($variable);
			$result['permission']->news = explode(',',$result['permission']->news);
			if (in_array('0',$result['permission']->news) || in_array('2',$result['permission']->news))
			{
				if (!empty($_FILES['image'])) {
					$name_file = time() . $_FILES['image']['name'];
					$config['upload_path'] = 'assets/upload_images/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = 10000000;
					$config['max_width'] = 10000000;
					$config['max_height'] = 10000000;
					$config['file_name'] = $name_file;
					$this->load->library('upload' , $config);

					if ( ! $this->upload->do_upload('image'))
					{
						$error = array('error' => $this->upload->display_errors());
						var_dump($error);
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$data = array(
							'title' => $this->input->post('txtTitle'),
							'describe' => $this->input->post('txtDesc'),
							'content' => $this->input->post('txtContent'),
							'date' => date('Y-m-d'),
                            'day_update' => date('Y-m-d'),
							'thumbnail' =>$name_file,
							'status' => $this->input->post('txtStatus'),
							'id_user' => $user,
							'id_type' => $this->input->post('txtCategory'),
							'hot' => $this->input->post('txtType'),
						);
						$this->news_model->add($data);
                        redirect(base_url('index.php/posts/my_posts/'.$user));
					}
				}
			}
			else
			{
				redirect(base_url('index.php/index/error'));
			}
		}
		else
		{
            redirect(base_url('index.php/index/view_admin_login'));
		}

	}

	public function approved($id_new)
    {
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->news = explode(',',$result['permission']->news);
            if (in_array('0',$result['permission']->news))
            {
                $data = array('status' => 1);
                $this->news_model->edit($id_new,$data);
                redirect(base_url('index.php/posts/post_admin_detail/'.$id_new));
            }
            else
            {
                redirect(base_url('index.php/index/error'));
            }
        }
        else
        {
            redirect(base_url('index.php/index/view_admin_login'));
        }

    }

    public function recalled($id_new)
    {
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->news = explode(',',$result['permission']->news);
            if (in_array('0',$result['permission']->news))
            {
                $data = array('status' => 2);
                $this->news_model->edit($id_new,$data);
                redirect(base_url('index.php/posts/post_admin_detail/'.$id_new));
            }
            else
            {
                redirect(base_url('index.php/index/error'));
            }
        }
        else
        {
            redirect(base_url('index.php/index/view_admin_login'));
        }
    }

    public function remove_post($id_new,$page)
    {
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->news = explode(',',$result['permission']->news);
            if (in_array('0',$result['permission']->news) || in_array('4',$result['permission']->news))
            {

                $this->news_model->remove($id_new);

                if (isset($page))
                {
                    if ($page == "all_posts")
                    {
                        redirect(base_url('index.php/posts/index'));
                    }
                    else
                    {
                        redirect(base_url('index.php/posts/my_posts/'.$user));
                    }
                }
            }
            else
            {
                redirect(base_url('index.php/index/error'));
            }
        }
        else
        {
            redirect(base_url('index.php/index/view_admin_login'));
        }
    }

    public function filter()
    {
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->news = explode(',',$result['permission']->news);
            if (in_array('0',$result['permission']->news))
            {
                $type = $this->input->get('txtCategory');
                $status = $this->input->get('txtStatus');
                $key = $this->input->get('txtKey');
                $data = array();
                if ($type != 0)
                {
                    $data['news.id_type'] = $type;
                }
                if ($status != 0)
                {
                    $data['status'] = $status;
                }

                $result['new'] = $this->news_model->get_news($key,null,null,$data);
                $total_records = count($result['new']);
                $page = $this->input->get('page');
                $current_page = isset($page) ? $page : 1;
                $limit = 6;
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $start = $start > 0 ? $start : 0;
                $result['news'] = $this->news_model->get_news($key,$limit,$start,$data);
                $result['total_page'] = $total_page;
                $result['current_page'] = $current_page;
                $result['key_word'] = $key;
                $result['category'] = $type;
                $result['news_status'] = $status;
                $result['type'] = $this->category_model->get_all();
                view('master.posts.posts', $result);
            }
            else
            {
                redirect(base_url('index.php/index/error'));
            }
        }
        else
        {
            redirect(base_url('index.php/index/view_admin_login'));
        }

    }

    public function my_filter()
    {
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->news = explode(',',$result['permission']->news);
            if (in_array('0',$result['permission']->news) || in_array('1',$result['permission']->news))
            {
                $type = $this->input->get('txtCategory');
                $status = $this->input->get('txtStatus');
                $key = $this->input->get('txtKey');
                $data = array();
                if ($type != 0)
                {
                    $data['news.id_type'] = $type;
                }
                if ($status != 0)
                {
                    $data['status'] = $status;
                }
                $data['users.id'] = $user;
                $result['new'] = $this->news_model->get_news($key,null,null,$data);
                $total_records = count($result['new']);
                $page = $this->input->get('page');
                $current_page = isset($page) ? $page : 1;
                $limit = 6;
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $start = $start > 0 ? $start : 0;
                $result['my'] = $this->news_model->get_news($key,$limit,$start,$data);
                $result['total_page'] = $total_page;
                $result['current_page'] = $current_page;
                $result['key_word'] = $key;
                $result['category'] = $type;
                $result['news_status'] = $status;
                $result['type'] = $this->category_model->get_all();
                view('master.posts.myposts', $result);
            }
            else
            {
                redirect(base_url('index.php/index/error'));
            }
        }
        else
        {
            redirect(base_url('index.php/index/view_admin_login'));
        }

    }

}
