<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaController
 *
 * @author luisc
 */
require_once 'models/Categoria.php';
require_once 'models/producto.php';

class CategoriaController {

  public function index() {
    Utils::isAdmin();
    $categoria = new Categoria();
    $categorias = $categoria->getALL();

    require_once 'views/categoria/index.php';
  }

  public function crear() {
    Utils::isAdmin();
    require_once 'views/categoria/crear.php';
  }

  public function save() {
    Utils::isAdmin();
    if (isset($_POST) && ISSET($_POST['nombre'])) {
      $categoria = new Categoria();
      $categoria->setNombre($_POST['nombre']);
      $categoria->save();
    }
    header("Location:" . base_url . "categoria/index");
  }

  public function ver(){
    if(isset($_GET['id'])){
     $id = $_GET['id'];
     
     
     // conseguir categoria
     $categoria = new Categoria();
     $categoria->setId($id);
     $categoria = $categoria->getOne(); 
     
     //conseguir producto
     $producto = new Producto();
     $producto->setCategoria_id($id);
     $productos = $producto->getAllCategory();
    }
    
    require_once 'views/categoria/ver.php';
  }
}
