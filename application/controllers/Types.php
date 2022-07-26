<?php

/**
 * Created by PhpStorm.
 * User: hana
 * Date: 15/03/2019
 * Time: 23:03
 */
class Types extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'category_model','news_model', 'users_model'
		));
	}

	private $array = array();

	public function index()
	{
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->category = explode(',',$result['permission']->category);
            if (in_array('0',$result['permission']->category) || in_array('1',$result['permission']->category))
            {
                $data['type'] = $this->category_model->get_all();
                view('master.types.types', $data);
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

	public function show_category($id)
	{
		$data = array(
			'category.id' => $id,
			'category.id_parent' => $id

		);
		$result['new'] = $this->news_model->get_by_or(null,null,$id);
		$total_records = count($result['new']);
		$page = $this->input->get('page');
		$current_page = isset($page) ? $page : 1;
		$limit = 4;
		$total_page = ceil($total_records / $limit);
		if ($current_page > $total_page) {
			$current_page = $total_page;
		} else if ($current_page < 1) {
			$current_page = 1;
		}
		$start = ($current_page - 1) * $limit;
		$start = $start > 0 ? $start : 0;
		$result['news'] = $this->news_model->get_by_or($limit,$start,$id);
		$result['total_page'] = $total_page;
		$result['current_page'] = $current_page;
		/* Latest */
		$limit_3 = 5;
		$result['newest'] = $this->news_model->get_order_by($limit_3);
		$arr = array(
			'id' => $id,
		);
		$result['category'] = $this->category_model->get_where($arr);
		view('home.category',$result);
	}

	public function add_category()
	{
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->category = explode(',',$result['permission']->category);
            if (in_array('0',$result['permission']->category) || in_array('2',$result['permission']->category))
            {
                $data = array(
                    'name' => $this->input->post('txtName'),
                );
                $this->category_model->add($data);
                redirect(base_url('index.php/types/index'));
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

	public function get_category_where()
	{

		$data = array(
			'id' => $this->input->post('id')
		);
		$data['hana'] = $this->category_model->get_where($data);
		echo json_encode($data['hana']);
	}

	public function edit_category()
	{
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->category = explode(',',$result['permission']->category);
            if (in_array('0',$result['permission']->category) || in_array('3',$result['permission']->category))
            {
                $id = $this->input->post('txtId');
                $data = array(
                    'name' => $this->input->post('txtName'),
                );
                $this->category_model->edit($id, $data);
                redirect(base_url('index.php/types/index'));
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
	public function remove_category($id)
	{
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->category = explode(',',$result['permission']->category);
            if (in_array('0',$result['permission']->category) || in_array('4',$result['permission']->category))
            {
                $this->category_model->remove($id);
                redirect(base_url('index.php/types/index'));
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

	function removeCategories($categories, $parent_id = null)
	{

		foreach ($categories as $key => $item) {
			// Nếu là chuyên mục con thì hiển thị
			if ($item->id_parent == $parent_id) {

				//xoá item qua $item->id
				$this->array[] = $item->id;
				// Xóa chuyên mục đã lặp
				unset($categories[$key]);

				// Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
				$this->removeCategories($categories, $item->id);
			}
		}
	}

	public function test(){
//		$count = $this->category_model->count_all();
//		echo $count;

		$data = array(
			'id' => 35,
			'id_parent' => 33
		);
		$result['test'] = $this->category_model->search_by($data);
		var_dump($result['test']);
	}
}
