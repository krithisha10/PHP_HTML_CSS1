<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Product Sorting Application</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>


<div class="page">


    <!-- =========================================
         HEADER
         ========================================= -->

    <header class="header">

        <div class="brand">

            <div class="brand-icon">
                🛍️
            </div>

            <div>

                <span class="eyebrow">
                    PRODUCT MANAGEMENT
                </span>

                <h1>
                    Product Sorting
                </h1>

            </div>

        </div>


        <div class="header-badge">

            <span class="badge-dot"></span>

            ARRAY SORTING

        </div>

    </header>



    <!-- =========================================
         MAIN CONTAINER
         ========================================= -->

    <main class="container">


        <!-- =====================================
             HERO
             ===================================== -->

        <section class="hero">

            <div class="hero-text">

                <span class="hero-tag">
                    PRICE ORGANIZER
                </span>

                <h2>
                    Arrange products by
                    <span>price.</span>
                </h2>

                <p>
                    Enter product details and select a sorting
                    method to organize your products according
                    to their price.
                </p>

            </div>


            <div class="hero-visual">

                <div class="floating-card card-one">
                    ₹499
                </div>

                <div class="floating-card card-two">
                    ₹1,299
                </div>

                <div class="floating-card card-three">
                    ₹799
                </div>

                <div class="sort-symbol">
                    ⇅
                </div>

            </div>

        </section>



        <!-- =====================================
             PRODUCT FORM
             ===================================== -->

        <form action="process.php"
              method="POST">


            <section class="product-panel">


                <!-- PANEL HEADER -->

                <div class="panel-header">

                    <div>

                        <span>
                            PRODUCT DETAILS
                        </span>

                        <h2>
                            Add Products
                        </h2>

                    </div>


                    <div class="product-count">
                        04
                    </div>

                </div>



                <!-- =================================
                     PRODUCT 1
                     ================================= -->

                <div class="product-row">

                    <div class="product-number">
                        01
                    </div>


                    <div class="product-info">

                        <label>
                            PRODUCT NAME
                        </label>

                        <input
                            type="text"
                            name="products[0][name]"
                            placeholder="Example: Wireless Headphones"
                            required
                        >

                    </div>


                    <div class="product-price">

                        <label>
                            PRICE (₹)
                        </label>

                        <input
                            type="number"
                            name="products[0][price]"
                            placeholder="0.00"
                            min="0"
                            step="0.01"
                            required
                        >

                    </div>

                </div>



                <!-- =================================
                     PRODUCT 2
                     ================================= -->

                <div class="product-row">

                    <div class="product-number">
                        02
                    </div>


                    <div class="product-info">

                        <label>
                            PRODUCT NAME
                        </label>

                        <input
                            type="text"
                            name="products[1][name]"
                            placeholder="Example: Smart Watch"
                            required
                        >

                    </div>


                    <div class="product-price">

                        <label>
                            PRICE (₹)
                        </label>

                        <input
                            type="number"
                            name="products[1][price]"
                            placeholder="0.00"
                            min="0"
                            step="0.01"
                            required
                        >

                    </div>

                </div>



                <!-- =================================
                     PRODUCT 3
                     ================================= -->

                <div class="product-row">

                    <div class="product-number">
                        03
                    </div>


                    <div class="product-info">

                        <label>
                            PRODUCT NAME
                        </label>

                        <input
                            type="text"
                            name="products[2][name]"
                            placeholder="Example: Bluetooth Speaker"
                            required
                        >

                    </div>


                    <div class="product-price">

                        <label>
                            PRICE (₹)
                        </label>

                        <input
                            type="number"
                            name="products[2][price]"
                            placeholder="0.00"
                            min="0"
                            step="0.01"
                            required
                        >

                    </div>

                </div>



                <!-- =================================
                     PRODUCT 4
                     ================================= -->

                <div class="product-row">

                    <div class="product-number">
                        04
                    </div>


                    <div class="product-info">

                        <label>
                            PRODUCT NAME
                        </label>

                        <input
                            type="text"
                            name="products[3][name]"
                            placeholder="Example: Laptop Backpack"
                            required
                        >

                    </div>


                    <div class="product-price">

                        <label>
                            PRICE (₹)
                        </label>

                        <input
                            type="number"
                            name="products[3][price]"
                            placeholder="0.00"
                            min="0"
                            step="0.01"
                            required
                        >

                    </div>

                </div>



                <!-- =================================
                     SORTING OPTIONS
                     ================================= -->

                <div class="sorting-section">

                    <div class="sorting-title">

                        <span>
                            SORTING METHOD
                        </span>

                        <h3>
                            How should products be arranged?
                        </h3>

                    </div>


                    <div class="sort-options">


                        <label class="sort-option">

                            <input
                                type="radio"
                                name="sort_order"
                                value="asc"
                                checked
                            >

                            <div class="sort-box">

                                <div class="sort-icon green">
                                    ↑
                                </div>

                                <div>

                                    <strong>
                                        Low to High
                                    </strong>

                                    <small>
                                        Lowest price first
                                    </small>

                                </div>

                            </div>

                        </label>



                        <label class="sort-option">

                            <input
                                type="radio"
                                name="sort_order"
                                value="desc"
                            >

                            <div class="sort-box">

                                <div class="sort-icon orange">
                                    ↓
                                </div>

                                <div>

                                    <strong>
                                        High to Low
                                    </strong>

                                    <small>
                                        Highest price first
                                    </small>

                                </div>

                            </div>

                        </label>


                    </div>

                </div>



                <!-- =================================
                     SUBMIT AREA
                     ================================= -->

                <div class="submit-area">

                    <div class="function-note">

                        <span>
                            PHP
                        </span>

                        <p>
                            Uses array sorting functions
                        </p>

                    </div>


                    <button type="submit">

                        Sort Products

                        <span>
                            →
                        </span>

                    </button>

                </div>


            </section>


        </form>



        <!-- =====================================
             CONCEPT CARDS
             ===================================== -->

        <section class="concept-section">

            <div class="section-title">

                <span>
                    CONCEPT USED
                </span>

                <h2>
                    Array-Based Product Analysis
                </h2>

            </div>


            <div class="concept-grid">


                <!-- ARRAY -->

                <div class="concept-card purple">

                    <div class="concept-icon">
                        []
                    </div>

                    <h3>
                        Arrays
                    </h3>

                    <p>
                        Product names and prices are stored
                        using PHP arrays.
                    </p>

                </div>



                <!-- SORT -->

                <div class="concept-card blue">

                    <div class="concept-icon">
                        ↕
                    </div>

                    <h3>
                        Sorting
                    </h3>

                    <p>
                        Products are arranged according to
                        their price values.
                    </p>

                </div>



                <!-- OUTPUT -->

                <div class="concept-card green">

                    <div class="concept-icon">
                        ✓
                    </div>

                    <h3>
                        Sorted Output
                    </h3>

                    <p>
                        The final product list is displayed
                        in the selected order.
                    </p>

                </div>


            </div>

        </section>



        <!-- =====================================
             FOOTER
             ===================================== -->

        <footer>

            PHP PRACTICAL

            <span>•</span>

            PRODUCT SORTING

            <span>•</span>

            ARRAY FUNCTIONS

        </footer>


    </main>


</div>


</body>

</html>