<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 23/03/2019
 * Time: 09:56
 */
function get_all_category()
{
	$ci =& get_instance();
	$ci->load->database();
	$sql = 'SELECT * FROM category';
	$arr = $ci->db->get('category')->result_array();
	showCategories($arr, null, $char = '-');
}

function showCategories($categories, $parent_id = 0, $char = '')
{
	// BƯỚC 2.1: LẤY DANH SÁCH CATE CON
	$cate_child = array();
	foreach ($categories as $key => $item) {
		// Nếu là chuyên mục con thì hiển thị
		if ($item['id_parent'] == $parent_id) {
			$cate_child[] = $item;
			unset($categories[$key]);
		}
	}

	// BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
	if ($cate_child) {
		echo "<ul class='dropdown'>";

		foreach ($cate_child as $key => $item) {
			// Hiển thị tiêu đề chuyên mục
			echo "<li><a href='" . base_url('index.php/types/show_category/' . $item['id']) . "'>" . $item['name'] . "</a>";

			// Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
			showCategories($categories, $item['id'], $char . '|---');
			echo '</li>';
		}
		echo '</ul>';
	}
}

function get_count_and()
{
	$ci =& get_instance();
	$ci->load->model('category_model');
	$ci->load->model('news_model');
	$data['type'] = $ci->category_model->get_all();
	foreach ($data['type'] as $key => $item) {
		$data['type'][$key]->count = $ci->news_model->count_news_or($item->id,
			$item->id);
	}
//	var_dump($data['type']);
	showCategories_count($data['type'], null);
}

function showCategories_count($type, $parent_id = null)
{
	foreach ($type as $key => $item) {
		// Nếu là chuyên mục con thì hiển thị
		if ($item->id_parent == $parent_id) {
			echo "<tr class='treegrid-" . $item->id . " treegrid-parent-" . $item->id_parent . " text-dark-all treegrid-collapsed' >";
			echo "<td>";
			echo '<a href="' . base_url('index.php/types/show_category/' . $item->id) . '"style=\'font-family: "Barlow", sans-serif; font-size: 18px; font-weight: 100;\'><span class="treegrid-expander treegrid-expander-collapsed"></span>' . $item->name . '</a> ';
			echo '</td>';
			echo '<td style="width: 15%; text-align: center; color: silver; font-size: 18px;">';
			echo "($item->count)";
			echo '</td>';
			echo '</tr>';
			// Xóa chuyên mục đã lặp
			unset($type[$key]);

			// Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
			showCategories_count($type, $item->id);
		}
	}
}

