<?php

namespace Vendor\Model;

use PDOException;
use Vendor\DataBase\DatabaseFactory;
use Vendor\Model\Product;

class Book extends Product{

    private $weight;
    

    /**
     * Get the value of weight
     */ 
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @return  self
     */ 
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }
    

    /**
     * @return array|null|PDOException
     */
    public function save():?array
    {
        try {

            $db = DatabaseFactory::getInstance();
            DatabaseFactory::setCharsetEncoding();
        
            $sqlRequest = 'INSERT INTO `Product` (`id`, `sku`, `name`, `price`, `productType`) VALUES (NULL, :sku, :name, :price, :productType);';
            $stm = $db->prepare($sqlRequest);
            
            $stm->execute([":sku" => $this->getSku(), ":name" => $this->getName(), ":price" => $this->getPrice(), ":productType" => "Book"]);
            $productId = intval($db->lastInsertId());            ;
            

            $sqlRequest = 'INSERT INTO `Book` (`id`, `weight`, `productId`) VALUES (NULL, :bookWeight, :productId);';
            $stm = $db->prepare($sqlRequest);        
            
            $stm->execute([":bookWeight" => $this->getWeight(), ":productId" => $productId]);
            $bookId = intval($db->lastInsertId());
            
            
            return ["productId" => $productId, "bookId" => $bookId];
          
        } catch(\PDOException $e) {
            return $e;
        }
    }




}
