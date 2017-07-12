<?php if (!defined('BASEPATH')) exit('No direct script access allowed!') ?>
<?php
/**
 * 登陆模型
 * User: Ming
 * Date: 2017/7/11
 * Time: 21:09
 */
class login_model extends CI_Model
{
    /**
     * 后台登陆账号密码验证
     * ---查询后台用户数据
     */
    public function admin_check($loginname){
//        $this->db->where(array(
//            'loginname' => $loginname,
//            'password' => $password
//        ))->get('admins')->result_array();
        $data = $this->db->get_where('admins',array(
           'loginname' => $loginname,
        ))->result_array();
        return $data;
    }


}