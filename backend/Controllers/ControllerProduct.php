<?php

require_once __DIR__ . '/../Database/db.php';
require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Models/Food.php';
require_once __DIR__ . '/../Models/Toy.php';
require_once __DIR__ . '/../Models/Bed.php';
require_once __DIR__ . '/../Models/Accessory.php';

$categories = [];
$products = [];

foreach ($products_db as $product) {
    $categoryName = $product['category'];

    if (!isset($categories[$categoryName])) {
        $category = new Category($categoryName);
        $categories[$categoryName] = $category;
    }

    $category = $categories[$categoryName];

    try {
        switch ($product['type']) {
            case 'Cibo':
                $food = new Food($product['name'], $category, $product['price'], $product['image']);
                $food->setIngredients($product['ingredients']);
                $products[] = $food;
                break;
            case 'Giocattolo':
                $toy = new Toy($product['name'], $category, $product['price'], $product['image']);
                $toy->setSize($product['size']);
                $toy->setMaterials($product['materials']);
                $products[] = $toy;
                break;
            case 'Cuccia':
                $bed = new Bed($product['name'], $category, $product['price'], $product['image']);
                $bed->setSize($product['size']);
                $bed->setMaterials($product['materials']);
                $products[] = $bed;
                break;
            case 'Accessorio':
                $accessory = new Accessory($product['name'], $category, $product['price'], $product['image']);
                $accessory->setSize($product['size']);
                $accessory->setMaterials($product['materials']);
                $products[] = $accessory;
                break;
            default:
                $genericProduct = new Product($product['name'], $category, $product['price'], $product['image']);
                $products[] = $genericProduct;
                break;
        }
    } catch (Exception $e) {

        // Creazione dell'oggetto errore
        $errorData = [
            'timestamp' => date('Y-m-d H:i:s'),
            'product' => $product,
            'message' => $e->getMessage(),
        ];

        $errorLogPath = __DIR__ . '/../Logs/errors.log';
        // Leggi gli errori esistenti
        $errors = json_decode(file_get_contents($errorLogPath), true) ?? [];

        // Aggiungi il nuovo errore all'array
        $errors[] = $errorData;

        // Scrivi l'array aggiornato nel file
        file_put_contents($errorLogPath, json_encode($errors, JSON_PRETTY_PRINT));
    }
}
