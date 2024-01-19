<?php
require_once __DIR__ . '/../backend/Controllers/ControllerProduct.php';
// start debug

// foreach ($products as $productData) {
//     print_r($productData);
//     echo '<hr/>';
// };
// die

// end debug
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Shop</title>
    <!-- bootsrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- /bootsrap -->
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- /fontawesome -->
    <!-- il mio foglio di stile -->
    <link rel="stylesheet" href="style.css">
    <!-- /il mio foglio di stile -->
</head>

<body>

    <header>
        <div class="container p-2 mb-4">
            <h1>Animal Shop</h1>
        </div>
    </header>

    <main class="container">
        <ul class="row row-cols-5 g-3 list-unstyled">
            <?php foreach ($products as $productData) : ?>
                <li class="col">
                    <div class="card text-center h-100 ms_card">
                        <img src="./img/<?= $productData->getImage() ?>" alt="<?= $productData->getName() ?>" class="card-img-top">
                        <div class="card-body">
                            <h5><?= $productData->getName(); ?></h5>
                            <p>
                                <span class="badge ms_badge text-bg-<?= $productData->getCategory()->getName() === 'Cani' ? 'primary' : 'danger' ?>">
                                    <?= $productData->getCategory()->getIcon(); ?>
                                </span>

                                <span class="badge 
                                <?= [
                                    'Food' => 'text-bg-success',
                                    'Toy' => 'text-bg-warning',
                                    'Accessory' => 'text-bg-info',
                                ][$productData->getType()] ?? 'text-bg-secondary' ?>">
                                    <?= match ($productData->getType()) {
                                        'Food' => 'Cibo',
                                        'Toy' => 'Giocattolo',
                                        'Bed' => 'Cuccia',
                                        'Accessory' => 'Accessorio',
                                        default => 'Prodotto',
                                    } ?>
                                </span>

                                <span> &bull; </span>
                                <strong class=""><?= $productData->getPrice(); ?>&euro;</strong>
                            </p>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>

</body>

</html>