<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Library Book Search System</title>

    <link rel="stylesheet" href="style.css">

</head>


<body>


<div class="library-page">


    <!-- =========================================
         HEADER
         ========================================= -->

    <header class="library-header">


        <div class="brand-section">


            <div class="book-logo">
                📚
            </div>


            <div>

                <span class="brand-tag">
                    DIGITAL LIBRARY
                </span>

                <h1>
                    Library Book Search
                </h1>

            </div>


        </div>


        <div class="library-status">

            <span class="status-dot"></span>

            LIBRARY OPEN

        </div>


    </header>



    <!-- =========================================
         MAIN CONTENT
         ========================================= -->

    <main class="library-container">


        <!-- =====================================
             INTRODUCTION
             ===================================== -->

        <section class="welcome-section">


            <div class="welcome-text">

                <span class="section-label">
                    BOOK CATALOG
                </span>


                <h2>
                    Find your next
                    <strong>great read.</strong>
                </h2>


                <p>
                    Search our collection by entering the
                    title of the book you are looking for.
                </p>

            </div>


            <div class="book-count">

                <span>
                    COLLECTION
                </span>

                <strong>
                    10
                </strong>

                <small>
                    BOOKS
                </small>

            </div>


        </section>



        <!-- =====================================
             SEARCH FORM
             ===================================== -->

        <section class="search-section">


            <div class="search-heading">

                <span>
                    BOOK SEARCH
                </span>

                <h3>
                    What would you like to read?
                </h3>

            </div>


            <form
                action="process.php"
                method="POST"
                class="search-form"
            >


                <div class="search-box">


                    <span class="search-icon">
                        🔍
                    </span>


                    <input
                        type="text"
                        name="book_title"
                        placeholder="Enter book title..."
                        autocomplete="off"
                        required
                    >


                </div>


                <button type="submit">

                    Search Book

                    <span>→</span>

                </button>


            </form>


            <p class="search-hint">
                Example: The Alchemist, Atomic Habits, Wings of Fire
            </p>


        </section>



        <!-- =====================================
             LIBRARY CATALOG
             ===================================== -->

        <section class="catalog-section">


            <div class="catalog-header">


                <div>

                    <span>
                        LIBRARY COLLECTION
                    </span>

                    <h3>
                        Available Book Catalog
                    </h3>

                </div>


                <div class="catalog-info">
                    10 TITLES
                </div>


            </div>



            <!-- =================================
                 BOOK TABLE
                 ================================= -->

            <div class="catalog-wrapper">


                <table class="book-table">


                    <thead>

                        <tr>

                            <th>
                                NO.
                            </th>

                            <th>
                                BOOK TITLE
                            </th>

                            <th>
                                AUTHOR
                            </th>

                            <th>
                                CATEGORY
                            </th>

                            <th>
                                STATUS
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <!-- BOOK 1 -->

                        <tr>

                            <td>
                                <span class="book-number">
                                    01
                                </span>
                            </td>

                            <td class="book-title">
                                The Alchemist
                            </td>

                            <td>
                                Paulo Coelho
                            </td>

                            <td>
                                Fiction
                            </td>

                            <td>
                                <span class="available">
                                    ● Available
                                </span>
                            </td>

                        </tr>


                        <!-- BOOK 2 -->

                        <tr>

                            <td>
                                <span class="book-number">
                                    02
                                </span>
                            </td>

                            <td class="book-title">
                                Atomic Habits
                            </td>

                            <td>
                                James Clear
                            </td>

                            <td>
                                Self-Help
                            </td>

                            <td>
                                <span class="available">
                                    ● Available
                                </span>
                            </td>

                        </tr>


                        <!-- BOOK 3 -->

                        <tr>

                            <td>
                                <span class="book-number">
                                    03
                                </span>
                            </td>

                            <td class="book-title">
                                Wings of Fire
                            </td>

                            <td>
                                A. P. J. Abdul Kalam
                            </td>

                            <td>
                                Biography
                            </td>

                            <td>
                                <span class="borrowed">
                                    ● Borrowed
                                </span>
                            </td>

                        </tr>


                        <!-- BOOK 4 -->

                        <tr>

                            <td>
                                <span class="book-number">
                                    04
                                </span>
                            </td>

                            <td class="book-title">
                                Rich Dad Poor Dad
                            </td>

                            <td>
                                Robert Kiyosaki
                            </td>

                            <td>
                                Finance
                            </td>

                            <td>
                                <span class="available">
                                    ● Available
                                </span>
                            </td>

                        </tr>


                        <!-- BOOK 5 -->

                        <tr>

                            <td>
                                <span class="book-number">
                                    05
                                </span>
                            </td>

                            <td class="book-title">
                                The Power of Now
                            </td>

                            <td>
                                Eckhart Tolle
                            </td>

                            <td>
                                Spirituality
                            </td>

                            <td>
                                <span class="borrowed">
                                    ● Borrowed
                                </span>
                            </td>

                        </tr>


                        <!-- BOOK 6 -->

                        <tr>

                            <td>
                                <span class="book-number">
                                    06
                                </span>
                            </td>

                            <td class="book-title">
                                Ikigai
                            </td>

                            <td>
                                Hector Garcia
                            </td>

                            <td>
                                Lifestyle
                            </td>

                            <td>
                                <span class="available">
                                    ● Available
                                </span>
                            </td>

                        </tr>


                        <!-- BOOK 7 -->

                        <tr>

                            <td>
                                <span class="book-number">
                                    07
                                </span>
                            </td>

                            <td class="book-title">
                                The Psychology of Money
                            </td>

                            <td>
                                Morgan Housel
                            </td>

                            <td>
                                Finance
                            </td>

                            <td>
                                <span class="available">
                                    ● Available
                                </span>
                            </td>

                        </tr>


                        <!-- BOOK 8 -->

                        <tr>

                            <td>
                                <span class="book-number">
                                    08
                                </span>
                            </td>

                            <td class="book-title">
                                Harry Potter
                            </td>

                            <td>
                                J. K. Rowling
                            </td>

                            <td>
                                Fantasy
                            </td>

                            <td>
                                <span class="borrowed">
                                    ● Borrowed
                                </span>
                            </td>

                        </tr>


                        <!-- BOOK 9 -->

                        <tr>

                            <td>
                                <span class="book-number">
                                    09
                                </span>
                            </td>

                            <td class="book-title">
                                Think and Grow Rich
                            </td>

                            <td>
                                Napoleon Hill
                            </td>

                            <td>
                                Motivation
                            </td>

                            <td>
                                <span class="available">
                                    ● Available
                                </span>
                            </td>

                        </tr>


                        <!-- BOOK 10 -->

                        <tr>

                            <td>
                                <span class="book-number">
                                    10
                                </span>
                            </td>

                            <td class="book-title">
                                The Great Gatsby
                            </td>

                            <td>
                                F. Scott Fitzgerald
                            </td>

                            <td>
                                Classic
                            </td>

                            <td>
                                <span class="available">
                                    ● Available
                                </span>
                            </td>

                        </tr>


                    </tbody>

                </table>


            </div>


        </section>



        <!-- =====================================
             ARRAY FUNCTION NOTE
             ===================================== -->

        <section class="technical-note">


            <div class="note-icon">
                PHP
            </div>


            <div>

                <strong>
                    Array-Based Book Search
                </strong>

                <p>
                    Book records are stored using PHP arrays
                    and searched using appropriate array
                    functions to determine availability.
                </p>

            </div>


        </section>



        <!-- =====================================
             FOOTER
             ===================================== -->

        <footer>

            <span>
                PHP PRACTICAL
            </span>

            <i>•</i>

            Library Book Search System

            <i>•</i>

            Array Functions

        </footer>


    </main>


</div>


</body>

</html>