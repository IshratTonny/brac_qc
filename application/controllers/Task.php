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
       $data['all_product'] = $this->auth_model->get_all_product();
       $data['all_item'] = $this->auth_model->get_all_item();
        $data['alert_msg'] = 'inc/message.php';
        $data['main_content'] = 'vw_admin_console/vw_initiation';
        $this->load->view('vw_master', $data);

    }
    public function ajax_call_for_category()
    {


        $all_category=$this->auth_model->get_category();
        $data = array();
        if($all_category)
        {
            foreach ($all_category as $row)
            {
                $temp = array();
                $category_name = $row->category_name;
                $category_id = $row->category_id;
                $category_name_id= "<a onclick=\" find_product($category_id)\">$category_name</a>";

                 array_push($temp, $category_name_id);
                 array_push($data, $temp);

            }
              echo json_encode(array('data'=>$data));
        
        }
        else{
            echo '{
                    "sEcho": 1,
                    "iTotalRecords": "0",
                    "iTotalDisplayRecords": "0",
                    "aaData": []
                }';
        }
      
        
    }
    public function ajax_call_for_product()
    {

          $catagory_id= $_POST['category_id'];

         $all_product=$this->auth_model->get_product($catagory_id);
        $data = array();
        if($all_product)
        {
            foreach ($all_product as $row)
            {
                $temp = array();
                $product_name = $row->product_name;
                $product_id = $row->product_id;

                $product_name_id= "<a onclick=\" find_item($product_id)\">$product_name</a>";

                array_push($temp, $product_name_id);
                array_push($data, $temp);

            }
            echo json_encode(array('data'=>$data));

        }
        else{
            echo '{
                    "sEcho": 1,
                    "iTotalRecords": "0",
                    "iTotalDisplayRecords": "0",
                    "aaData": []
                }';
        }
    }
    public function ajax_call_for_item()
    {


        $product_select_id = $_POST['product_id'];

        $all_item = $this->auth_model->get_item($product_select_id);
        $data = array();
        if( $all_item)
        {
            foreach (  $all_item as $row)
            {

                $temp = array();
                $item_name = $row->item_name;
                $item_id = $row->item_id;
                $item_status = $row->item_status;
                $box=" <input type=\"checkbox\" name=\"foo\" value=\"bar1\"> <br/>";
                $view_btn = " <a href=\"#\" class=\"btn btn-info btn-sm btn-icon icon-left\">
                                VIEW
                            </a>";
                $delet_btn = "<a href=\"#\" class=\"btn btn-danger btn-sm btn-icon icon-left\"      >
										Delete
									</a>";
                $delet_item = "<p1 onclick=\"delete_item($item_id, $product_select_id)\">$delet_btn</p1>";
                $action = " $view_btn    $delet_item";
                array_push($temp,   $box);
                array_push($temp,  $item_name);
                array_push($temp,  $item_status);
                array_push($temp,    $action );

                array_push($data, $temp);

            }
            echo json_encode(array('data'=>$data));

        }
        else{
            echo '{
                    "sEcho": 1,
                    "iTotalRecords": "0",
                    "iTotalDisplayRecords": "0",
                    "aaData": []
                }';
        }





    }
public  function  ajax_call_for_item_delete()
{

    $item_select_id = $_POST['item_id'];
    $product_select_id= $_POST['product_id'];
    if($this->auth_model->delete_item($item_select_id)>0)
    {
        $all_item =  $this->auth_model->get_item($product_select_id);
        $data = array();
        if( $all_item)
        {
            foreach (  $all_item as $row)
            {

                $temp = array();
                $item_name = $row->item_name;
                $item_id = $row->item_id;
                $item_status = $row->item_status;
                $box=" <input name=\"selector[]\" id=\"ad_Checkbox1\" class=\"ads_Checkbox\" type=\"checkbox\" value=\"1\" /> <br/>";
                $view_btn = " <a href=\"#\" class=\"btn btn-info btn-sm btn-icon icon-left\">
                                VIEW
                            </a>";
                $delet_btn = "<a href=\"#\" class=\"btn btn-danger btn-sm btn-icon icon-left\"      >
										Delete
									</a>";
                $delet_item = "<p1 onclick=\"delete_item($item_id,$product_select_id)\">$delet_btn</p1>";
                $action = " $view_btn    $delet_item";
                array_push($temp,   $box);
                array_push($temp,  $item_name);
                array_push($temp,  $item_status);
                array_push($temp,    $action );

                array_push($data, $temp);

            }
            echo json_encode(array('data'=>$data));

        }
        else
            {
            echo '{
                    "sEcho": 1,
                    "iTotalRecords": "0",
                    "iTotalDisplayRecords": "0",
                    "aaData": []
                }';
        }




    }


}
public  function edit_items()
{

    $this->session->set_userdata('sub_menu', 'Initiation');
    $data['alert_msg'] = 'inc/message.php';
    $data['main_content'] = 'vw_admin_console/vw_edit_item';
    $this->load->view('vw_master', $data);


}
public function ajax_call_for_update_item()
{
   echo ("hellow world");
}

    public function execution_manage()
    {

      //  $this->session->set_userdata('sub_menu', 'Initiation');
       // $data['all_category'] = $this->auth_model->get_category();
      //  $data['alert_msg'] = 'inc/message.php';
       // $data['main_content'] = 'vw_admin_console/vw_execution_manage';
       // $this->load->view('vw_master', $data);

    }

}
