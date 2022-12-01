<?php
if (!isset($_COOKIE['MYCOOKIE'])) {
    header("Location: ../index.php");
    exit;
}
// user are using cookie
echo '<h5 style="position: absolute;">Hello, ' . $_COOKIE['MYCOOKIE'] . '!</h5>';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>List Contacts</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
              rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
              crossorigin="anonymous">
        <link href='../css/style.css' rel='stylesheet'>
        <style>
            img {
                width: 15%;
            }
        </style>
    </head>
    <body>
        <!-- sizing the page and set background color and x axis padding-->
        <div class="container text-bg-light px-0 w-50">
            <!-- Navigation bar (flex container), adjust padding for x and y axes -->
            <nav class = "bg-primary d-flex justify-content-between py-4 px-5">
                <h1 class="mb-0 text-light">List Contacts</h1>
                <?php
                // Button to direct to add.php page
                echo "<button class='btn btn-info fs-4' "
                . "onclick='window.location.href=\"add.php\"'>+ Add Contact</button>";
                ?>
            </nav>
            <?php
            // Include file containing database credentials
            include '../helpers/config.php';
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT "
                        . "id, "
                        . "first_name, "
                        . "last_name, "
                        . "photo_attachment "
                        . "FROM lists ORDER by first_name");
                $stmt->execute();

                // set the resulting array to associative
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                // create table with color and alternating opacity 
                echo "<table class='table table-info table-striped'>";
                echo "<tbody>";
                // loop through each element of the array
                // create new row containing some info and image
                // as well as a button to direct to view profile page
                foreach ($result as $value) {
                    echo "<tr>";
                    echo "<td id='$value[id]'>";
                    echo "<img class='img-fluid ms-5 py-2' src=' $value[photo_attachment] '>";
                    echo "<p class='h3 d-inline-block ms-5'> $value[first_name] $value[last_name] </p>";
                    echo "<button class='h1 btn btn-secondary ms-5 fs-4' "
                    . "onclick='window.location.href=\"view.php?id=$value[id]\"'>View</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
        crossorigin="anonymous"></script>
    </body>
</html>
