<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * index 方法默认访问
     */
	public function index()
	{
		$this->load->view('index/welcome_message');
	}
}
