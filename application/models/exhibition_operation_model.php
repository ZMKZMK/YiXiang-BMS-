<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 首页展示管理模型
 * User: Ming
 * Date: 2017/7/21
 * Time: 17:46
 */
class exhibition_operation_model extends CI_Model
{
    /**
     * 展示页显示
     */
    public function show_info(){
        $data = $this->db->select('mid,picname,pictitle,picbrief')->get('exhibition_show')->result_array();
        return $data;
    }

    /**
     * 展示页简介保存
     */
    public function save_brief($mid,$data){
        $this->db->where(array('mid'=>$mid))->update('exhibition_show', $data);
    }


}