<?php

/**
 * Created by PhpStorm.
 * User: hana
 * Date: 15/03/2019
 * Time: 22:57
 */
class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('permission_model');
        $this->load->model('news_model');
        $this->load->model('comments_model');
        $this->load->library('session');
    }

    public function index()
    {
        $user = $this->session->userdata('id');
        if (isset($user)) {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->users = explode(',', $result['permission']->users);
            if (in_array('0', $result['permission']->users) || in_array('1', $result['permission']->users)) {
                $result['user'] = $this->users_model->get_users();
                $total_records = count($result['user']);
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
                $result['users'] = $this->users_model->get_users($limit, $start);
                $result['total_page'] = $total_page;
                $result['current_page'] = $current_page;
                view('master.users.users', $result);
            } else {
                redirect(base_url('index.php/index/error'));
            }
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }
    }

    public function view_info($id)
    {
        $user = $this->session->userdata('id');
        if (isset($user)) {
            $data = array('users.id' => $id);
            $result['info'] = $this->users_model->get_by($data);
            $news = $this->news_model->count(array('id_user' => $id));
            $comments = $this->comments_model->count(array('id_user' => $id));
            $result['info']->news = $news;
            $result['info']->comments = $comments;
            view('master.info.info', $result);
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }


    }

    public function view_add()
    {
        $user = $this->session->userdata('id');
        if (isset($user)) {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->users = explode(',', $result['permission']->users);
            if (in_array('0', $result['permission']->users) || in_array('2', $result['permission']->users)) {
                $result['role'] = $this->permission_model->get_all();
                view('master.users.add', $result);
            } else {
                redirect(base_url('index.php/index/error'));
            }
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }

    }

    public function add_user()
    {
        $user = $this->session->userdata('id');
        if (isset($user)) {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->users = explode(',', $result['permission']->users);
            if (in_array('0', $result['permission']->users) || in_array('2', $result['permission']->users)) {
                if (!empty($_FILES['img'])) {
                    $name_file = time() . $_FILES['img']['name'];
                    $config['upload_path'] = 'assets/upload_images/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 10000000;
                    $config['max_width'] = 10000000;
                    $config['max_height'] = 10000000;
                    $config['file_name'] = $name_file;
                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('img')) {
                        $error = array('error' => $this->upload->display_errors());
                        var_dump($error);
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $data = array(
                            'name' => $this->input->post('txtName'),
                            'email' => $this->input->post('txtEmail'),
                            'password' => $this->input->post('txtPassword'),
                            'avatar' => $name_file,
                            'address' => $this->input->post('txtAddress'),
                            'id_per' => $this->input->post('txtRole'),
                        );
                        $this->users_model->add($data);
                        redirect(base_url('index.php/users/index'));
                    }
                }
            } else {
                redirect(base_url('index.php/index/error'));
            }
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }

    }

    public function view_edit($id_user)
    {
        $user = $this->session->userdata('id');
        if (isset($user)) {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->users = explode(',', $result['permission']->users);
            if (in_array('0', $result['permission']->users) || in_array('3', $result['permission']->users)) {
                $data = array('users.id' => $id_user);
                $result['user'] = $this->users_model->get_by($data);
                $result['role'] = $this->permission_model->get_all();
                view('master.users.edit', $result);
            } else {
                redirect(base_url('index.php/index/error'));
            }
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }

    }

    public function edit_user($id_user)
    {
        $user = $this->session->userdata('id');
        if (isset($user)) {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->users = explode(',', $result['permission']->users);
            if (in_array('0', $result['permission']->users) || in_array('3', $result['permission']->users)) {
                if (!empty($_FILES['img'])) {
                    if ($_FILES['img']['name'] != '') {
                        $name_file = time() . $_FILES['img']['name'];
                        $config['upload_path'] = 'assets/upload_images/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = 10000000;
                        $config['max_width'] = 10000000;
                        $config['max_height'] = 10000000;
                        $config['file_name'] = $name_file;
                        $this->load->library('upload', $config);
                        $this->upload->do_upload('img');
                        $data = array(
                            'name' => $this->input->post('txtName'),
                            'email' => $this->input->post('txtEmail'),
                            'password' => $this->input->post('txtPassword'),
                            'avatar' => $name_file,
                            'address' => $this->input->post('txtAddress'),
                            'id_per' => $this->input->post('txtRole'),
                        );
                        $this->users_model->edit($id_user, $data);
                        redirect(base_url('index.php/users/index'));
                    } else {
                        $data = array(
                            'name' => $this->input->post('txtName'),
                            'email' => $this->input->post('txtEmail'),
                            'password' => $this->input->post('txtPassword'),
                            'address' => $this->input->post('txtAddress'),
                            'id_per' => $this->input->post('txtRole'),
                        );
                        $this->users_model->edit($id_user, $data);
                        redirect(base_url('index.php/users/index'));
                    }
                }
            } else {
                redirect(base_url('index.php/index/error'));
            }
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }
    }

    public function view_edit_info($id)
    {
        $user = $this->session->userdata('id');
        if (isset($user)) {
            $result['info'] = $this->users_model->get_by(array('users.id' => $id));
            view('master.info.edit', $result);
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }

    }

    public function edit_info($id_user, $key)
    {
        if (!empty($_FILES['img'])) {
            if ($_FILES['img']['name'] != '') {
                $name_file = time() . $_FILES['img']['name'];
                $config['upload_path'] = 'assets/upload_images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 10000000;
                $config['max_width'] = 10000000;
                $config['max_height'] = 10000000;
                $config['file_name'] = $name_file;
                $this->load->library('upload', $config);
                $this->upload->do_upload('img');
                $data = array(
                    'name' => $this->input->post('txtName'),
                    'introduce' => $this->input->post('introduce'),
                    'avatar' => $name_file,
                    'address' => $this->input->post('txtAddress'),
                );
                $this->users_model->edit($id_user, $data);
                if ($key == 'user') {
                    redirect(base_url('index.php/users/infomation/' . $id_user));
                } else {
                    redirect(base_url('index.php/users/view_info/' . $id_user));
                }

            } else {
                $data = array(
                    'name' => $this->input->post('txtName'),
                    'introduce' => $this->input->post('introduce'),
                    'address' => $this->input->post('txtAddress'),

                );
                $this->users_model->edit($id_user, $data);
                if ($key == 'user') {
                    redirect(base_url('index.php/users/infomation/' . $id_user));
                } else {
                    redirect(base_url('index.php/users/view_info/' . $id_user));
                }
            }
        }
    }

    public function view_pass($id)
    {
        $user = $this->session->userdata('id');
        if (isset($user)) {
            $result['info'] = $this->users_model->get_by(array('users.id' => $id));
            view('master.info.changepass', $result);
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }

    }

    public function change_pass($id, $key)
    {
        $data = array(
            'password' => $this->input->post('txtNew')
        );
        $this->users_model->edit($id, $data);
        if ($key == 'user') {
            redirect(base_url('index.php/users/infomation/' . $id));
        } else {
            redirect(base_url('index.php/users/view_info/' . $id));
        }
    }

    public function remove_user($id_user)
    {
        $user = $this->session->userdata('id');
        if (isset($user)) {
            $variable = array(
                'users.id' => $user
            );
            $result['permission'] = $this->users_model->get_by($variable);
            $result['permission']->users = explode(',', $result['permission']->users);
            if (in_array('0', $result['permission']->users) || in_array('4', $result['permission']->users)) {

                $this->users_model->remove($id_user);
                redirect(base_url('index.php/users/index'));
            } else {
                redirect(base_url('index.php/index/error'));
            }
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }
    }

    public function check_login($key)
    {
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        $result['check'] = $this->users_model->get_where($data);
        $count = count($result['check']);
        if ($count > 0) {
            if ($key == 'user') {
                $remember = $this->input->post('rememberUser');
                if ($remember === 'on') {
                    set_cookie('emailUser', $data['email'], time() + 7200);
                    set_cookie('passwordUser', $data['password'], time() + 7200);
                } else {
                    delete_cookie('emailUser');
                    delete_cookie('passwordUser');
                }
                $this->session->set_userdata('id', $result['check']->id);
                $this->session->set_userdata('name', $result['check']->name);
                $this->session->set_userdata('avatar', $result['check']->avatar);
                $url = base_url('index.php/index/index');
                redirect($url);
            } else {
                $remember = $this->input->post('rememberAdmin');
                if ($remember == 'on') {
                    set_cookie('emailAdmin', $data['email'], time() + 7200);
                    set_cookie('passwordAdmin', $data['password'], time() + 7200);
                } else {
                    delete_cookie('emailAdmin');
                    delete_cookie('passwordAdmin');
                }
                if ($result['check']->id_per == 1 || $result['check']->id_per == 2) {
                    $this->session->set_userdata('id', $result['check']->id);
                    $this->session->set_userdata('name', $result['check']->name);
                    $this->session->set_userdata('avatar', $result['check']->avatar);
                    redirect(base_url('index.php/index/view_admin'));
                } else {
                    redirect(base_url('index.php/index/view_admin_login'));
                }

            }

        } else {
            if ($key == 'user') {
                redirect(base_url('index.php/index/view_login'));
            } else {
                redirect(base_url('index.php/index/view_admin_login'));
            }

        }
    }


    public function register()
    {

        if (!empty($_FILES['img'])) {
            $name_file = time() . $_FILES['img']['name'];
            $config['upload_path'] = 'assets/upload_images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 10000000;
            $config['max_width'] = 10000000;
            $config['max_height'] = 10000000;
            $config['file_name'] = $name_file;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            } else {
                $data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('txtEmail'),
                    'password' => $this->input->post('password'),
                    'avatar' => $name_file,
                    'address' => $this->input->post('address'),
                    'introduce' => $this->input->post('introduce'),
                    'id_per' => 3,
                );
                $id = $this->users_model->add($data);
                $this->session->set_userdata('id', $id);
                $this->session->set_userdata('name', $data['name']);
                $this->session->set_userdata('email', $data['email']);
                $this->session->set_userdata('permission', $data['id_per']);
                $this->session->set_userdata('avatar', $data['avatar']);
                redirect(base_url('index.php/index/index'));
            }
        }
    }

    public function logout($key)
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('avatar');
        $this->session->unset_userdata('google');
        if ($key == 'user') {
            if (isset($_SESSION['url']))
                $url = $_SESSION['url'];
            else
                $url = base_url('index.php/index/view_login');
            redirect($url);
        } else {
            redirect(base_url('index.php/index/view_admin_login'));
        }

    }

    public function loginGoogle()
    {
        $client = new Google_Client();
        $client->setAuthConfig(APPPATH . 'config/client_secrets_new.json');
        $client->addScope("email");
        $client->addScope("profile");
        $auth_url = $client->createAuthUrl();
        $service = new Google_Service_Oauth2($client);
        if (!isset($_GET['code'])) {
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $client->authenticate($_GET['code']);
            $google = $service->userinfo->get();
            $result['check'] = $this->users_model->get_where(array('email' => $google->email));
            $count = count($result['check']);
            $client->revokeToken();
            if ($count > 0) {
                if ($_SESSION['key'] == 'user') {
                    $this->session->set_userdata('id', $result['check']->id);
                    $this->session->set_userdata('name', $result['check']->name);
                    $this->session->set_userdata('avatar', $result['check']->avatar);
                    $this->session->set_userdata('google', $result['check']->id_google);
                    if (isset($_SESSION['url']))
                        $url = $_SESSION['url'];
                    else
                        $url = base_url('index.php/index/index');
                    redirect($url);
                } else {
                    if ($result['check']->id_per == 1 || $result['check']->id_per == 2) {
                        $this->session->set_userdata('id', $result['check']->id);
                        $this->session->set_userdata('name', $result['check']->name);
                        $this->session->set_userdata('avatar', $result['check']->avatar);
                        $this->session->set_userdata('google', $result['check']->id_google);
                        redirect(base_url('index.php/index/view_admin'));
                    } else {
                        redirect(base_url('index.php/index/view_admin_login'));
                    }
                }
            } else {
                $data = array(
                    'name' => $google->name,
                    'email' => $google->email,
                    'avatar' => $google->picture,
                    'id_google' => $google->id,
                    'id_per' => 3
                );
                $id = $this->users_model->add($data);

                if ($_SESSION['key'] == 'user') {
                    $this->session->set_userdata('id', $result['check']->id);
                    $this->session->set_userdata('name', $data['name']);
                    $this->session->set_userdata('avatar', $data['avatar']);
                    $this->session->set_userdata('google', $data['id_google']);
                    if (isset($_SESSION['url']))
                        $url = $_SESSION['url'];
                    else
                        $url = base_url('index.php/index/index');
                    redirect($url);
                } else {
                    if ($result['check']->id_per == 1 || $result['check']->id_per == 2) {
                        $this->session->set_userdata('id', $result['check']->id);
                        $this->session->set_userdata('name', $data['name']);
                        $this->session->set_userdata('avatar', $data['avatar']);
                        $this->session->set_userdata('google', $data['id_google']);
                        redirect(base_url('index.php/index/view_admin'));
                    } else {
                        redirect(base_url('index.php/index/view_admin_login'));
                    }
                }
            }
        }
    }

    public function infomation($id_user)
    {
        $data = array('users.id' => $id_user);
        $result['info'] = $this->users_model->get_by($data);
        $news = $this->news_model->count(array('id_user' => $id_user));
        $comments = $this->comments_model->count(array('id_user' => $id_user));
        $result['info']->news = $news;
        $result['info']->comments = $comments;
        view('home.info', $result);
    }
}
