<?php

namespace Vendor\Model;
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
}
