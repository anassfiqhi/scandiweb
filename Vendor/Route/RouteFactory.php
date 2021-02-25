<?php

namespace Vendor\Route;

class RouteFactory{

    public static $validRoutes = [];

    /**
     * @param string $route
     * @param mixed $function
     * 
     * @return void
     */
    public static function set(string $route, $function){
        
        $url = isset($_GET["route"])?trim($_GET["route"],"/"):"";
        $param = isset($_GET["sku"]) ? $_GET["sku"] : null;
        // echo "checking /".$route."<br/>";

        self::$validRoutes[] = $route;
        if($route == ""){
            $function->__invoke();
            return;
        }else{
            if($url == $route){
                $function->__invoke($param);
            }
        }
    }

}
