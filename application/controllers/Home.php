<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Riyad
 * Date: 4/5/2018
 * Time: 12:38 PM
 */
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('main_menu', 'home');
    }

    public function index() {
        /*echo '<pre>';
        print_r($this->aauth->get_menu());
        die();*/
        $this->session->set_userdata('sub_menu', '');
        $data['main_content'] = 'vw_home/vw_home';
        $this->load->view('vw_master', $data);
    }

}