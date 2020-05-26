<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarritoController
 *
 * @author luisc
 */
require_once 'models/producto.php';

class CarritoController {
  
  public function index(){
    $carrito = $_SESSION['carrito'];
    require_once 'views/carrito/index.php';
    
  }
  
  public function add(){
    if(isset($_GET['id'])){
      $producto_id = $_GET['id'];
    }else{
      header('Location:'.base_url);
    }
    if(isset($_SESSION['carrito'])){
      $counter = 0;
      foreach ($_SESSION['carrito'] as $indice => $elemento) {
        if($elemento['id_producto'] == $producto_id){
          $_SESSION['carrito'][$indice]['unidades']++;
          $counter++;
        }
      }
      
    }
    if(!isset($counter) || $counter == 0){
      //conseguir producto
      $producto = new Producto();
      $producto->setId($producto_id);
      $producto = $producto->getOne();
      
      //añadir al carrito
      if(is_object($producto)){
        $_SESSION['carrito'][] = [
          "id_producto" => $producto->id,
          "precio" => $producto->precio,
          "unidades" => 1,
          "producto" => $producto
        ];
      }
    }
    header('Location:'.base_url."carrito/index");
  }
  
  
  public function delete_all(){
    unset($_SESSION['carrito']);
    header('Location:'.base_url."carrito/index");
  }
  
}
