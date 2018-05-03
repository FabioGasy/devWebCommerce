<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Admin_m extends CI_Model{

    function connecter($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query = $this->db->get('users');
        //SELECT * FROM users WHERE username='$username' AND password='$password'

        if($query->num_rows() >O){
                return true;
        }else{
                return false;
        }

    }

    public function getUser(){
        $query=$this->db->get('users');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
    }
   public function getProduit(){
       $query = $this->db->get('produit');
       if($query->num_rows()>0){
           return $query->result();
       }else{
           return false;
       }
      
    }
    function getCategorie(){
        $query = $this -> db->get('categorie');
        if($query->num_rows()>0){
            return $query->result();
        }else{

        }

    }

    public function getProById($id){
		$this->db->where('id',$id);
		$query=$this->db->get('produit');

		if($query->num_rows()>0){

			return $query->row();

		}else{
			return false;
		}
    }
   
    public function update(){

		$id = $this->input->post('hidden');
		$field = array(
			'titre' =>$this->input->post('nom'),
			'description'=>$this->input->post('descri'),
            'prix'=>$this->input->post('prix'),
            'stock'=>$this->input->post('stock'),
            'categorie'=>$this->input->post('categorie')
			);
		$this->db->where('id',$id);
        $this->db->update('produit',$field);
        
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}

    }
    public function effacerProduit($id){
        $this->db->where('id',$id);
		$this->db->delete('produit');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
    }

    public function submitCategorie(){
      //  $this->db->insert('categorie',$categorie);
      $titre    = $this ->input->post('nom');
      $image    = 'imageCat_'.substr(md5(rand()),0,7);
       $field = array(
           'name'        => $titre,
           'categorieImage' => $image
       );
        $this->db->insert('categorie',$field);
       if($this->db->affected_rows()>0){ 
         return true;
       }else{
           return false;
       }
    }

    public function effacerCategorie($id){
        $this->db->where('id',$id);
		$this->db->delete('categorie');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
    }

    public function getCatById($id){
		$this->db->where('id',$id);
		$query=$this->db->get('categorie');

		if($query->num_rows()>0){

			return $query->row();

		}else{
			return false;
		}
    }

    public function modifierCategorie(){

		$id = $this->input->post('hidden');
		$field = array('name' =>$this->input->post('nom'));
		$this->db->where('id',$id);
        $this->db->update('categorie',$field);
        
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}

    }

}