<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Branch-wise Sales Analysis</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="page-container">

    <!-- HEADER -->
    <header class="main-header">

        <div class="brand-icon">₹</div>

        <div>
            <h1>Branch-wise Sales Analysis</h1>

            <p>
                Compare branch performance and generate a consolidated sales report
            </p>
        </div>

    </header>


    <!-- INTRO -->
    <section class="intro">

        <span class="small-title">SALES MANAGEMENT</span>

        <h2>Enter Branch Sales</h2>

        <p>
            Enter the sales amount for each product across the three branches.
        </p>

    </section>


    <!-- FORM -->
    <form action="process.php" method="POST">

        <div class="branch-container">


            <!-- BRANCH 1 -->
            <div class="branch-card">

                <div class="card-top">

                    <span class="branch-number">01</span>

                    <span class="branch-label">
                        BRANCH
                    </span>

                </div>

                <h3>Branch 01</h3>

                <div class="field">

                    <label>Branch Name</label>

                    <input
                        type="text"
                        name="branches[0][name]"
                        placeholder="Eg. Coimbatore"
                        required
                    >

                </div>


                <div class="sales-fields">

                    <div class="field">

                        <label>Laptop</label>

                        <div class="money-input">
                            <span>₹</span>

                            <input
                                type="number"
                                name="branches[0][sales][Laptop]"
                                placeholder="0"
                                min="0"
                                required
                            >
                        </div>

                    </div>


                    <div class="field">

                        <label>Mobile</label>

                        <div class="money-input">
                            <span>₹</span>

                            <input
                                type="number"
                                name="branches[0][sales][Mobile]"
                                placeholder="0"
                                min="0"
                                required
                            >
                        </div>

                    </div>


                    <div class="field">

                        <label>Tablet</label>

                        <div class="money-input">
                            <span>₹</span>

                            <input
                                type="number"
                                name="branches[0][sales][Tablet]"
                                placeholder="0"
                                min="0"
                                required
                            >
                        </div>

                    </div>


                    <div class="field">

                        <label>Headphones</label>

                        <div class="money-input">
                            <span>₹</span>

                            <input
                                type="number"
                                name="branches[0][sales][Headphones]"
                                placeholder="0"
                                min="0"
                                required
                            >
                        </div>

                    </div>

                </div>

            </div>


            <!-- BRANCH 2 -->
            <div class="branch-card">

                <div class="card-top">

                    <span class="branch-number">02</span>

                    <span class="branch-label">
                        BRANCH
                    </span>

                </div>

                <h3>Branch 02</h3>

                <div class="field">

                    <label>Branch Name</label>

                    <input
                        type="text"
                        name="branches[1][name]"
                        placeholder="Eg. Chennai"
                        required
                    >

                </div>


                <div class="sales-fields">

                    <div class="field">

                        <label>Laptop</label>

                        <div class="money-input">
                            <span>₹</span>

                            <input
                                type="number"
                                name="branches[1][sales][Laptop]"
                                placeholder="0"
                                min="0"
                                required
                            >
                        </div>

                    </div>


                    <div class="field">

                        <label>Mobile</label>

                        <div class="money-input">
                            <span>₹</span>

                            <input
                                type="number"
                                name="branches[1][sales][Mobile]"
                                placeholder="0"
                                min="0"
                                required
                            >
                        </div>

                    </div>


                    <div class="field">

                        <label>Tablet</label>

                        <div class="money-input">
                            <span>₹</span>

                            <input
                                type="number"
                                name="branches[1][sales][Tablet]"
                                placeholder="0"
                                min="0"
                                required
                            >
                        </div>

                    </div>


                    <div class="field">

                        <label>Headphones</label>

                        <div class="money-input">
                            <span>₹</span>

                            <input
                                type="number"
                                name="branches[1][sales][Headphones]"
                                placeholder="0"
                                min="0"
                                required
                            >
                        </div>

                    </div>

                </div>

            </div>


            <!-- BRANCH 3 -->
            <div class="branch-card">

                <div class="card-top">

                    <span class="branch-number">03</span>

                    <span class="branch-label">
                        BRANCH
                    </span>

                </div>

                <h3>Branch 03</h3>

                <div class="field">

                    <label>Branch Name</label>

                    <input
                        type="text"
                        name="branches[2][name]"
                        placeholder="Eg. Madurai"
                        required
                    >

                </div>


                <div class="sales-fields">

                    <div class="field">

                        <label>Laptop</label>

                        <div class="money-input">
                            <span>₹</span>

                            <input
                                type="number"
                                name="branches[2][sales][Laptop]"
                                placeholder="0"
                                min="0"
                                required
                            >
                        </div>

                    </div>


                    <div class="field">

                        <label>Mobile</label>

                        <div class="money-input">
                            <span>₹</span>

                            <input
                                type="number"
                                name="branches[2][sales][Mobile]"
                                placeholder="0"
                                min="0"
                                required
                            >
                        </div>

                    </div>


                    <div class="field">

                        <label>Tablet</label>

                        <div class="money-input">
                            <span>₹</span>

                            <input
                                type="number"
                                name="branches[2][sales][Tablet]"
                                placeholder="0"
                                min="0"
                                required
                            >
                        </div>

                    </div>


                    <div class="field">

                        <label>Headphones</label>

                        <div class="money-input">
                            <span>₹</span>

                            <input
                                type="number"
                                name="branches[2][sales][Headphones]"
                                placeholder="0"
                                min="0"
                                required
                            >
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- BUTTON -->
        <div class="action-area">

            <button type="submit">
                Analyze Sales
                <span>→</span>
            </button>

            <p>
                Multidimensional Array Analysis
            </p>

        </div>

    </form>


    <!-- FOOTER -->
    <footer>
        PHP Practical &nbsp;•&nbsp; Branch-wise Sales Analysis
    </footer>

</div>

</body>
</html>