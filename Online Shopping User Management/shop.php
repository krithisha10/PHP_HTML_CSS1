<?php

session_start();


/*
    Check login status
*/

if (!isset($_SESSION["logged_in"])) {

    header("Location: index.php");

    exit();

}


$username = $_SESSION["username"];


/*
    Product data
*/

$products = [

    1 => [
        "name" => "Cloud Sneakers",
        "price" => 1899,
        "category" => "Fashion",
        "emoji" => "👟"
    ],

    2 => [
        "name" => "Aura Headphones",
        "price" => 2499,
        "category" => "Electronics",
        "emoji" => "🎧"
    ],

    3 => [
        "name" => "Luna Backpack",
        "price" => 1599,
        "category" => "Accessories",
        "emoji" => "🎒"
    ],

    4 => [
        "name" => "Glow Watch",
        "price" => 3299,
        "category" => "Accessories",
        "emoji" => "⌚"
    ],

    5 => [
        "name" => "Cozy Hoodie",
        "price" => 1299,
        "category" => "Fashion",
        "emoji" => "🧥"
    ],

    6 => [
        "name" => "Mini Speaker",
        "price" => 1799,
        "category" => "Electronics",
        "emoji" => "🔊"
    ]

];


/*
    Add product to cart
*/

if (isset($_GET["add"])) {

    $id = (int) $_GET["add"];

    if (isset($products[$id])) {

        $_SESSION["cart"][] = $products[$id];

        /*
            Add product to browsing history
        */

        $_SESSION["history"][] = $products[$id];

    }

    header("Location: shop.php");

    exit();

}


/*
    Count cart
*/

$cart_count = count($_SESSION["cart"]);


/*
    Count browsing history
*/

$history_count = count($_SESSION["history"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>LumaCart | Shop</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>

<div class="shop-page">


    <!-- NAVBAR -->

    <nav class="shop-nav">

        <div class="logo">

            <div class="logo-box">
                L
            </div>

            <div>
                <strong>LumaCart</strong>
                <small>SHOP • SAVE • SMILE</small>
            </div>

        </div>


        <div class="nav-links">

            <a class="active" href="shop.php">
                Shop
            </a>

            <a href="history.php">
                History
                <span>
                    <?php echo $history_count; ?>
                </span>
            </a>

            <a href="cart.php">
                Cart
                <span>
                    <?php echo $cart_count; ?>
                </span>
            </a>

            <a href="logout.php">
                Logout
            </a>

        </div>


        <div class="user-chip">

            <div class="user-avatar">
                <?php
                echo strtoupper(
                    substr($username, 0, 1)
                );
                ?>
            </div>

            <span>
                <?php
                echo htmlspecialchars($username);
                ?>
            </span>

        </div>

    </nav>


    <!-- HERO -->

    <section class="shop-hero">

        <div>

            <span>
                CURATED FOR YOU
            </span>

            <h1>
                Hey <?php
                echo htmlspecialchars($username);
                ?>,
                <br>
                find something <em>lovely.</em>
            </h1>

            <p>
                Explore our handpicked collection
                and build your perfect cart.
            </p>

        </div>

        <div class="hero-art">
            🛍️
        </div>

    </section>


    <!-- PRODUCTS -->

    <main class="products-section">

        <div class="section-heading">

            <div>

                <span>
                    TRENDING NOW
                </span>

                <h2>
                    Popular picks
                </h2>

            </div>

            <p>
                <?php echo count($products); ?>
                products available
            </p>

        </div>


        <div class="product-grid">


            <?php foreach ($products as $id => $product): ?>

                <article class="product-card">

                    <div class="product-image">

                        <span class="category">
                            <?php
                            echo $product["category"];
                            ?>
                        </span>

                        <div class="product-emoji">
                            <?php
                            echo $product["emoji"];
                            ?>
                        </div>

                    </div>


                    <div class="product-info">

                        <h3>
                            <?php
                            echo $product["name"];
                            ?>
                        </h3>

                        <div class="product-bottom">

                            <strong>
                                ₹<?php
                                echo number_format(
                                    $product["price"]
                                );
                                ?>
                            </strong>

                            <a href="?add=<?php echo $id; ?>">
                                + Add
                            </a>

                        </div>

                    </div>

                </article>

            <?php endforeach; ?>


        </div>

    </main>


</div>

</body>

</html>