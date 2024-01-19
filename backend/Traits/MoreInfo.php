<?php

trait Info
{
    protected $size;
    protected $materials;

    //Setters
    public function setSize($_size)
    {
        $this->size = $_size;
    }

    public function setMaterials($_materials)
    {
        $this->materials = $_materials;
    }

    //Getters
    public function getSize()
    {
        return $this->size;
    }

    public function getMaterials()
    {
        return $this->materials;
    }
}
