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
    * 构造函数
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');//登陆操作--模型
        $this->load->model('admin_model');//管理员操作--模型
    }


    /**
     * 登陆默认方法
     */
    public function index(){

        /***验证码***/
        $this->load->helper('captcha');//载入验证码辅助函数
        $speed = 'qwertyuiopasdfghjklzxcvbnm1597534682';
        $word = '';
        for ($i = 0; $i < 4; $i++){
            $word .= $speed[mt_rand(0,strlen($speed)-1)];
        }
        //配置项
        $vals = array(
            'font_path' => base_url().'style/admin/login/fonts/captcha_font.ttf',
            'word' => $word,
            'img_path' => './captcha/',
            'img_url' => base_url().'captcha/',
            'img_width' => 102,
            'img_height' => 43,
            'expiration' => 60,//保留60秒
            'font_size' => 26,
        );
        $captcha = create_captcha($vals);//创建
        $data['captcha'] = $captcha['image'];
        /***验证码***/

        $this->load->view('admin/login.html',$data);
    }

    /**
     * 后台登陆验证
     */
    public function login_in(){

        $loginname = $this->input->post('loginname');
        $password = md5($this->input->post('password'));

        $adminData = $this->login_model->admin_check($loginname,$password);
        if (!$adminData || $adminData[0]['password'] != $password){
            error('用户名或密码错误');
        }

        /*
         * 登陆成功ing
         */
        if (!isset($_SESSION)){
            session_start();
        }
        $sessionData = array(
            'loginname' =>$loginname,
            'username' =>$adminData[0]['username'],
            'password' =>$this->input->post('password'),
            'aid' => $adminData[0]['aid'],
            'logintime' => time()
        );
        $this->session->set_userdata($sessionData);
        successful('admin/adminhome/index');
    }

    /**
     * 后台账号退出
     */
    public function exit_management(){
        $sessionData = array(
            'loginname',
            'password',
            'aid',
            'logintime'
        );
        $this->session->unset_userdata($sessionData);
        successful('admin/login/index');
    }

    /**
     * 后台登陆账号密码修改动作
     */
    public function change_admin_info(){
        $change_loginname = $this->input->post('change_loginname');
        $change_password = md5($this->input->post('change_password'));
        $aid = $this->session->aid;
        $data = array(
            'loginname' => $change_loginname,
            'password' => $change_password,
        );
        $this->admin_model->change_admin_info($aid,$data);

        /*
             * 账号密码修改成功
         */
        $sessionData = array(
            'loginname' =>$change_loginname,
            'password' =>$this->input->post('change_password')
        );
        $this->session->set_userdata($sessionData);
        father_successful('admin/adminhome/index');
    }

}