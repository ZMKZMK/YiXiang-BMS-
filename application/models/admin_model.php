<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 后台管理员管理模型
 * User: Ming
 * Date: 2017/7/12
 * Time: 10:43
 */
class admin_model extends CI_Model
{
    /**
     * 管理员信息修改
     */
    public function change_admin_info($aid,$data){
        $this->db->where('aid',$aid)->update('admins', $data);

    }

}