<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author luisc
 */
class Producto {

  private $id;
  private $categoria_id;
  private $nombre;
  private $descripcion;
  private $precio;
  private $stock;
  private $oferta;
  private $fecha;
  private $imagen;
  private $db;

  function __construct() {
    $this->db = Database::connect();
  }

  function getId() {
    return $this->id;
  }

  function getCategoria_id() {
    return $this->categoria_id;
  }

  function getNombre() {
    return $this->nombre;
  }

  function getDescripcion() {
    return $this->descripcion;
  }

  function getPrecio() {
    return $this->precio;
  }

  function getStock() {
    return $this->stock;
  }

  function getOferta() {
    return $this->oferta;
  }

  function getFecha() {
    return $this->fecha;
  }

  function getImagen() {
    return $this->imagen;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setCategoria_id($categoria_id) {
    $this->categoria_id = $categoria_id;
  }

  function setNombre($nombre) {
    $this->nombre = $this->db->real_escape_string($nombre);
  }

  function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
  }

  function setPrecio($precio) {
    $this->precio = $this->db->real_escape_string($precio);
  }

  function setStock($stock) {
    $this->stock = $this->db->real_escape_string($stock);
  }

  function setOferta($oferta) {
    $this->oferta = $oferta;
  }

  function setFecha($fecha) {
    $this->fecha = $fecha;
  }

  function setImagen($imagen) {
    $this->imagen = $imagen;
  }

  public function getALL() {
    $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
    return $productos;
  }
  
    public function getOne() {
    $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
//    var_dump($producto);
    return $producto->fetch_object();
  }

  public function save() {
    $conection = $this->db;
    $sql = "INSERT INTO productos VALUES(NULL, '{$this->getCategoria_id()}', '{$this->getNombre()}', '{$this->getPrecio()}', '{$this->getStock()}', '{$this->getImagen()}')";
    $save = $conection->query($sql);

    $result = false;
    if ($save) {
      $result = true;
    }
    return $result;
  }
  
   public function edit() {
    $conection = $this->db;
    $sql = "UPDATE productos SET  nombre='{$this->getNombre()}', precio={$this->getPrecio()}, stock={$this->getStock()}, categoria_id={$this->getCategoria_id()} ";
    if($this->getImagen() != null){
      $sql .= ", imagen='{$this->getImagen()}'";
    }
    $sql .= " WHERE id = {$this->id};";
    $save = $conection->query($sql);

    $result = false;
    if ($save) {
      $result = true;
    }
    return $result;
  }
  
  
  public function delete(){
    
    $sql = "DELETE FROM productos WHERE id={$this->id}";
    $delete = $this->db->query($sql);
    
    $result = false;
    if($delete){
      $result = true;
    }
    return $result;
  }
  
  //productos en el inicio
  public function getRandom($limit){
    $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
    return $productos;
  }
  
    public function getAllCategory() {
    $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p"
        . "INNER JOIN categorias c ON c.id = p.categoria_id"
        . "WHERE p.categoria_id = {$this->getCategoria_id()}"
        . "ORDER BY id DESC";
    $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
    return $productos;
  }

}
