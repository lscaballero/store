<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author luisc
 */
class Categoria {

  private $id;
  private $nombre;
  private $db;

  function __construct() {
    $this->db = Database::connect();
  }

  function getId() {
    return $this->id;
  }

  function getNombre() {
    return $this->nombre;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setNombre($nombre) {
    $this->nombre = $this->db->real_escape_string($nombre);
  }

  function getALL() {
    $categoria = $this->db->query("SELECT * FROM categorias ORDER BY nombre DESC;");
    return $categoria;
  }
  
   function getOne() {
    $categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()};");
    return $categoria->fetch_object();
  }
  
  function save(){
    
    $conecction = $this->db;
    $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}')";
    $save = $conecction->query($sql);

    $result = false;
    if ($save) {
      $result = true;
    }
    return $result;
    
  }

}

//fin clases
