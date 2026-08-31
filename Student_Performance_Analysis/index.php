<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Performance Analysis</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="header">
        <div class="icon">🎓</div>
        <div>
            <h1>Student Performance Analysis</h1>
            <p>Semester Mark Analysis using Multidimensional Arrays</p>
        </div>
    </div>

    <div class="box">

        <h2>Enter Student Marks</h2>
        <p class="description">
            Enter marks for three students in each subject.
        </p>

        <form action="process.php" method="POST">

            <div class="table-container">

                <table>

                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Python</th>
                            <th>DBMS</th>
                            <th>Java</th>
                            <th>Computer Networks</th>
                            <th>Mathematics</th>
                        </tr>
                    </thead>

                    <tbody>

                        <!-- Student 1 -->
                        <tr>
                            <td>
                                <input type="text"
                                       name="students[0][name]"
                                       placeholder="Student 1"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[0][marks][Python]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[0][marks][DBMS]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[0][marks][Java]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[0][marks][Computer Networks]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[0][marks][Mathematics]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>
                        </tr>


                        <!-- Student 2 -->
                        <tr>
                            <td>
                                <input type="text"
                                       name="students[1][name]"
                                       placeholder="Student 2"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[1][marks][Python]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[1][marks][DBMS]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[1][marks][Java]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[1][marks][Computer Networks]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[1][marks][Mathematics]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>
                        </tr>


                        <!-- Student 3 -->
                        <tr>
                            <td>
                                <input type="text"
                                       name="students[2][name]"
                                       placeholder="Student 3"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[2][marks][Python]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[2][marks][DBMS]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[2][marks][Java]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[2][marks][Computer Networks]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="students[2][marks][Mathematics]"
                                       min="0"
                                       max="100"
                                       placeholder="0-100"
                                       required>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

            <button type="submit">
                Analyze Performance →
            </button>

        </form>

    </div>

    <div class="footer">
        PHP Practical &nbsp;•&nbsp; Multidimensional Arrays
    </div>

</div>

</body>
</html>