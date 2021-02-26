<?php

use Vendor\Model\Book;
use Vendor\Model\Disc;
use Vendor\Model\Furniture;
use Vendor\Model\Product;
use Vendor\Route\RouteFactory;

spl_autoload_register(function($class) {
    include_once str_replace('\\', '/', $class) . '.php';
});

  RouteFactory::set("addproduct",function($sku){

    if( isset( $_POST['sku'] ) ){
      $sku = $_POST['sku'];
    } else {
      die();
    }

    if( isset( $_POST['name'] ) ){
      $name = $_POST['name'];
    } else {
      die();
    }

    if( isset( $_POST['price'] ) ){
      $price = floatval($_POST['price']);
    } else {
      die();
    }

    if( isset( $_POST['type'] ) ){
      $type = $_POST['type'];
    } else {
      die();
    }


    if ( $type == "Book") {

        if( isset($_POST['weight']) ){
          $weight = floatval(  $_POST['weight']  );

          $book = new Book();

          $book->setSku($sku);
          $book->setName($name);
          $book->setPrice($price);  
          $book->setWeight($weight);

          echo json_encode($book->save());

        } else {
          die();
        }

    } elseif ( $type == "Disc") {

        if( isset($_POST['size']) ){
          $size = floatval(  $_POST['size']  );

          $disc = new Disc();
          $disc->setSku($sku);
          $disc->setName($name);
          $disc->setPrice($price);
          $disc->setSize($size);

          echo json_encode($disc->save());

        } else {
          die();
        }

    } elseif ( $type == "Furniture") {

        if( isset($_POST['height']) &&
         isset($_POST['width']) &&
          isset($_POST['length']) ){

            $height = floatval(  $_POST['height']  );
            $width = floatval(  $_POST['width']  );
            $length = floatval(  $_POST['length']  );

            $furniture = new Furniture();

            $furniture->setSku($sku);
            $furniture->setName($name);
            $furniture->setPrice($price);  
            $furniture->setHeight($height);
            $furniture->setWidth($width);
            $furniture->setLength($length);

            echo json_encode($furniture->save());

        } else {
          die();
        }

    }

    die();

  });


  RouteFactory::set("add",function(){

    include_once "Vendor/View/addView.php";

    die();

  });


  RouteFactory::set("list",function(){

    $products = (Product::getProducts());

    include_once "Vendor/View/listView.php";

    die();

  });


  RouteFactory::set("massdelete",function(){

    $deleted = [];

    if( !empty($_POST["skuArray"]) ){

      $skuArray = explode( ",", $_POST["skuArray"] );
      
      foreach ($skuArray as $value) {

        Product::deleteBySku($value);
        $deleted[] = $value;
      }

      echo json_encode($deleted);

    }else{

      return;

    }

    die();

  });
  RouteFactory::set("",function(){

    $products = Product::getProducts();

    include_once "Vendor/View/listView.php";

    die();
    
  });
