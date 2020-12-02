<?php

session_start();

include 'pdo/connection.php';
include 'pdo/pdo_helper.php';

$logged_in = false;
$db = [];

if (isset($_SESSION['name'])) {

    $logged_in = true;
    $status = false;

    if (isset($_SESSION['status'])) {
        $status = htmlentities($_SESSION['status']);
        $status_color = htmlentities($_SESSION['color']);

        unset($_SESSION['status']);
        unset($_SESSION['color']);
    }

    try {
        $pdo = pdoHelper();

        $all_db = $pdo->query("SELECT * FROM dbtype");

        while ($row = $all_db->fetch(PDO::FETCH_OBJ)) {
            $db[] = $row;
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Assam Police Database</title>

    <?php include 'pdo/headers.php'; ?>
    <link rel="stylesheet" href="pdo/style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container" id="ind">
        <h1>Welcome to Police Inventory Management System for COVID-19 Crisis</h1>
        <?php if (!$logged_in) : ?>
            <img src="pdo/pic.png" alt="Assam Police Logo"><br>
            <p id="info"></p>
            <script src="pdo/script.js"></script>
            <p id="log">
                <a href="login.php">Please log in</a>
            </p>

        <?php else : ?>
            <div class="container h-100" id="login">
                <img src="pdo/pic.png" alt=" Police Logo"><br>
                <p id="login"></p>
                <script src="pdo/script.js"></script>
            </div>
            <?php
            if ($status !== false) {
                // Look closely at the use of single and double quotes
                echo ('<p style="color: ' . $status_color . ';" class="col-sm-10">' .
                    $status .
                    "</p>\n");
            }
            ?>

            <?php if (empty($db)) : ?>
                <p>No rows found</p>
            <?php else : ?>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Index</th>
                                    <th>Name</th>
                                    <th>Headline</th>
                                    <th>Summary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($db as $dbtype) : ?>
                                    <tr>
                                        <td><?php echo $dbtype->db_id ?></td>
                                        <?php
                                        if ($dbtype->db_id == 1) { ?>
                                            <td><a href="viewcrime.php">
                                                    <?php echo $dbtype->name ?></a></td>
                                        <?php
                                        } elseif ($dbtype->db_id == 2) { ?>
                                            <td><a href="cont.php">
                                                    <?php echo $dbtype->name ?></a></td>
                                        <?php
                                        } elseif ($dbtype->db_id == 3) { ?>
                                            <td><a href="pat.php">
                                                    <?php echo $dbtype->name ?></a></td>
                                        <?php
                                        } elseif ($dbtype->db_id == 4) { ?>
                                            <td><a href="hosp.php">
                                                    <?php echo $dbtype->name ?></a></td>
                                        <?php
                                        } ?>
                                        <td><?php echo $dbtype->headline ?></td>
                                        <td><?php echo $dbtype->summary ?></td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
            <br><br><br><br>
            <p id="log">
                <a href="logout.php">Logout</a>
            </p>
        <?php endif; ?>
        <h1>8591 - 8597 - 8602</h1>

    </div>
</body>

</html>