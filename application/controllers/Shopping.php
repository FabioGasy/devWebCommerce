<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shopping extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('front_m');
    }
    public function ajouterPanier($id){
        $produit = $this->front_m->find($id);
        $donne['title']="E-shop-Ajouter ".$produit->titre." au panier";
        $data = array(
            'id'      => $produit->id,
            'qty'     => 1,
            'price'   => $produit->prix,
            'name'    => $produit->titre
    );
    
    $this->cart->insert($data);
    $this->load->view('layout/headerFront',$donne);
    $this->load->view('front/panierInfo',$data);
    $this->load->view('layout/footerFront');
    }

    public function delete($rowid){
        $donne['title'] = "E-Shop-Effacer ".$rowid." du panier";
        $this->cart->update(array(
            'rowid' => $rowid,
            'qty'   => 0
        ));
     $this->load->view('layout/headerFront',$donne);
    $this->load->view('front/panierInfo');
    $this->load->view('layout/footerFront');
    }

    public function rafraichirPanier(){
        $i = 1;
        foreach($this->cart->contents() as $items){
            $this->cart->update(array('rowid' => $items['rowid'], 'qty' => $_POST['qty'.$i]));
            $i++;
        }
        redirect (base_url('shopping/afficherPanier'));
    }

    public function afficherPanier(){
        $donne['title'] = "E-Shop-Information panier";
        $this->load->view('layout/headerFront',$donne);
        $this->load->view('front/panierInfo');
        $this->load->view('layout/footerFront');
    }
}