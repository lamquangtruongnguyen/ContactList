<?php
// Redirect to home page when cookie expires
if (!isset($_COOKIE['MYCOOKIE'])) {
    header("Location: ../index.php");
    exit;
}
// user are using cookie
echo '<h5 style="position: absolute;">Hello, ' . $_COOKIE['MYCOOKIE'] . '!</h5>';?>
<?php
try {
    include '../helpers/config.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT "
            . "id, "
            . "first_name, "
            . "last_name, "
            . "nickname, "
            . "title, "
            . "occupation, "
            . "phone_number_1_type, "
            . "phone_number_1, "
            . "phone_number_2_type, "
            . "phone_number_2, "
            . "email, "
            . "street_address, "
            . "suite_apt_number, "
            . "zip_code, "
            . "city, "
            . "state, "
            . "description, "
            . "photo_attachment "
            . "FROM lists WHERE id=:id");
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Contact</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
              rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
              crossorigin="anonymous">
        <link href='../css/style.css' rel='stylesheet'>
        <style>
            /*overide background image in style.css*/
            body {
                background-image: url(https://plus.unsplash.com/premium_photo-1661477577453-2736f4c0acf6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8c2hpbnl8ZW58MHx8MHx8&auto=format&fit=crop&w=800&q=60);
            }
            img {
                width: 25%;
            }
        </style>
    </head>
    <body>
        <!-- sizing the page and set background color, opacity and x axis padding
             set position to make it stay in the center-->
        <div class='container text-bg-danger bg-opacity-75 px-0
             position-absolute top-50 start-50 translate-middle w-50'>
            <!-- Header styling, alignment, background color
            , margin bottom, padding left and vertical padding-->
            <h1 class='h1 text-left text-light bg-success mb-0 ps-4 py-3'>View Contact</h1>
            <?php
            // Display all information associated with the id
            if (isset($_GET['id'])) {
                // Utilize flex container to include image and information
                echo "<div class='d-flex align-items-center p-4'>";
                echo "<img class='img-fluid mx-5' src='" . $result[0]["photo_attachment"] . "'>";
                echo "<div class='mx-5 fs-4'>";
                echo $result[0]["title"];
                echo "<br>";
                echo $result[0]["first_name"] . " " . $result[0]["last_name"] . " (" . $result[0]["nickname"] . ")";
                echo "<br>";
                echo $result[0]["occupation"];
                echo "<br>";
                echo $result[0]["phone_number_1"] . " <i>(" . $result[0]["phone_number_1_type"] . ")</i>";
                echo "<br>";
                echo $result[0]["phone_number_2"] . " <i>(" . $result[0]["phone_number_2_type"] . ")</i>";
                echo "<br>";
                echo $result[0]["email"];
                echo "<br>";
                echo $result[0]["street_address"] . " " . $result[0]["suite_apt_number"];
                echo "<br>";
                echo $result[0]["city"] . "," . $result[0]["state"] . " " . $result[0]["zip_code"];
                echo "<br>";
                echo $result[0]["description"];
                echo "</div>";
                echo "</div>";
            }
            ?>
            <!-- 2 buttons for directing to view page and edit page -->
            <!-- Styling of 2 buttons, make them be on the right-->
            <div class="text-end">
                <!-- Modify display from block to inline -->
                <form class="d-inline" name="edit_contacts" action="./edit.php" method="POST">
                    <!-- Hidden input (id currently viewing its info) -->
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                    <input class="btn btn-success mb-4 mx-4 fs-4" type="submit" value="Edit Contact">
                </form>
                <?php
                echo "<button class='btn btn-success mb-4 mx-4 fs-4' "
                . "onclick='window.location.href=\"list.php\"'>Contacts List</button>";
                ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
        crossorigin="anonymous"></script>
    </body>
</html>
