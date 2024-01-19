<?php

require_once __DIR__ . '/Category.php';

class Product
{
    private $name;
    private $category;
    private $price;
    private $image;

    public function __construct(string $_name, Category $_category, float $_price, string $_image)
    {
        if ($_price <= 0) {
            throw new Exception('Il prezzo deve essere maggiore di zero.');
        }

        $this->name = $_name;
        $this->category = $_category;
        $this->price = $_price;
        $this->image = $_image;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getType()
    {
        return get_class($this);
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getImage()
    {
        return $this->image;
    }
}
