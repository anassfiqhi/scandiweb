<?php

namespace Vendor\Model;

use Vendor\DataBase\DatabaseFactory;
use Vendor\Model\Product;

class Furniture extends Product{

    private $height;
    private $width;
    private $length;
    

    /**
     * Get the value of length
     */ 
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set the value of length
     *
     * @return  self
     */ 
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get the value of width
     */ 
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the value of width
     *
     * @return  self
     */ 
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get the value of height
     */ 
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set the value of height
     *
     * @return  self
     */ 
    public function setHeight($height)
    {
        $this->height = $height;

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
            
            $stm->execute([":sku" => $this->getSku(), ":name" => $this->getName(), ":price" => $this->getPrice(), ":productType" => "Furniture"]);
            $productId = intval($db->lastInsertId());   
            
        

            $sqlRequest = 'INSERT INTO `Furniture` (`id`, `height`, `width`, `length`, `productId`) VALUES (NULL, :height, :width, :length, :productId);';
            $stm = $db->prepare($sqlRequest);        
            
            $stm->execute([":height"  => $this->getHeight(), ":width"  => $this->getWidth(), ":length"  => $this->getLength(), ":productId" => $productId]);
            $furnitureId = intval($db->lastInsertId());
            
            
            return ["productId" => $productId, "furnitureId" => $furnitureId];
          
        } catch(\PDOException $e) {
            return $e;
        }
    }



}
