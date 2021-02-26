<?php

namespace Vendor\Model;

use Vendor\DataBase\DatabaseFactory;
use Vendor\Model\Product;

class Disc extends Product{
 
    private $size;
    
    

    /**
     * Get the value of size
     */ 
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set the value of size
     *
     * @return  self
     */ 
    public function setSize($size)
    {
        $this->size = $size;

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
            
            $stm->execute([":sku" => $this->getSku(), ":name" => $this->getName(), ":price" => $this->getPrice(), ":productType" => "Disc"]);
            $productId = intval($db->lastInsertId());            ;
            

            $sqlRequest = 'INSERT INTO `Disc` (`id`, `size`, `productId`) VALUES (NULL, :discSize, :productId);';
            $stm = $db->prepare($sqlRequest);        
            
            $stm->execute([":discSize" => $this->getSize(), ":productId" => $productId]);
            $discId = intval($db->lastInsertId());
            
            
            return ["productId" => $productId, "discId" => $discId];
          
        } catch(\PDOException $e) {
            return $e;
        }
    }

    
}
