<?php

/* =========================================
   LIBRARY BOOK DATA
   ========================================= */

$books = [

    [
        "title" => "The Alchemist",
        "author" => "Paulo Coelho",
        "category" => "Fiction",
        "status" => "Available"
    ],

    [
        "title" => "Atomic Habits",
        "author" => "James Clear",
        "category" => "Self-Help",
        "status" => "Available"
    ],

    [
        "title" => "Wings of Fire",
        "author" => "A. P. J. Abdul Kalam",
        "category" => "Biography",
        "status" => "Borrowed"
    ],

    [
        "title" => "Rich Dad Poor Dad",
        "author" => "Robert Kiyosaki",
        "category" => "Finance",
        "status" => "Available"
    ],

    [
        "title" => "The Power of Now",
        "author" => "Eckhart Tolle",
        "category" => "Spirituality",
        "status" => "Borrowed"
    ],

    [
        "title" => "Ikigai",
        "author" => "Hector Garcia",
        "category" => "Lifestyle",
        "status" => "Available"
    ],

    [
        "title" => "The Psychology of Money",
        "author" => "Morgan Housel",
        "category" => "Finance",
        "status" => "Available"
    ],

    [
        "title" => "Harry Potter",
        "author" => "J. K. Rowling",
        "category" => "Fantasy",
        "status" => "Borrowed"
    ],

    [
        "title" => "Think and Grow Rich",
        "author" => "Napoleon Hill",
        "category" => "Motivation",
        "status" => "Available"
    ],

    [
        "title" => "The Great Gatsby",
        "author" => "F. Scott Fitzgerald",
        "category" => "Classic",
        "status" => "Available"
    ]

];


/* =========================================
   TOTAL BOOKS
   ========================================= */

$totalBooks = count($books);


/* =========================================
   GET SEARCH INPUT
   ========================================= */

$searchTitle = trim(
    $_POST['book_title'] ?? ''
);


/* =========================================
   SEARCH RESULT
   ========================================= */

$searchResults = [];


if ($searchTitle !== '') {

    /*
     * array_filter() is used to search
     * the book array.
     */

    $searchResults = array_filter(
        $books,
        function ($book) use ($searchTitle) {

            return strcasecmp(
                $book['title'],
                $searchTitle
            ) === 0;

        }
    );

}


/* =========================================
   DETERMINE RESULT
   ========================================= */

$bookFound = !empty($searchResults);

$selectedBook = null;


if ($bookFound) {

    /*
     * reset array index and get
     * the first matching book.
     */

    $searchResults = array_values(
        $searchResults
    );

    $selectedBook = $searchResults[0];

}


/* =========================================
   COUNT AVAILABLE BOOKS
   ========================================= */

$availableBooks = count(
    array_filter(
        $books,
        function ($book) {

            return $book['status'] === 'Available';

        }
    )
);


/* =========================================
   COUNT BORROWED BOOKS
   ========================================= */

