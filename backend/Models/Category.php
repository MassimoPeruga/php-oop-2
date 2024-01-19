<?php
class Category
{
    private $name;
    private $icon;

    public function __construct($_name)
    {
        $this->name = $_name;
        $this->setIcon($_name);
    }

    private function setIcon($_name)
    {
        switch ($_name) {
            case 'Cani':
                $this->icon = '<i class="fa-solid fa-dog"></i>';
                break;
            case 'Gatti':
                $this->icon = '<i class="fa-solid fa-cat"></i>';
                break;
            default:
                break;
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIcon()
    {
        return $this->icon;
    }
}
