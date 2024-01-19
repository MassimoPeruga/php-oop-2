<?php
require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/../Traits/MoreInfo.php';

class Toy extends Product
{
    use Info;
}
