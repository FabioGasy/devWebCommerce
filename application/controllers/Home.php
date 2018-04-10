<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{

    public function index(){
        $data['title'] ="Bienvenue sur E-shop";
        $this->load->view('layout/headerFront',$data);
        $this->load->view('front/index',$data);
        $this->load->view('layout/footerFront',$data);
    }
    public function about(){
        echo 'about nine aa';
    }
}