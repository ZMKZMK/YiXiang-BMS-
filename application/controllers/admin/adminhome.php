<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 后台首页控制器
 * User: Ming
 * Date: 2017/7/11
 * Time: 10:40
 */
class AdminHome extends CI_Controller
{
    /**
     * 后台首页展示
     */
    public function index()
    {
        $this->load->view('admin/index.html');
    }

    /**
     * 后台登陆入口
     */
    public function login(){
        $this->load->view("admin/login.html");
    }

}