<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 后台登陆控制器
 * User: Ming
 * Date: 2017/7/11
 * Time: 15:11
 */
class Login extends CI_Controller
{
    /**
     * 登陆默认方法
     */
    public function index(){
        $this->load->helper('captcha');//载入验证码辅助函数
        //配置项
        $vals = array(
            'img_path' => './captcha',

        );
        $this->load->view('admin/login.html');
    }

}