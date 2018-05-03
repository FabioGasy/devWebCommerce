<?php

/**
 * Created by PhpStorm.
 * User: geek
 * Date: 03/05/2018
 * Time: 23:24
 */
defined('BASEPATH') OR exit('No direct script access allowed');

 class Product extends CI_Model{
     function __construct() {
         $this->tableName = 'produit';
         $this->primaryKey = 'id';
     }
 public function insert($data = array()){
     $insert = $this->db->insert($this->tableName,$data);
    if($insert){
    return $this->db->insert_id();
     }else{
    return false;
    }
 }

 }