$borrowedBooks = count(
    array_filter(
        $books,
        function ($book) {

            return $book['status'] === 'Borrowed';

        }
    )
);

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Search Result - Library
    </title>

    <link rel="stylesheet" href="style.css">


    <style>

        /* =========================================
           RESULT HERO
           ========================================= */

        .result-hero {

            background: #f0ece3;

            border: 1px solid #e1dbd0;

            border-radius: 13px;

            padding: 22px 24px;

            margin-bottom: 16px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

        }


        .result-hero span {

            display: block;

            font-size: 6px;

            color: #8b7657;

            letter-spacing: 1.3px;

            font-weight: bold;

            margin-bottom: 6px;

        }


        .result-hero h2 {

            font-size: 23px;

            color: #42433d;

            margin-bottom: 6px;

        }


        .result-hero p {

            font-size: 7px;

            color: #929089;

        }


        .search-again {

            text-decoration: none;

            padding: 10px 15px;

            border-radius: 7px;

            background: #897254;

            color: white;

            font-size: 7px;

            font-weight: bold;

        }


        .search-again:hover {

            background: #725e43;

        }


        /* =========================================
           SEARCHED BOOK
           ========================================= */

        .searched-book {

            background: #fffdf9;

            border: 1px solid #e2ddd4;

            border-radius: 13px;

            padding: 21px;

            margin-bottom: 16px;

        }


        .searched-title {

            margin-bottom: 14px;

        }


        .searched-title span {

            display: block;

            font-size: 6px;

            color: #8b7657;

            letter-spacing: 1.3px;

            font-weight: bold;

            margin-bottom: 5px;

        }


        .searched-title h3 {

            font-size: 15px;

            color: #484941;

        }


        /* =========================================
           BOOK DETAILS
           ========================================= */

        .book-details {

            display: grid;

            grid-template-columns:
                1.4fr 1fr 1fr 1fr;

            gap: 9px;

        }


        .detail-box {

            padding: 14px;

            background: #f8f5ef;

            border: 1px solid #e3ded4;

            border-radius: 9px;

        }


        .detail-box span {

            display: block;

            font-size: 5px;

            color: #98958d;

            letter-spacing: .8px;

            font-weight: bold;

            margin-bottom: 7px;

        }


        .detail-box strong {

            font-size: 9px;

            color: #55564f;

        }


        /* =========================================
           AVAILABILITY
           ========================================= */

        .availability-box {

            margin-top: 12px;

            padding: 15px;

            border-radius: 9px;

            display: flex;

            align-items: center;

            gap: 11px;

        }


        .availability-box.available-box {

            background: #edf5ee;

            border: 1px solid #dbe8dc;

        }


        .availability-box.borrowed-box {

            background: #f8eee7;

            border: 1px solid #eaded4;

        }


        .availability-icon {

            width: 34px;

            height: 34px;

            border-radius: 8px;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 13px;

        }


        .available-box .availability-icon {

            color: #66836b;

        }


        .borrowed-box .availability-icon {

            color: #9b7660;

        }


        .availability-box strong {

            display: block;

            font-size: 9px;

            margin-bottom: 4px;

        }


        .available-box strong {

            color: #5f7964;

        }


        .borrowed-box strong {

            color: #906d59;

        }


        .availability-box p {

            font-size: 6px;

            color: #97958e;

        }


        /* =========================================
           NOT FOUND
           ========================================= */

        .not-found {

            background: #fff7ec;

            border: 1px solid #ecdfcd;

            border-radius: 13px;

            padding: 27px;

            text-align: center;

            margin-bottom: 16px;

        }


        .not-found-icon {

            width: 44px;

            height: 44px;

            margin: 0 auto 11px;

            border-radius: 50%;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #a07d58;

            font-size: 17px;

        }


        .not-found h3 {

            font-size: 15px;

            color: #77634e;

            margin-bottom: 6px;

        }


        .not-found p {

            font-size: 7px;

            color: #a09487;

            line-height: 1.6;

        }


        .not-found strong {

            color: #846b52;

        }


        /* =========================================
           STATISTICS
           ========================================= */

        .library-statistics {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 9px;

            margin-bottom: 16px;

        }


        .stat-box {

            background: #fffdf9;

            border: 1px solid #e2ddd4;

            border-radius: 10px;

            padding: 14px;

        }


        .stat-box span {

            display: block;

            font-size: 5px;

            color: #98958e;

            letter-spacing: .8px;

            font-weight: bold;

            margin-bottom: 7px;

        }


        .stat-box strong {

            font-size: 19px;

            color: #897254;

        }


        /* =========================================
           RESPONSIVE
           ========================================= */

        @media (max-width: 750px) {

            .book-details {

                grid-template-columns:
                    repeat(2, 1fr);

            }


            .result-hero {

                align-items: flex-start;

                flex-direction: column;

            }


            .search-again {

                display: inline-block;

            }

        }


        @media (max-width: 550px) {

            .book-details {

                grid-template-columns: 1fr;

            }


            .library-statistics {

                grid-template-columns: 1fr;

            }


            .searched-book {

                padding: 15px;

            }

        }

    </style>

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

            SEARCH COMPLETE

        </div>


    </header>



    <!-- =========================================
         MAIN
         ========================================= -->

    <main class="library-container">


        <!-- =====================================
             RESULT HEADER
             ===================================== -->

        <section class="result-hero">


            <div>

                <span>
                    SEARCH RESULT
                </span>


                <h2>

                    <?php

                    if ($bookFound) {

                        echo "Book Found";

                    } else {

                        echo "Book Not Found";

                    }

                    ?>

                </h2>


                <p>

                    Requested title:

                    <strong>

                        <?php

                        echo htmlspecialchars(
                            $searchTitle
                        );

                        ?>

                    </strong>

                </p>

            </div>


            <a
                href="index.php"
                class="search-again"
            >

                ← Search Another Book

            </a>


        </section>



        <?php if ($bookFound): ?>


            <!-- =================================
                 BOOK DETAILS
                 ================================= -->

            <section class="searched-book">


                <div class="searched-title">

                    <span>
                        BOOK INFORMATION
                    </span>

                    <h3>
                        Requested Book Details
                    </h3>

                </div>


                <div class="book-details">


                    <div class="detail-box">

                        <span>
                            BOOK TITLE
                        </span>

                        <strong>

                            <?php

                            echo htmlspecialchars(
                                $selectedBook['title']
                            );

                            ?>

                        </strong>

                    </div>


                    <div class="detail-box">

                        <span>
                            AUTHOR
                        </span>

                        <strong>

                            <?php

                            echo htmlspecialchars(
                                $selectedBook['author']
                            );

                            ?>

                        </strong>

                    </div>


                    <div class="detail-box">

                        <span>
                            CATEGORY
                        </span>

                        <strong>

                            <?php

                            echo htmlspecialchars(
                                $selectedBook['category']
                            );

                            ?>

                        </strong>

                    </div>


                    <div class="detail-box">

                        <span>
                            LIBRARY STATUS
                        </span>

                        <strong>

                            <?php

                            echo htmlspecialchars(
                                $selectedBook['status']
                            );

                            ?>

                        </strong>

                    </div>


                </div>



                <!-- =================================
                     AVAILABILITY
                     ================================= -->

                <?php if (
                    $selectedBook['status']
                    === 'Available'
                ): ?>


                    <div
                        class="availability-box
                               available-box"
                    >

                        <div class="availability-icon">
                            ✓
                        </div>


                        <div>

                            <strong>
                                Book is Available
                            </strong>

                            <p>
                                This book is currently available
                                for borrowing from the library.
                            </p>

                        </div>

                    </div>


                <?php else: ?>


                    <div
                        class="availability-box
                               borrowed-box"
                    >

                        <div class="availability-icon">
                            !
                        </div>


                        <div>

                            <strong>
                                Book is Currently Borrowed
                            </strong>

                            <p>
                                This book is not currently available.
                                Please check again later.
                            </p>

                        </div>

                    </div>


                <?php endif; ?>


            </section>


        <?php else: ?>


            <!-- =================================
                 BOOK NOT FOUND
                 ================================= -->

            <section class="not-found">


                <div class="not-found-icon">
                    🔍
                </div>


                <h3>
                    Book Not Found
                </h3>


                <p>

                    We could not find a book titled

                    <strong>
                        "<?php
                        echo htmlspecialchars(
                            $searchTitle
                        );
                        ?>"
                    </strong>

                    in our library collection.

                    <br>

                    Please check the title and try again.

                </p>


            </section>


        <?php endif; ?>



        <!-- =====================================
             LIBRARY STATISTICS
             ===================================== -->

        <section class="library-statistics">


            <div class="stat-box">

                <span>
                    TOTAL BOOKS
                </span>

                <strong>
                    <?php
                    echo $totalBooks;
                    ?>
                </strong>

            </div>


            <div class="stat-box">

                <span>
                    AVAILABLE BOOKS
                </span>

                <strong>
                    <?php
                    echo $availableBooks;
                    ?>
                </strong>

            </div>


            <div class="stat-box">

                <span>
                    BORROWED BOOKS
                </span>

                <strong>
                    <?php
                    echo $borrowedBooks;
                    ?>
                </strong>

            </div>


        </section>



        <!-- =====================================
             TECHNICAL INFORMATION
             ===================================== -->

        <section class="technical-note">


            <div class="note-icon">
                PHP
            </div>


            <div>

                <strong>
                    Array Search Completed
                </strong>

                <p>
                    The requested title was searched using
                    PHP array functions and the availability
                    status was determined from the stored
                    book records.
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