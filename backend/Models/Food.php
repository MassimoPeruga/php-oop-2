<?php
require_once __DIR__ . '/Product.php';

class Food extends Product
{
    private $ingredients;

    public function setIngredients($_ingredients)
    {
        $this->ingredients = $_ingredients;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }
}
