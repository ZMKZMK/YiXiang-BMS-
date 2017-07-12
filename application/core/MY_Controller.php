<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *后台自定义控制器
 * User: Ming
 * Date: 2017/7/12
 * Time: 1:09
 */
class MY_Controller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $loginname = $this->session->userdata('loginname');
        if (!$loginname){
            redirect("admin/login/index");//重新跳转
        }

    }

}