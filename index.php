<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
$client = new Client();
$response = $client->get('https://dummyjson.com/data');

$data = json_decode($response->getBody(), true);

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
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <h2><?php echo $product['name']; ?></h2>
                <p><?php echo $product['description']; ?></p>
                <p>$<?php echo $product['price']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>
