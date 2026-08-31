<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Customer Support Queue</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">


    <!-- HEADER -->

    <header class="header">

        <div class="brand">

            <div class="brand-icon">
                🎧
            </div>

            <div>

                <span class="label">
                    CUSTOMER SERVICE
                </span>

                <h1>
                    Support Queue
                </h1>

                <p>
                    First-In-First-Out request management
                </p>

            </div>

        </div>


        <div class="queue-badge">
            FIFO QUEUE
        </div>

    </header>



    <!-- INTRO -->

    <section class="intro">

        <div>

            <span>
                SUPPORT DESK
            </span>

            <h2>
                Manage Customer Requests
            </h2>

            <p>
                Enter incoming customer service requests.
                Requests are processed in the order they arrive.
            </p>

        </div>


        <div class="intro-icon">
            ⇢
        </div>

    </section>



    <!-- REQUEST FORM -->

    <section class="request-section">

        <div class="section-heading">

            <div>

                <span>
                    NEW REQUESTS
                </span>

                <h2>
                    Add Customer Requests
                </h2>

            </div>

            <div class="fifo-note">
                First Request → First Processed
            </div>

        </div>


        <form action="process.php" method="POST">


            <div class="request-grid">


                <!-- REQUEST 1 -->

                <div class="request-card">

                    <div class="card-top">

                        <span>
                            REQUEST 01
                        </span>

                        <div class="request-icon">
                            👤
                        </div>

                    </div>


                    <label>
                        CUSTOMER NAME
                    </label>

                    <input
                        type="text"
                        name="requests[0][name]"
                        placeholder="Enter customer name"
                        required
                    >


                    <label>
                        SERVICE REQUEST
                    </label>

                    <input
                        type="text"
                        name="requests[0][issue]"
                        placeholder="Enter support request"
                        required
                    >

                </div>



                <!-- REQUEST 2 -->

                <div class="request-card">

                    <div class="card-top">

                        <span>
                            REQUEST 02
                        </span>

                        <div class="request-icon">
                            💬
                        </div>

                    </div>


                    <label>
                        CUSTOMER NAME
                    </label>

                    <input
                        type="text"
                        name="requests[1][name]"
                        placeholder="Enter customer name"
                        required
                    >


                    <label>
                        SERVICE REQUEST
                    </label>

                    <input
                        type="text"
                        name="requests[1][issue]"
                        placeholder="Enter support request"
                        required
                    >

                </div>



                <!-- REQUEST 3 -->

                <div class="request-card">

                    <div class="card-top">

                        <span>
                            REQUEST 03
                        </span>

                        <div class="request-icon">
                            🛠️
                        </div>

                    </div>


                    <label>
                        CUSTOMER NAME
                    </label>

                    <input
                        type="text"
                        name="requests[2][name]"
                        placeholder="Enter customer name"
                        required
                    >


                    <label>
                        SERVICE REQUEST
                    </label>

                    <input
                        type="text"
                        name="requests[2][issue]"
                        placeholder="Enter support request"
                        required
                    >

                </div>



                <!-- REQUEST 4 -->

                <div class="request-card">

                    <div class="card-top">

                        <span>
                            REQUEST 04
                        </span>

                        <div class="request-icon">
                            📦
                        </div>

                    </div>


                    <label>
                        CUSTOMER NAME
                    </label>

                    <input
                        type="text"
                        name="requests[3][name]"
                        placeholder="Enter customer name"
                        required
                    >


                    <label>
                        SERVICE REQUEST
                    </label>

                    <input
                        type="text"
                        name="requests[3][issue]"
                        placeholder="Enter support request"
                        required
                    >

                </div>


            </div>



            <!-- FIFO INFORMATION -->

            <div class="fifo-box">

                <div class="fifo-symbol">
                    1 → 2 → 3 → 4
                </div>

                <div>

                    <strong>
                        FIFO Processing
                    </strong>

                    <p>
                        The first customer request added to the queue
                        will be the first request processed.
                    </p>

                </div>

            </div>



            <!-- BUTTON -->

            <div class="button-area">

                <button type="submit">

                    Process Support Queue
                    <span>→</span>

                </button>

                <p>
                    PHP Arrays • array_push() • array_shift() • FIFO
                </p>

            </div>


        </form>

    </section>



    <!-- FOOTER -->

    <footer>

        PHP Practical • Customer Support Queue System

    </footer>


</div>

</body>

</html>