if (!function_exists('redirectPreUrl')) {
	function redirectPreUrl($url)
	{
		$ci =& get_instance();
		$ci->load->library('user_agent');
		if ($ci->agent->referrer()) {
			redirect($ci->agent->referrer());
		} else {
			redirect($url);
		}
	}
}
function permission()
{
    $ci =& get_instance();
    $ci->load->database();
    $user = $ci->session->userdata('id');
    if(isset($user))
    {
        $ci->db->select(
            'users.id as id_user,
		 	 users.name,
		 	 users.email, users.address, users.password,users.introduce,
		 	 users.avatar, permission.id AS id_per,users.id_google,
		 	 permission.name AS name_per,permission.news,
		 	 permission.users,permission.category,
		 	 permission.permission,permission.comments');
        $ci->db->from('users');
        $ci->db->join('permission', 'permission.id = users.id_per');
        $ci->db->where(array('users.id' => $user));
        $query = $ci->db->get();
        $arr =  $query->first_row();
        $arr->news = explode(',',$arr->news);
        $arr->users = explode(',',$arr->users);
        $arr->category = explode(',',$arr->category);
        $arr->permission = explode(',',$arr->permission);
        $arr->comments = explode(',',$arr->comments);
        return $arr;
    }

}
function get_category()
{
    $ci =& get_instance();
    $ci->load->database();
    $sql = 'SELECT * FROM category';
    $arr = $ci->db->get('category')->result_array();
    return $arr;
}
function get_current_weekday() {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $weekday = date("l");
    $weekday = strtolower($weekday);
    switch($weekday) {
        case 'monday':
            $weekday = 'Thứ hai';
            break;
        case 'tuesday':
            $weekday = 'Thứ ba';
            break;
        case 'wednesday':
            $weekday = 'Thứ tư';
            break;
        case 'thursday':
            $weekday = 'Thứ năm';
            break;
        case 'friday':
            $weekday = 'Thứ sáu';
            break;
        case 'saturday':
            $weekday = 'Thứ bảy';
            break;
        default:
            $weekday = 'Chủ nhật';
            break;
    }
    $arr = array("day" => $weekday, 'date' => time());
    return $arr;
}
function get_views(){
    $ci =& get_instance();
    $ci->load->database();
    $ci->load->model('news_model');
    $ci->db->select(
        'category.name AS name_type,news.date, news.id,
				 news.title,news.describe,news.content,
				  news.thumbnail,news.status,news.day_update,
				   news.hot,users.name AS name_user,users.introduce,
				    users.avatar,users.id_google,
				     permission.name AS name_per');
    $ci->db->from('news');
    $ci->db->join('category', 'category.id = news.id_type');
    $ci->db->join('users', 'users.id = news.id_user');
    $ci->db->join('permission', 'permission.id = users.id_per');
    $ci->db->where(array('news.status' => 1));
    $ci->db->limit(5);
    $ci->db->order_by('news.view DESC','news.day_update DESC');
    $query = $ci->db->get();
    $arr = $query->result();
    foreach ($arr as $key => $item)
    {
        $arr[$key]->comment = $ci->news_model->count_comment(array('news.id' => $item->id));
    }
    return $arr;
}
function get_news(){
    $ci =& get_instance();
    $ci->load->database();
    $ci->load->model('news_model');
    $ci->db->select(
        'category.name AS name_type,news.date, news.id,
				 news.title,news.describe,news.content,
				  news.thumbnail,news.status,news.day_update,
				   news.hot,users.name AS name_user,users.introduce,
				    users.avatar,users.id_google,
				     permission.name AS name_per');
    $ci->db->from('news');
    $ci->db->join('category', 'category.id = news.id_type');
    $ci->db->join('users', 'users.id = news.id_user');
    $ci->db->join('permission', 'permission.id = users.id_per');
    $ci->db->where(array('news.status' => 1));
    $ci->db->limit(5);
    $ci->db->order_by('news.day_update DESC');
    $query = $ci->db->get();
    $arr = $query->result();
    foreach ($arr as $key => $item)
    {
        $arr[$key]->comment = $ci->news_model->count_comment(array('news.id' => $item->id));
    }
    return $arr;
}
function get_comments(){
    $ci =& get_instance();
    $ci->load->database();
    $ci->load->model('news_model');
    $ci->db->select(
        'category.name AS name_type,news.date, news.id,
				 news.title,news.describe,news.content,
				  news.thumbnail,news.status,news.day_update,COUNT(comment.id),
				   news.hot,users.name AS name_user,users.introduce,
				    users.avatar,users.id_google,
				     permission.name AS name_per');
    $ci->db->from('news');
    $ci->db->join('category', 'category.id = news.id_type');
    $ci->db->join('users', 'users.id = news.id_user');
    $ci->db->join('permission', 'permission.id = users.id_per');
    $ci->db->join('comment', 'comment.id_new = news.id','left');
    $ci->db->where(array('news.status' => 1));
    $ci->db->group_by('news.id');
    $ci->db->limit(5);
    $ci->db->order_by('COUNT(comment.id) DESC','news.day_update DESC');
    $query = $ci->db->get();
    $arr = $query->result();
    foreach ($arr as $key => $item)
    {
        $arr[$key]->comment = $ci->news_model->count_comment(array('news.id' => $item->id));
    }
    return $arr;
}

function get_date($day)
{
    return date("j F, Y",strtotime($day));
}