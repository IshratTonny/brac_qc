<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Ishrat
 * Date: 10/16/2019
 * Time: 03:06 PM
 */
class Task extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('main_menu', 'task management');
        $this->load->model('auth_model');
    }

    public function initiation_manage()
    {

        $this->session->set_userdata('sub_menu', 'Initiation');
        $data['all_category'] = $this->auth_model->get_category();
        $data['get_all_product'] = $this->auth_model->get_all_product();
        $data['get_all_item'] = $this->auth_model->get_all_item();
        $data['alert_msg'] = 'inc/message.php';
        $data['main_content'] = 'vw_admin_console/vw_initiation_manage';
        $this->load->view('vw_master', $data);

    }
    public function ajax_call_for_product()
    {

        $data['catagory_select'] = $_POST['category_name'];
        $data['all_product'] = $this->auth_model->get_product($data['catagory_select']);
        echo json_encode($data['all_product']);



    }
    public function ajax_call_for_item()
    {


        $data['product_select'] = $_POST['product_name'];
        $data['all_item'] = $this->auth_model->get_item($data['product_select']);
        echo json_encode($data['all_item']);



    }


    public function execution_manage()
    {

        $this->session->set_userdata('sub_menu', 'Initiation');
        $data['all_category'] = $this->auth_model->get_category();
        $data['alert_msg'] = 'inc/message.php';
        $data['main_content'] = 'vw_admin_console/vw_execution_manage';
        $this->load->view('vw_master', $data);

    }

}