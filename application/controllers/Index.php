<?php

/**
 * Created by PhpStorm.
 * User: hana
 * Date: 15/03/2019
 * Time: 11:55
 */
class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->model('comments_model');
        $this->load->model('users_model');
        $this->load->model('category_model');
        $this->load->model('backup_model');
    }

    public function index()
    {
        # Lấy nội dung top
        $arr = $this->news_model->get_by(1, 0, array('news.hot' => 1, 'news.status' => 1));# Lấy 1 bài viết hot.
        $result['hot'] = $arr[0];
        $result['hot']->comment = $this->news_model->count_comment(array('news.id' => $result['hot']->id));
        $result['view'] = $this->news_model->get_view(2, array('news.status' => 1));# Lấy 2 bài viết nhiều view
        foreach ($result['view'] as $key => $value)
        {
            $result['view'][$key]->comment = $this->news_model->count_comment(array('news.id' => $value->id));
        }
        $result['category'] = $this->category_model->get_all();# Lấy tất cả danh mục
        # Lấy nội dung danh mục
        foreach ($result['category'] as $key => $value)
        {
            $result['category'][$key]->viewest = $this->news_model->get_first_view(array(
                'news.id_type' => $value->id,
                'news.status' => 1
            ));# Lấy bài viết nhiều view nhất của danh mục


            $result['category'][$key]->newest = $this->news_model->get_by_array(2,0, array(
                'news.id_type' => $value->id,
                'news.id !=' => empty($result['category'][$key]->viewest)? NULL : $result['category'][$key]->viewest['id'],
                'news.status' => 1
            ));# Lấy 2 bài viết mới nhất của danh mục
            if ($result['category'][$key]->viewest != NULL)
            {
                $result['category'][$key]->viewest['comment'] = $this->news_model->count_comment(array('news.id' => $result['category'][$key]->viewest['id']));
            }

            foreach ($result['category'][$key]->newest as $k => $item)
            {
                $result['category'][$key]->newest[$k]['comment'] = $this->news_model->count_comment(array('news.id' => $item['id']));
            }

        }

        view('users.index', $result);
    }

    public function category($id)
    {
        $result['category'] = $this->category_model->get_where(array('id' => $id));
        $result['new'] = $this->news_model->get_by_array(2,0, array(
            'news.id_type' => $id,
            'news.status' => 1
        ));# Lấy bài viết mới nhất của danh mục
        foreach ($result['new'] as $key => $value)
        {
            $result['new'][$key]['comment'] = $this->news_model->count_comment(array('news.id' => $value['id']));
        }
        view('users.category', $result);
    }

    public function pagintion()
    {
        $result['new'] = $this->news_model->get_by_array(null,0, array(
            'news.id_type' => $this->input->get('id'),
            'news.status' => 1
        ));# Lấy bài viết mới nhất của danh mục
        $total_records = count($result['new']);
        $page = $this->input->get('page');
        $current_page = isset($page) ? $page : 1;
        $limit = 2;
        $start = ($current_page - 1) * $limit;
        $start = $start > 0 ? $start : 0;
        $result['main']  = $this->news_model->get_by_array($limit,$start, array(
            'news.id_type' => $this->input->get('id'),
            'news.status' => 1
        ));# Lấy 2 bài viết mới nhất của danh mục
        foreach ($result['main'] as $key => $value)
        {
            $result['main'][$key]['comment'] = $this->news_model->count_comment(array('news.id' => $value['id']));
            $result['main'][$key]['day_update'] = date("j F, Y",strtotime($value['day_update']));
        }
        $arr = array('data' => $result['main'], 'total_records' => $total_records, 'count' => $start + $limit, 'id' => $this->input->get('id'));
        echo json_encode($arr);
    }
    public function detail($id)
    {
        $result['new'] = $this->news_model->get_by_row(array('news.id' => $id));
        $result['new']->comment = $this->news_model->count_comment(array('news.id' => $id));
        $result['related'] = $this->news_model->get_random(2,0,array('category.id' => $result['new']->id_type,
            'news.id !=' => $id));
        foreach ($result['related'] as $key => $value)
        {
            $result['related'][$key]->comment = $this->news_model->count_comment(array('news.id' => $value->id));
        }
        $data2 = array(
            'id_new' => $id,
            'id_rep' => null
        );
//        $result['cm'] = $this->comments_model->get_comments($data2,$cm_per_page,$start);
        $result['comments'] = $this->comments_model->get_comments($data2,null,null);
//        $count = count($result['all_cm']);
        foreach ($result['comments'] as $k => $value)
        {
            $value->con = $this->comments_model->get_rep_comments($value->id_com,null,null);
        }
//        $result['checkCM'] = array('all' => $count, 'count' => $start+$cm_per_page);
        $data_2 = array(
            'view','view + 1'
        );
        $sessionKey = 'post_' . $id;
        if (!$this->session->has_userdata($sessionKey)){
            $this->news_model->count_view($id,$data_2);
            $this->session->set_userdata($sessionKey, 1);
            $this->session->mark_as_temp($sessionKey,120);
        }
//        var_dump($result['all_cm']);
//        die();
        view('users.detail',$result);
    }

    public function login()
    {
        view('users.login');
    }

    public function home()
    {
        /* News HOT*/
        $limit_1 = 3;
        $data_1 = array(
            'trending' => 1,
            'news.status' => 1
        );
        $result['hot'] = $this->news_model->get_by($limit_1, null, $data_1);

        /* News Premium */
        $limit_2 = 1;
        $data_2 = array(
            'trending' => 2,
            'news.status' => 1
        );
        $result['premium'] = $this->news_model->get_by_row_limit($limit_2, null, $data_2);
        $count = $this->comments_model->count(array('id_new' => $result['premium']->id));
        $result['premium']->count = $count;
        /*new -> old*/
        $data_3 = array(
            'trending' => 0,
            'news.status' => 1
        );
        $result['latest'] = $this->news_model->get_by(null, null, $data_3);
        $total_records = count($result['latest']);
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
        $result['pagin'] = $this->news_model->get_by($limit, $start, $data_3);
        $result['total_page'] = $total_page;
        $result['current_page'] = $current_page;
        /* Latest */
        $limit_3 = 5;
        $result['newest'] = $this->news_model->get_order_by($limit_3);
        /* Viewest */
        $limit_4 = 5;
        $result['viewest'] = $this->news_model->get_view($limit_4);
//		var_dump($result['newest']);
//		die();
//		echo $result['premium']->count;
//		var_dump($result['premium']);
//		die();
//		var_dump($result['premium']);
//		echo $result['premium']->title;
//		die();
        view('home.index', $result);
    }

    public function view_login()
    {
        $user = $this->session->userdata('id');
        if (isset($user)) {

            $url = base_url('index.php/index/index');

            redirect($url);
        } else {
            view('login');
        }

    }

    public function view_admin_login()
    {
        $user = $this->session->userdata('id');
        if (isset($user)) {
            redirect(base_url('index.php/index/view_admin'));
        } else {
            view('master.login');
        }

    }

    public function view_reg()
    {
        $user = $this->session->userdata('id');
        if (isset($user)) {

            $url = base_url('index.php/index/index');

            redirect($url);
        } else {
            view('register');
        }

    }

    public function view_admin()
    {
        $id = $this->session->userdata('id');
        if (isset($id)) {
            $result['check'] = $this->users_model->get_where(array('id' => $id));
            if ($result['check']->id_per == 1 || $result['check']->id_per == 2) {
                $data['dashbroad'] = array();
                $countMember = $this->users_model->count();
                $countNews = $this->news_model->count();
                $sumview = $this->news_model->sum_view();
                $comments = $this->comments_model->count();
                $data['dashbroad']['member'] = $countMember;
                $data['dashbroad']['news'] = $countNews;
                $data['dashbroad']['view'] = $sumview;
                $data['dashbroad']['comments'] = $comments;
                view('master.index', $data);
            } else {
                redirect(base_url('index.php/index/error'));
            }
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }


    }

    public function list_backup()
    {
        $id = $this->session->userdata('id');
        if (isset($id)) {
            $result['check'] = $this->users_model->get_where(array('users.id' => $id));
            if (isset($result['check']->id_per)) {
                if ($result['check']->id_per == 1) {
                    $path = "C:/xampp/htdocs/articles/database";
                    $arr = scandir($path);
                    foreach ($arr as $key => $value) {
                        unset($arr[$key]);
                        if (strstr($value, '.') === '.sql') {
                            $date = explode('_', substr($value, 0, -4));
                            unset($date[0]);
                            $date = implode(' ', $date);
                            $arr['list'][] = array(
                                'path' => $value,
                                'create_at' => $date
                            );
                        }
                    }
                    array_multisort(array_column($arr['list'], 'create_at'), SORT_DESC, $arr['list']);
                    view('master.backup.list', $arr);
                } else {
                    redirect(base_url('index.php/index/error'));
                }
            } else {
                redirect(base_url('index.php/index/logout_admin'));
            }
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }


    }

    public function view_backup()
    {
        $id = $this->session->userdata('id');
        if (isset($id)) {
            $result['check'] = $this->users_model->get_where(array('users.id' => $id));
            if (isset($result['check']->id_per)) {
                if ($result['check']->id_per == 1) {
                    view('master.backup.backup');
                } else {
                    redirect(base_url('index.php/index/error'));
                }
            } else {
                redirect(base_url('index.php/index/logout_admin'));
            }
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }

    }

    public function backup()
    {
        $id = $this->session->userdata('id');
        if (isset($id)) {
            $result['check'] = $this->users_model->get_where(array('users.id' => $id));
            if (isset($result['check']->id_per)) {
                if ($result['check']->id_per == 1) {
                    $name = $this->input->post('txtName');
                    $filename = $name . '_' . date("Y-m-d_H:i:s") . '.sql';
                    $cmd = '';
                    $cmd .= 'xampp/mysql/bin/mysqldump.exe -u root tech_db >C:/xampp/htdocs/articles/database/';
                    $cmd .= $filename;
                    exec('cd ../');
                    exec('cd ../');
                    exec($cmd);
                    $data = array(
                        'path' => $filename,
                        'create_at' => date("Y-m-d_H:i:s")
                    );
                    $this->backup_model->add($data);
                    redirect(base_url('index.php/index/list_backup'));
                } else {
                    redirect(base_url('index.php/index/error'));
                }
            } else {
                redirect(base_url('index.php/index/logout_admin'));
            }
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }

    }

    public function restore($name)
    {
        $id = $this->session->userdata('id');
        if (isset($id)) {
            $result['check'] = $this->users_model->get_where(array('users.id' => $id));
            if (isset($result['check']->id_per)) {
                if ($result['check']->id_per == 1) {
                    exec('mysql -u phpmyadmin -p!l0v3y0u news_db </var/www/codeigniter/backup/' . $name);
                    redirect(base_url('index.php/index/view_admin'));
                } else {
                    redirect(base_url('index.php/index/error'));
                }
            } else {
                redirect(base_url('index.php/index/logout_admin'));
            }
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }

    }

    public function error()
    {
        view('master.error403');
    }

    public function test()
    {
        $this->load->view('test');
    }

    public function check_mail()
    {
        $email = $this->input->post('txtEmail');
        $count = $this->users_model->count(array('email' => $email));
        if ($count > 0) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function check_mail_edit()
    {
        $id = $this->input->post('id');
        $email = $this->input->post('txtEmail');
        $count = $this->users_model->count(array('id !=' => $id, 'email' => $email));
        if ($count > 0) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function check_pass()
    {
        $id = $this->input->post('id');
        $pass = $this->input->post('txtOld');
        $count = $this->users_model->count(array('id' => $id, 'password' => $pass));
        if ($count > 0) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function check_category()
    {
        $name = $this->input->post('txtName');
        $count = $this->category_model->count(array('name' => $name));
        if ($count > 0) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function check_category_edit()
    {
        $id = $this->input->get('id');
        $name = $this->input->get('txtName');
        $count = $this->category_model->count(array('id !=' => $id, 'name' => $name));
        if ($count > 0) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
}
