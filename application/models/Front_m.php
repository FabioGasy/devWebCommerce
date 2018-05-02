<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Front_m extends CI_Model{
    public function produit(){
        $query = $this->db->get('produit');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
       
     }
     public function find($id){
         $this->db->where('id',$id);
         return $this->db->get('produit')->row();
     }
 }