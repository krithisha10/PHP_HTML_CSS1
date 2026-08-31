<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Browser History Manager</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="browser-page">

    <!-- TOP BROWSER BAR -->

    <div class="browser-bar">

        <div class="window-controls">

            <span class="close"></span>
            <span class="minimize"></span>
            <span class="maximize"></span>

        </div>


        <div class="browser-tab">

            <span class="tab-icon">🌐</span>

            <span>
                Browser History
            </span>

            <span class="tab-close">
                ×
            </span>

        </div>

    </div>


    <!-- NAVIGATION BAR -->

    <div class="navigation">

        <div class="nav-buttons">

            <span>←</span>
            <span>→</span>
            <span>↻</span>

        </div>


        <div class="address-bar">

            <span class="lock">
                🔒
            </span>

            <span>
                browser://history
            </span>

        </div>


        <div class="menu">
            ⋮
        </div>

    </div>


    <!-- MAIN CONTENT -->

    <main>

        <section class="heading">

            <div>

                <span class="small-title">
                    BROWSING ACTIVITY
                </span>

                <h1>
                    Browser History
                </h1>

                <p>
                    Manage recently visited pages using stack operations.
                </p>

            </div>


            <div class="stack-badge">

                <strong>
                    STACK
                </strong>

                <span>
                    LIFO
                </span>

            </div>

        </section>


        <!-- INPUT CARD -->

        <section class="input-card">

            <div class="card-heading">

                <div class="heading-icon">
                    🔗
                </div>

                <div>

                    <h2>
                        Add Visited Pages
                    </h2>

                    <p>
                        Enter the pages you recently visited.
                    </p>

                </div>

            </div>


            <form action="process.php" method="POST">


                <div class="history-inputs">


                    <!-- PAGE 1 -->

                    <div class="input-item">

                        <span class="number">
                            01
                        </span>

                        <input
                            type="text"
                            name="pages[]"
                            placeholder="https://example.com"
                            required
                        >

                    </div>


                    <!-- PAGE 2 -->

                    <div class="input-item">

                        <span class="number">
                            02
                        </span>

                        <input
                            type="text"
                            name="pages[]"
                            placeholder="https://example.com"
                            required
                        >

                    </div>


                    <!-- PAGE 3 -->

                    <div class="input-item">

                        <span class="number">
                            03
                        </span>

                        <input
                            type="text"
                            name="pages[]"
                            placeholder="https://example.com"
                            required
                        >

                    </div>


                    <!-- PAGE 4 -->

                    <div class="input-item">

                        <span class="number">
                            04
                        </span>

                        <input
                            type="text"
                            name="pages[]"
                            placeholder="https://example.com"
                            required
                        >

                    </div>


                    <!-- PAGE 5 -->

                    <div class="input-item">

                        <span class="number">
                            05
                        </span>

                        <input
                            type="text"
                            name="pages[]"
                            placeholder="https://example.com"
                            required
                        >

                    </div>


                </div>


                <div class="submit-area">

                    <button type="submit">

                        View Browser History

                        <span>→</span>

                    </button>

                    <p>
                        PHP Arrays • Stack Operations • LIFO
                    </p>

                </div>


            </form>

        </section>


        <!-- INFORMATION -->

        <section class="info-section">


            <div class="info-card purple">

                <div class="info-icon">
                    ⬆
                </div>

                <div>

                    <strong>
                        Push
                    </strong>

                    <p>
                        New pages are added to the top of the stack.
                    </p>

                </div>

            </div>


            <div class="info-card blue">

                <div class="info-icon">
                    ↓
                </div>

                <div>

                    <strong>
                        Pop
                    </strong>

                    <p>
                        The most recently visited page is processed first.
                    </p>

                </div>

            </div>


            <div class="info-card green">

                <div class="info-icon">
                    ✓
                </div>

                <div>

                    <strong>
                        LIFO
                    </strong>

                    <p>
                        Last In, First Out controls browser history.
                    </p>

                </div>

            </div>


        </section>


    </main>


    <!-- FOOTER -->

    <footer>

        PHP Practical • Browser History Using Stack

    </footer>


</div>

</body>

</html>