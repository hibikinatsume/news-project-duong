<?php

/**
 * Created by PhpStorm.
 * User: hana
 * Date: 21/03/2019
 * Time: 22:18
 */
class Comments extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('comments_model');
		$this->load->model('users_model');
		$this->load->library('session');
	}

	public function add_comment()
	{
		$data = array(
			'date' => date('Y-m-d'),
			'content' => $this->input->post('content'),
			'status' => 1,
			'id_rep' => null,
			'id_user' => 1,
			'id_new' => $this->input->post('id')
		);
		$id_com = $this->comments_model->add($data);
		$result['user'] = $this->users_model->get_where(array('id' => 1));
		$user = $result['user'];
//		var_dump($result['user']);
//		die();
        $html = "";
        $html .= "<div class='comment-list'>
                <div class='single-comment justify-content-between d-flex'>
                    <div class='user justify-content-between d-flex'>
                        <div class='thumb'>";
                            if (strpos($user->avatar,'http') !== FALSE){
                                $html .= "<img src='".$user->avatar."' style='width: 60px; height: 60px;' alt=''>";
                            }
                            else
                            {
                                $html .= "<img src='".base_url('assets/upload_images/'.$user->avatar)."' style='width: 60px; height: 60px;' alt=''>";
                            }
                        $html .= "</div>
                        <div class='desc'>
                            <h5><a href='#'>".$user->name."</a></h5>
                            <p class='date'>".date('j F, Y',strtotime($data['date']))."</p>
                            <p class='comment'>
                                ".$data['content']."
                            </p>
                        </div>
                    </div>
                    <div class='reply-btn'>
                        <a class='btn-reply text-uppercase reply' data-id='".$id_com."'>reply</a>
                    </div>
                </div>
                <form class='form-reply".$id_com." rep-form rep-submit' data-id='".$data['id_new']."' data-com='".$id_com."' style='margin-top: 2%; display: none;'>
                    <input type='text' placeholder='Viết câu trả lời của bạn' class='form-control reply-content".$id_com."' style='border-radius: 30px;'>
                </form>
            </div>
             <div class='show-reply".$id_com."'>
             </div>";
        echo $html;

	}

	public function add_reply()
	{
		$data = array(
			'date' => date('Y-m-d'),
			'content' => $this->input->post('reply'),
			'status' => 1,
			'id_rep' => $this->input->post('id_com'),
			'id_user' => 1,
			'id_new' => $this->input->post('id')
		);
		$id_com = $this->comments_model->add($data);
		$result['user'] = $this->users_model->get_where(array('id' => 1));
        $user = $result['user'];
        $html = "";
        $html .= "
            <div class='comment-list left-padding'>
                <div class='single-comment justify-content-between d-flex'>
                    <div class='user justify-content-between d-flex'>
                        <div class='thumb'>";
                            if (strpos($user->avatar,'http') !== FALSE){
                                $html .= "<img src='".$user->avatar."' style='width: 60px; height: 60px;' alt=''>";
                            }
                            else
                            {
                                $html .= "<img src='".base_url('assets/upload_images/'.$user->avatar)."' style='width: 60px; height: 60px;' alt=''>";
                            }
                        $html .= "</div>
                        <div class='desc'>
                            <h5><a href='#'>".$user->name."</a></h5>
                            <p class='date'>".date('j F, Y',strtotime($data['date']))."</p>
                            <p class='comment'>
                                ".$data['content']."
                            </p>
                        </div>
                    </div>
                    
             ";
    
        echo $html;
	}

	public function pagin_comment()
	{
		$cm_per_page = 3;
		$page = $this->input->get('page');
		$current_page = isset($page) ? $page : 1;
		$start = ($current_page - 1) * $cm_per_page;
		$data = array(
			'comment.id_new' => $this->input->get('id_new'),
			'comment.id_rep' => null,
            'comment.status' => 1
		);
		$result['all_cm'] = $this->comments_model->get_comments($data, null, null);
		$result['cm'] = $this->comments_model->get_comments($data, $cm_per_page, $start);
		$count = count($result['all_cm']);
		foreach ($result['cm'] as $k => $value) {
			$value->con = $this->comments_model->get_rep_comments($value->id_com, null, null);
		}
		$test = array();

		foreach ($result['cm'] as $key => $item) {
			$test[] = $item;
		}
		$arr = array('data' => $test, 'all' => $count, 'count' => $start + $cm_per_page, 'id_new' => $this->input->get('id_new'));
		echo json_encode($arr);

	}
	public function hide_comment()
    {
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->comments = explode(',',$result['permission']->comments);
            if (in_array('0',$result['permission']->comments) || in_array('3',$result['permission']->comments))
            {
                $id = $this->input->post('id');
                $this->comments_model->edit($id,array('status' => 2));
                $this->comments_model->edit_where(array('id_rep' => $id),array('status' => 2));
                echo 'hide';
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
    public function show_comment()
    {
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->comments = explode(',',$result['permission']->comments);
            if (in_array('0',$result['permission']->comments) || in_array('3',$result['permission']->comments))
            {
                $id = $this->input->post('id');
                $this->comments_model->edit($id,array('status' => 1));
                $this->comments_model->edit_where(array('id_rep' => $id),array('status' => 1));
                echo 'show';
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
    public function remove_comment()
    {
        $user = $this->session->userdata('id');
        if (isset($user))
        {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->comments = explode(',',$result['permission']->comments);
            if (in_array('0',$result['permission']->comments) || in_array('4',$result['permission']->comments))
            {
                $id = $this->input->post('id');
                $this->comments_model->remove($id);
                $this->comments_model->remove_where(array('id_rep' => $id));
                echo 'remove';
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
//	public function child_comment()
//	{
//		$cm_per_page = 2;
//		$page = $this->input->get('page');
//		$page++;
//		$current_page = isset($page) ? $page : 1;
//		$start = ($current_page - 1) * $cm_per_page;
//		$data = array(
//			'comment.id_rep' => $this->input->get('id_com'),
//		);
//		$result['all_cm'] = $this->comments_model->get_comments($data,null,null);
//		$result['rep'] = $this->comments_model->get_comments($data,$cm_per_page,$start);
//		$count = count($result['all_cm']);
////		if (($page*$cm_per_page) >= $count)
////		{
////			$result['checkMore']->count = false;
////		}
////		else
////		{
////			$result['checkMore']->count = true;
////		}
////		echo $this->input->get('id_com');
////		var_dump($result['rep']);
//		$arrRep = array();
//		foreach ($result['rep'] as $key => $item)
//		{
//				$arrRep[] = $item;
////				echo "<li class='single_comment_area'>
////							<div class='comment-wrapper d-flex'>
////							<!-- Comment Meta -->
////							<div class='comment-author'>
////								<img src='".base_url('assets/upload_images/'.$item->avatar)."'>
////							</div>
////							<!-- Comment Content -->
////							<div class='comment-content'>
////								<span class='comment-date'>".$item->date."</span>
////								<h5>".$item->name."</h5>
////								<p>".$item->content."</p>
////							</div>
////							</div>
////						</li>";
////
////			echo "</div>
////				</ol>
////			</li>";
//		}
//		$arr = array('rep' => $arrRep,'all' => $count, 'count' => $start+$cm_per_page);
//		echo json_encode($arr);
//
//	}

