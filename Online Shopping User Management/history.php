<?php

session_start();


if (!isset($_SESSION["logged_in"])) {

    header("Location: index.php");

    exit();

}


$username = $_SESSION["username"];

$cart = $_SESSION["cart"];


/*
    Clear cart
*/

if (isset($_GET["clear"])) {

    $_SESSION["cart"] = [];

    header("Location: cart.php");

    exit();

}


/*
    Calculate total
*/

$total = 0;

foreach ($cart as $item) {

    $total += $item["price"];

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Your Cart | LumaCart</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="inner-page">


    <nav class="shop-nav">

        <div class="logo">

            <div class="logo-box">L</div>

            <div>
                <strong>LumaCart</strong>
                <small>SHOP • SAVE • SMILE</small>
            </div>

        </div>


        <div class="nav-links">

            <a href="shop.php">
                Shop
            </a>

            <a href="history.php">
                History
            </a>

            <a class="active" href="cart.php">
                Cart
            </a>

            <a href="logout.php">
                Logout
            </a>

        </div>

    </nav>


    <main class="content">

        <div class="page-heading">

            <span>
                YOUR BAG
            </span>

            <h1>
                Shopping cart
            </h1>

            <p>
                Products saved in your current session.
            </p>

        </div>


        <?php if (empty($cart)): ?>

            <div class="empty-box">

                <div>
                    🛒
                </div>

                <h2>
                    Your cart is empty
                </h2>

                <p>
                    Discover something you love and add it here.
                </p>

                <a href="shop.php">
                    Start Shopping →
                </a>

            </div>


        <?php else: ?>


            <div class="cart-layout">


                <section class="cart-items">

                    <?php foreach ($cart as $item): ?>

                        <div class="cart-item">

                            <div class="cart-product-icon">
                                <?php
                                echo $item["emoji"];
                                ?>
                            </div>

                            <div class="cart-product-details">

                                <span>
                                    <?php
                                    echo $item["category"];
                                    ?>
                                </span>

                                <h3>
                                    <?php
                                    echo $item["name"];
                                    ?>
                                </h3>

                            </div>

                            <strong>
                                ₹<?php
                                echo number_format(
                                    $item["price"]
                                );
                                ?>
                            </strong>

                        </div>

                    <?php endforeach; ?>

                </section>


                <aside class="summary">

                    <span>
                        ORDER SUMMARY
                    </span>

                    <h2>
                        Your cart
                    </h2>

                    <div class="summary-line">

                        <span>
                            Items
                        </span>

                        <strong>
                            <?php
                            echo count($cart);
                            ?>
                        </strong>

                    </div>

                    <div class="summary-line">

                        <span>
                            Total
                        </span>

                        <strong>
                            ₹<?php
                            echo number_format($total);
                            ?>
                        </strong>

                    </div>

                    <button>
                        Checkout →
                    </button>

                    <a href="?clear=1">
                        Clear Cart
                    </a>

                </aside>


            </div>


        <?php endif; ?>


    </main>

</div>

</body>

</html>