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
    public function submit(){
        $this->load->helper(array('form','file','url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nom','titre','trim|required');
        $this->form_validation->set_rules('descri','description','trim|required');
        $this->form_validation->set_rules('prix','prix','trim|required');
        $this->form_validation->set_rules('stock','stock','trim|required');
        $this->form_validation->set_rules('cattegorie','categorie');

        $config                         = array();
        $config['upload_path']          = './uploads';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->upload->library('upload',$config);

        if($this->form_validation()->run()==true and !empty($_FILES[imagePro][name][0])){

        $this->upload->do_upload();
        $data = array('upload_data' => $this->upload->data());
        $this->image_resize($data['upload_data'],['full_path'],$data['upload_data']['filename']);
        
        $this->session->set_flashdata('success_msg','Produit ajouter avec Succès!!');

        }else{
            $this->session->set_flashdata('error_msg','Produit non ajouté!!');
        }

      //  $result = $this->admin_m->submit();
        //  if (!$this->upload->do_upload('imagePro') == TRUE && !$result==TRUE) {
          	
          //}else{
            //$this->admin_m->submit();
            //$this->session->set_flashdata('success_msg','Produit ajouter avec Succès!!');
         // }
             redirect(base_url().'admin/produit');
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
    public function ajouterProduit(){

     if($this->session->userdata('username')!=''){
            $data['title'] ="Ajouter des produits";
            $donne['categorie'] = $this->admin_m->getCategorie();


           
                $this->load->view('layout/header',$data);
                $this->load->view('admin/add',$donne);
                $this->load->view('layout/footer');


        }else{
            redirect(base_url().'admin/index');
        }
     }

    public function modifierProduit($id){
        if($this->session->userdata('username')!=''){
            $donne['title']        ="Modifier produit";
            $data['produit']       = $this->admin_m->getProByID($id);
            


            $this->load->view('layout/header',$donne);
            $this->load->view('admin/edit',$data);
            $this->load->view('layout/footer');


        }else{
            redirect(base_url().'admin/index');
        }
    }

    public function update(){
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

}