<?php

namespace Vendor\Model;

use Vendor\DataBase\DatabaseFactory;

abstract class Product{

    
    /**
     * @var string
     */
    private $sku;
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $price;
    

    /**
     * Get the value of sku
     * 
     * @return string
     */ 
    public function getSku():string
    {
        return $this->sku;
    }

    /**
     * Set the value of sku
     *
     * @param  string  $sku
     *
     * @return  self
     */ 
    public function setSku(string $sku):self
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get the value of name
     * 
     * @return string
     */ 
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * 
     * @return self
     */
    public function setName(string $name):self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of price
     * 
     * @return float
     */
    public function getPrice():float
    {
        return $this->price;
    }

    
    /**
     * @param float $price
     * 
     * @return self
     */
    public function setPrice(float $price):self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return array|null
     */
    public static function getProducts():?array
    {
        try {

            $db = DatabaseFactory::getInstance();
            DatabaseFactory::setCharsetEncoding();
        
            $sqlRequest = 'SELECT * FROM Product JOIN Book ON Product.id = Book.productId WHERE Product.productType = "Book" ';
            $stm = $db->prepare($sqlRequest);        
            $stm->execute();
            $booksArray = $stm->fetchAll(\PDO::FETCH_ASSOC);
            
            
            $sqlRequest = 'SELECT * FROM Product JOIN Disc ON Product.id = Disc.productId WHERE Product.ProductType = "Disc" ';
            $stm = $db->prepare($sqlRequest);        
            $stm->execute();
            $discsArray = $stm->fetchAll(\PDO::FETCH_ASSOC);
            
            
            $sqlRequest = 'SELECT * FROM Product JOIN Furniture ON Product.id = Furniture.ProductId WHERE Product.productType = "Furniture" ';
            $stm = $db->prepare($sqlRequest);        
            $stm->execute();
            $furnituresArray = $stm->fetchAll(\PDO::FETCH_ASSOC);


            $result = array_merge($booksArray, $discsArray, $furnituresArray);
        
            return $result;
          
        } catch(\PDOException $e) {
        return $e;
        }
    }



    public static function deleteBySku(string $sku)
    {
        try {

            $db = DatabaseFactory::getInstance();
            DatabaseFactory::setCharsetEncoding();
        
            $sqlRequest = 'SELECT Product.id, Product.productType FROM Product WHERE Product.sku = :sku ';
            $stm = $db->prepare($sqlRequest);        
            $stm->execute([":sku" => $sku]);
            $product = $stm->fetch(\PDO::FETCH_ASSOC);
            
            if(!empty($product)){

                try {

                    $sqlRequest = 'DELETE FROM ' .$product["productType"]. ' WHERE ' .$product["productType"]. '.productId = :productId';
                    $stm = $db->prepare($sqlRequest);        
                    $stm->execute( [":productId" => $product["id"] ]);

                    $sqlRequest = 'DELETE FROM Product WHERE Product.sku = :sku';
                    $stm = $db->prepare($sqlRequest);        
                    $stm->execute([":sku" => $sku]);

                    return true;
                } catch(\PDOException $e) {
                    $db->rollback();
                    return $e;
                }

            }else{

                return new \Exception("The product dosn't exist", 1);

            }
          
        } catch(\PDOException $e) {
            return $e;
        }
    }
    

    
}
