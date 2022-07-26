<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 21/03/2019
 * Time: 22:16
 */
class Permission extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('permission_model');
		$this->load->model('users_model');
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
            $result['permission']->permission = explode(',',$result['permission']->permission);
            if (in_array('0',$result['permission']->permission) || in_array('1',$result['permission']->permission))
            {
                $result['per'] = $this->permission_model->get_all();
                $total_records = count($result['per']);
                $page = $this->input->get('page');
                $current_page = isset($page) ? $page : 1;
                $limit = 5;
                $total_page = ceil($total_records / $limit);
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }
                $start = ($current_page - 1) * $limit;
                $start = $start > 0 ? $start : 0;
                $result['role'] = $this->permission_model->get_all($limit,$start);
                foreach ($result['role'] as $key => $item)
                {
                    $result['role'][$key]->news = explode(',',$item->news);
                    $result['role'][$key]->users = explode(',',$item->users);
                    $result['role'][$key]->category = explode(',',$item->category);
                    $result['role'][$key]->permission = explode(',',$item->permission);
                    $result['role'][$key]->comments = explode(',',$item->comments);
                }
                $result['total_page'] = $total_page;
                $result['current_page'] = $current_page;
                view('master.permission.per',$result);
            }
            else
            {
                redirect(base_url('index.php/index/error'));
            }
        }
        else
        {
            redirect(base_url('index.php/index/error'));
        }
	}
    public function view_add()
    {
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->permission = explode(',',$result['permission']->permission);
            if (in_array('0',$result['permission']->permission) || in_array('2',$result['permission']->permission))
            {
                view('master.permission.add');
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
    public function add_per()
    {
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->permission = explode(',',$result['permission']->permission);
            if (in_array('0',$result['permission']->permission) || in_array('2',$result['permission']->permission))
            {
                $news = $this->input->post('news');
                $users = $this->input->post('users');
                $permission = $this->input->post('permission');
                $category = $this->input->post('category');
                $comments = $this->input->post('comments');
                $data = array(
                  'name' =>   $this->input->post('txtName'),
                  'news' =>   isset($news) ? implode(',',$news) : '',
                  'users' =>   isset($users) ? implode(',',$users) : '',
                  'permission' =>   isset($permission) ? implode(',',$permission) : '',
                  'category' =>   isset($category) ? implode(',',$category) : '',
                  'comments' =>   isset($comments) ? implode(',',$comments) : '',
                );
               $this->permission_model->add($data);
               redirect(base_url('index.php/permission/index'));
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
    public function view_edit($id_per)
    {
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->permission = explode(',',$result['permission']->permission);
            if (in_array('0',$result['permission']->permission) || in_array('3',$result['permission']->permission))
            {
                $result['role'] = $this->permission_model->get_where(array('id' => $id_per));
                $result['role']->news = explode(',',$result['role']->news);
                $result['role']->users = explode(',',$result['role']->users);
                $result['role']->category = explode(',',$result['role']->category);
                $result['role']->permission = explode(',',$result['role']->permission);
                $result['role']->comments = explode(',',$result['role']->comments);
                view('master.permission.edit',$result);
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
    public function edit_per($id_per)
    {
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->permission = explode(',',$result['permission']->permission);
            if (in_array('0',$result['permission']->permission) || in_array('3',$result['permission']->permission))
            {
                $news = $this->input->post('news');
                $users = $this->input->post('users');
                $permission = $this->input->post('permission');
                $category = $this->input->post('category');
                $comments = $this->input->post('comments');
                $data = array(
                    'name' =>   $this->input->post('txtName'),
                    'news' =>   isset($news) ? implode(',',$news) : '',
                    'users' =>   isset($users) ? implode(',',$users) : '',
                    'permission' =>   isset($permission) ? implode(',',$permission) : '',
                    'category' =>   isset($category) ? implode(',',$category) : '',
                    'comments' =>   isset($comments) ? implode(',',$comments) : '',
                );
                $this->permission_model->edit($id_per,$data);
                redirect(base_url('index.php/permission/index'));
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
    public function remove_per($id_per)
    {
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->permission = explode(',',$result['permission']->permission);
            if (in_array('0',$result['permission']->permission) || in_array('4',$result['permission']->permission))
            {

                $this->permission_model->remove($id_per);
                redirect(base_url('index.php/permission/index'));
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
