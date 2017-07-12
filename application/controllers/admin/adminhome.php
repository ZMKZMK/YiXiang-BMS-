<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 后台首页控制器（点击->重定向）
 * User: Ming
 * Date: 2017/7/11
 * Time: 10:40
 */
class AdminHome extends MY_Controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');//登陆操作--模型
    }

    
    /**
     * 后台进入
     */
    public function index()
    {
            $data['admin_data']['loginname'] = $this->session->userdata('loginname');
            $data['admin_data']['username'] = $this->session->userdata('username');
            $this->load->view('admin/index.html',$data);
    }
    /**
     * 后台首页显示
     */
    public function show_home(){
        $this->load->view('admin/home.html');
    }

    /**
     * 后台管理员信息配置修改页面
     */
    public function change_profile(){
        $this->load->view('admin/profile.html');
    }


}