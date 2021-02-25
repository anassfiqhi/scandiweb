<?php

use Vendor\Model\Book;
use Vendor\Model\Furniture;
use Vendor\Model\Product;
use Vendor\Route\RouteFactory;

spl_autoload_register(function($class) {
    include_once str_replace('\\', '/', $class) . '.php';
});

  RouteFactory::set("product",function($sku){

    echo "Product sku = ".$sku;

    die();

  });


  RouteFactory::set("add",function(){

    include_once "Vendor/View/addView.php";

    die();
    
    $book = new Book();

    $book->setSku("BKENGGRAMRHHHHH");
    $book->setName("ENGLISH GRAMMAR");
    $book->setPrice(15);  
    $book->setWeight(.8);

    echo json_encode($book->save());
    
    // $furniture = new Furniture();

    // $furniture->setSku("FRNTR001");
    // $furniture->setName("Family Size Table");
    // $furniture->setPrice(150);  
    // $furniture->setWidth(2);
    // $furniture->setLength(3);
    // $furniture->setHeight(1.2);

    // echo json_encode($furniture->save());

    die();

  });


  RouteFactory::set("list",function(){

    $products = (Product::getProducts());

    include_once "Vendor/View/listView.php";

    die();

  });


  RouteFactory::set("delete",function($sku){

    echo "delete Route ".$sku;

    die();

  });


  RouteFactory::set("getsingleproduct",function($sku){

    echo "Single product Route ".$sku;

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

    include_once "Vendor/View/ListView.php";

    die();
    
  });
