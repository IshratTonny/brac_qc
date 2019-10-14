<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Riyad
 * Date: 4/5/2018
 * Time: 12:38 PM
 */
class Forms extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('main_menu', 'Evaluation Form');
    }

    public function index() {
        /*echo '<pre>';
        print_r($this->aauth->get_menu());
        die();*/
        $this->session->set_userdata('sub_menu', '');
        $data['main_content'] = 'vw_home/vw_home';
        $this->load->view('vw_master', $data);
    }

    public function add_new_evaluation_form()
    {
        $this->session->set_userdata('sub_menu', 'new');
        $data['alert_msg'] = 'inc/message.php';
        for($i = 1; $i <= 100; $i++)
        {
            $data['point_value'][$i-1] = $i;
        }
        //echo '<pre>';print_r($data['point_value']);die();
        $data['main_content'] = 'forms/add_evaluation_form';
        $this->load->view('vw_master', $data);
    }

    public function manage_evaluation_form()
    {
        $this->session->set_userdata('sub_menu', 'manage');
        $data['alert_msg'] = 'inc/message.php';
        $data['main_content'] = 'forms/manage_evaluation_form';
        $this->load->view('vw_master', $data);
    }

}