<?php

class Product
{
    public $products = [];

    public function __construct()
    {
        $this->products = [
            ["id"=>1,"name"=>"Mobile","price"=>15000,"img"=>"images/mobile.jpeg"],
            ["id"=>2,"name"=>"Laptop","price"=>55000,"img"=>"images/laptop.jpeg"],
            ["id"=>3,"name"=>"Watch","price"=>5000,"img"=>"images/watch.jpeg"]
            
        ];

        if (empty($this->products)) {
            throw new Exception("No products available");
        }
    }

    public function getProducts()
    {
        return $this->products;
    }
}
?>
