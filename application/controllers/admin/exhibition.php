<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 展示页操作控制器
 * User: Ming
 * Date: 2017/7/22
 * Time: 0:07
 */
class exhibition extends MY_Controller
{
    /**
     * 构造函数
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');//登陆操作--模型
        $this->load->model('admin_model');//管理员操作--模型
        $this->load->model('exhibition_operation_model');//展示页操作--模型
    }

    /**
     * 展示页简介保存操作
     */
    public function save_exhibition_brief(){
        $mid = $this->input->post('mid');
        $data = array(
            'picbrief' => $this->input->post('brief')
        );
        $this->exhibition_operation_model->save_brief($mid,$data);
        return "aa";
    }

}