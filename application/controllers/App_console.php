<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Appinion Laptop
 * Date: 4/11/2018
 * Time: 1:21 PM
 */

class App_console extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('main_menu', 'app console');
    }

    public function office()
    {
        $this->session->set_userdata('sub_menu', 'office');
        $data['alert_msg'] = 'inc/message.php';
        $data['main_content'] = 'vw_app_console/vw_office';
        $this->load->view('vw_master', $data);
    }

    public function add_office()
    {
        $this->session->set_userdata('sub_menu', 'office');
        $data['alert_msg'] = 'inc/message.php';
        $data['main_content'] = 'vw_app_console/vw_add_office';
        $this->load->view('vw_master', $data);
    }

    public function edit_office($ofc_id)
    {
        $this->session->set_userdata('sub_menu', 'office');
        $data['alert_msg'] = 'inc/message.php';
        $data['ofc_id'] = $ofc_id;
        $data['main_content'] = 'vw_app_console/vw_edit_office';
        $this->load->view('vw_master', $data);
    }
}