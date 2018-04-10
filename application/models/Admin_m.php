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
    function getProduit(){
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
    function submit(){
        $query       = $this->db->get('produit');
        $upload_data = $this->upload->data();
         
       
        $field       = array(
            'titre'=>$this->input->post('nom'),
            'description'=>$this->input->post('descri'),
            'prix'=>$this->input->post('prix'),
            'stock'=>$this->input->post('stock'),
            'categorie'=>$this->input->post('categorie'), 
            'imageProduit'=>$this->set->$upload_data['file_name']         
        );
        $this->db->insert('produit',$field);
        return $this->db->insert('produit');
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
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

}