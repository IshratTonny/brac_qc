<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Tahmid
 * Date: 4/10/2018
 * Time: 11:37 AM
 */

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->load->view('vw_login');
    }

}