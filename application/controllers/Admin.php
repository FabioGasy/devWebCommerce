<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('admin_m'); //function model
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index(){
        
        $data['title'] ="Veuillez vous connecter";
		$this->load-> view('admin/login',$data);
		
    }
    public function login_validation(){
        
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run()){
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            

            if($this->admin_m->connecter($username,$password)){
               
                $session_data = array(
                    'username'=> $username
                );
                $this->session->set_userdata($session_data);
                
                redirect(base_url() . 'admin/home');
            }else{
                
                $this->session->set_flashdata("error",'Invalid Username and Password!!');
                redirect(base_url() . 'admin/index');
                
            }

        }else{
            $this->index();
         }
    }
    public function logout(){
        $this->session->unset_userdata('username');
        redirect(base_url().'admin/index');
    }

    public function home(){
        if($this->session->userdata('username') != ''){
            $data['title']       ="Bienvenue sur le tableau de bord";
            $pro['isa']          =  $this->admin_m->getProduit();
            $this->load->view('layout/header',$data);
            $this->load->view('admin/index',$pro);
            $this->load->view('layout/footer');

        }else{
            redirect(base_url() . 'admin/index');
        }
       
    } 
    public function adminParametre(){
        if($this->session->userdata('username')!=''){
            $data['title']="Parametre de l'administration";
            $this->load->view('layout/header',$data);

        }else{
            redirect(base_url() . 'admin/index'); 
        }
    }
    public function options(){
        if($this->session->userdata('username')!= ''){
            $data['title'] = "Paramètre d'E-SHOP";
            $this->load->view('layout/header',$data);
            $this->load->view('admin/option');
            $this->load->view('layout/footer');
        }else{
            redirect (base_url().'admin/index');
        }
    }

    public function produit(){
        if($this->session->userdata('username') != ''){
            $data['title']       ="Liste des produits";
            $donne['produit']    = $this->admin_m->getProduit();

            $this->load->view('layout/header',$data);
            $this->load->view('admin/produit',$donne);
            $this->load->view('layout/footer');
        }else{
            redirect(base_url() . 'admin/index');
        }
    }
  public function submit(){
        $result = $this->admin_m->submit();
		if($result){
	$this->session->set_flashdata('success_msg','Produit ajouter avec succès!!');
					}else{

	$this->session->set_flashdata('error_msg','Produit Non ajouté!!');				
					}

	redirect(base_url('admin/produit'));


    }

    public function ajouterProduit(){

     if($this->session->userdata('username')!=''){
        $data['title']       ="Ajouter produit";
        $donne['categorie']  = $this->admin_m->getCategorie();
        
        
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'jpg|png|jepg';
        $config['max_size']      = '2048';
        $config['max_width']     = '1024';
        $config['max_height']    = '768';
        

        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('imagePro')){
            $this->load->view('layout/header',$data);
            $this->load->view('admin/ajoutProduit',$donne);
            $this->load->view('layout/footer');
        }else{
            $image = array('upload_data' => $this->upload->data());
            $this->admin_m->submit();
        }  
        }else{
            redirect(base_url().'admin/index');
        }
     }

    public function modifierProduit($id){
        if($this->session->userdata('username')!=''){
            $donne['title']        ="Modifier produit";
            $data['produit']       = $this->admin_m->getProByID($id);
            


            $this->load->view('layout/header',$donne);
            $this->load->view('admin/editProduit',$data);
            $this->load->view('layout/footer');


        }else{
            redirect(base_url().'admin/index');
        }
    }

    public function updateProduit(){
        $result=$this->admin_m->update();
        if($result){
$this->session->set_flashdata('success_msg','Modifié avec succès!!');
                }else{

$this->session->set_flashdata('error_msg','Non Modifié!!');				
                }

                redirect(base_url().'admin/produit');

}

public function effacerProduit($id){

    $result = $this->admin_m->effacerProduit($id);
    if($result){
$this->session->set_flashdata('success_msg','Effacer avec succés!!');
                }else{

$this->session->set_flashdata('error_msg','Non Effacer!!');				
                }

                redirect(base_url().'admin/produit');
}

 public function categorie(){
        if($this->session->userdata('username') != ''){
            $data['title']       ="Liste des categories";
            $donne['categorie']    = $this->admin_m->getCategorie();

            $this->load->view('layout/header',$data);
            $this->load->view('admin/categorie',$donne);
            $this->load->view('layout/footer');
        }else{
            redirect(base_url() . 'admin/index');
        }
    }

   public function submitCategorie(){
    if($_FILES['imageCat']['size'] != 0){
        $upload_dir = './uploads/';

        if(!is_dir($upload_dir)){
            mkdir ($upload_dir);
        }
        $config['upload_path']   = $upload_dir;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name']     = 'imageCat_'.substr(md5(rand()),0,7);
        $config['overwrite']     = false;
        $config['max_size']      = '5120';

        $this->load->library('upload',$config);
        $result = $this->admin_m->submitCategorie();
		if($result && $this->upload->do_upload('imageCat')){
           
    $this->upload_data['file'] =  $this->upload->data();
    $this->session->set_flashdata('success_msg','Categorie ajouter avec succès!!');
    return true;
					}else{

    $this->session->set_flashdata('error_msg','Categorie Non ajouté!!');
    return false;				
                    }
                }

		redirect(base_url('admin/categorie'));


	}

public function ajoutCategorie(){
    if($this->session->userdata('username')!=''){
        $data['title'] = "Ajouter nouveau categorie";
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->view('layout/header',$data);
        $this->load->view('admin/ajoutCategorie');
        $this->load->view('layout/footer');

     //   $this->form_validation->set_rules('nom','Nom','required');
       // $this->form_validation->set_rules('imageCat','Imagecategorie','callback_image_upload');
     //   if($this->form_validation->run()== TRUE){
       //     return true;
        //}
          
    }else{
        redirect (base_url(). 'admin/index');
    }
}

/*public function image_upload(){
    if($_FILES['imageCat']['size'] != 0){
        $upload_dir = './uploads/';

        if(!is_dir($upload_dir)){
            mkdir ($upload_dir);
        }
        $config['upload_path']   = $upload_dir;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name']     = 'imageCat_'.substr(md5(rand()),0,7);
        $config['overwrite']     = false;
        $config['max_size']      = '5120';

        $this->load->library('upload',$config);

        if($this->upload->do_upload('imageCat')){
            return false;
        }else{
            $this->upload_data['file'] =  $this->upload->data();
            return true;
        }

    }
}*/

public function effacerCategorie($id){
    $result = $this->admin_m->effacerCategorie($id);
    if($result){
$this->session->set_flashdata('success_msg','Effacer avec succés!!');
                }else{

$this->session->set_flashdata('error_msg','Non Effacer!!');				
                }

                redirect(base_url().'admin/categorie');
}

public function modifierCategorie($id){
    if($this->session->userdata('username')!=''){
        $donne['title']          ="Modifier categorie";
        $data['categorie']       = $this->admin_m->getCatByID($id);
        


        $this->load->view('layout/header',$donne);
        $this->load->view('admin/editCategorie',$data);
        $this->load->view('layout/footer');


    }else{
        redirect(base_url().'admin/index');
    }
}

public function updateCategorie(){
    $result=$this->admin_m->modifierCategorie();
    if($result){
$this->session->set_flashdata('success_msg','Modifié avec succès!!');
            }else{

$this->session->set_flashdata('error_msg','Non Modifié!!');				
            }

            redirect(base_url().'admin/categorie');

}

}