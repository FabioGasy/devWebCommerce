<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('front_m');
    }

    public function index(){
        $data['title']     = "Bienvenue sur E-shop";
        $this->load->view('layout/headerFront',$data);
        $this->load->view('front/index');
        $this->load->view('layout/footerFront');
    }
    public function panier(){
        $this->load->model('admin_m');
        $produit['listProduit'] = $this->admin_m->getProduit();
        $data['title']     = "Votre panier";
        $this->load->view('layout/headerFront',$data);
        $this->load->view('front/panier',$produit);
        $this->load->view('layout/footerFront');
    }

    public function boutique(){
        $data['title']="E-shop-Boutique";
        
        $this->load->view('layout/headerFront',$data);
        $this->load->view('front/boutique');
        $this->load->view('layout/footerFront');   
    }

    public function Boutiqueshop($name){
        $data['title']="E-shop-Boutique ".$name;
        $donne['name']=$name;
        
        $this->load->view('layout/headerFront',$data);
        $this->load->view('front/shopBoutique',$donne);
        $this->load->view('layout/footerFront');   
    }
}