<?php
require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/../Traits/MoreInfo.php';

class Accessory extends Product
{
    use Info;
}
