
<?php
require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

try {
    $response = $client->get('https://dummyjson.com/products');

    $data = json_decode($response->getBody(), true);

    if (!empty($data['products'])) {
        
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Product List</title>
            <link rel="stylesheet" href="styles.css">
        </head>

        <body>
            <ul class="product-list">
                <?php foreach ($data['products'] as $product) : ?>
                    <li class="product-item">
                        <img src="<?php echo $product['thumbnail']; ?>" alt="<?php echo $product['title']; ?>">
                        <h2><?php echo $product['title']; ?></h2>
                        <p><?php echo $product['description']; ?></p>
                        <p>$<?php echo $product['price']; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </body>

        </html>
        <?php
    } else {
        echo 'Aucun produit disponible.';
    }
} catch (Exception $e) {
    echo 'Erreur: ' . $e->getMessage();
}
?>
