<?php
// Redirect to home page when cookie expires
if (!isset($_COOKIE['MYCOOKIE'])) {
    header("Location: ../index.php");
    exit;
}
// user are using cookie
echo '<h5 style="position: absolute;">Hello, ' . $_COOKIE['MYCOOKIE'] . '!</h5>';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Save Contact</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
              rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
              crossorigin="anonymous">
        <link href='../css/style.css' rel='stylesheet'>
        <style>
            /*overide background image in style.css*/
            body {
                background-image: url(https://images.unsplash.com/photo-1635948173049-18964cdaae7f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fHNjZW5lcnklMjBicmlnaHR8ZW58MHx8MHx8&auto=format&fit=crop&w=800&q=60);
            }
        </style>
    </head>
    <body>
        <!-- sizing the page and set background color, opacity and x axis padding
             set position to make it stay in the center-->
        <div class="container bg-light position-absolute top-50 start-50 translate-middle w-50 p-3">
            <h1>Save Contact</h1>
            <?php
            include '../helpers/config.php';
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("UPDATE lists"
                        . " SET first_name = :first_name, "
                        . "last_name = :last_name, "
                        . "nickname = :nickname, "
                        . "title = :title, "
                        . "occupation = :occupation, "
                        . "phone_number_1_type = :phone_number_1_type, "
                        . "phone_number_1 = :phone_number_1, "
                        . "phone_number_2_type = :phone_number_2_type, "
                        . "phone_number_2 = :phone_number_2, "
                        . "email = :email, "
                        . "street_address = :street_address, "
                        . "suite_apt_number = :suite_apt_number, "
                        . "zip_code = :zip_code, "
                        . "city = :city, "
                        . "state = :state, "
                        . "description = :description, photo_attachment = :photo_attachment WHERE id=:id");
                $stmt->bindParam(':id', $_POST['id']);
                $stmt->bindParam(':first_name', $_POST['first_name']);
                $stmt->bindParam(':last_name', $_POST['last_name']);
                $stmt->bindParam(':nickname', $_POST['nickname']);
                $stmt->bindParam(':title', $_POST['title']);
                $stmt->bindParam(':occupation', $_POST['occupation']);
                $stmt->bindParam(':phone_number_1_type', $_POST['phone_number_1_type']);
                $stmt->bindParam(':phone_number_1', $_POST['phone_number_1']);
                $stmt->bindParam(':phone_number_2_type', $_POST['phone_number_2_type']);
                $stmt->bindParam(':phone_number_2', $_POST['phone_number_2']);
                $stmt->bindParam(':email', $_POST['email']);
                $stmt->bindParam(':street_address', $_POST['street_address']);
                $stmt->bindParam(':suite_apt_number', $_POST['suite_apt_number']);
                $stmt->bindParam(':zip_code', $_POST['zip_code']);
                $stmt->bindParam(':city', $_POST['city']);
                $stmt->bindParam(':state', $_POST['state']);
                $stmt->bindParam(':description', $_POST['description']);
                $stmt->bindParam(':photo_attachment', $_POST['photo_attachment']);
                $stmt->execute();

                // insert a row
                $stmt->execute();
                // Output message after succefully edit, change font size
                echo "<p class='fs-3 text-center'>Contact saved successfully</p>";
                // 2 buttons redirecting to view corresponding to the current id or contact list page
                echo "<div class = 'text-end'>";
                echo "<button class='btn btn-success mx-4 fs-4' "
                . "onclick='window.location.href=\"view.php?id=" . $_POST['id'] . "\"'>View</button>";
                echo "<button class='btn btn-success mx-4 fs-4' "
                . "onclick='window.location.href=\"list.php\"'>Contacts List</button>";
                echo "</div>";
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
