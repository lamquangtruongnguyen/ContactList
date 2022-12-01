<?php
// Redirect to home page when cookie expires
if (!isset($_COOKIE['MYCOOKIE'])) {
    header("Location: ../index.php");
    exit;
}
// user are using cookie
echo '<h5 style="position: absolute;">Hello, ' . $_COOKIE['MYCOOKIE'] . '!</h5>';?>
<?php
if (isset($_POST['first_name'])) {
    try {
        // Include file containing database credentials
        include '../helpers/config.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt = $conn->prepare("
            INSERT INTO lists (
                first_name, 
                last_name, 
                nickname, 
                title,
                occupation,
                phone_number_1_type, 
                phone_number_1, 
                phone_number_2_type, 
                phone_number_2,
                email,
                street_address, 
                suite_apt_number, 
                zip_code, 
                city, 
                state, 
                description, 
                photo_attachment)
            
            VALUES (
                :first_name, 
                :last_name, 
                :nickname, 
                :title,
                :occupation,
                :phone_number_1_type, 
                :phone_number_1, 
                :phone_number_2_type, 
                :phone_number_2,
                :email,
                :street_address, 
                :suite_apt_number, 
                :zip_code, 
                :city, 
                :state, 
                :description, 
                :photo_attachment)");

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

        // insert a row
        $stmt->execute();
        // Outputting alert banner stating successful contact addition
        echo "<div class='alert alert-success text-center' "
        . "role='alert'>New contact added successfully</div>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Contact</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
              rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
              crossorigin="anonymous">
        <link href='../css/style.css' rel='stylesheet'>
    </head>
    <body>
        <!-- sizing the page and set background color and x axis padding-->
        <div class="container w-50">
            <!-- navigation bar including header and button 
            a flex container with space between elements in cross axis
            adjusting padding horizontally and vertically-->
            <nav class="bg-primary d-flex justify-content-between px-5 py-3">
                <h1 class="h1 mb-0 text-light">Add Contact</h1>
                <?php echo "<button class='btn btn-success fs-4' "
                . "onclick='window.location.href=\"list.php\"'>Contacts List</button>";
                ?>
            </nav>
            <main class="text-bg-light">
                <form class="row p-3 m-0 p-4" name="add_contacts" action="./add.php" method="POST">
                    <div class="col-6">
                        First Name: <input class="form-control" name="first_name" type="text"><br>
                        Last Name: <input class="form-control" name="last_name" type="text"><br>
                        Nickname: <input class="form-control" name="nickname" type="text"><br>
                        Title: <input class="form-control" name="title" type="text"><br>
                        Occupation: <input class="form-control" name="occupation" type="text"><br>
                        Phone Number 1 Type: <input class="form-control" name="phone_number_1_type" type="text"><br>
                        Phone Number 1: <input class="form-control" name="phone_number_1" type="text"><br>
                        Phone Number 2 Type: <input class="form-control" name="phone_number_2_type" type="text"><br>
                        Phone Number 2: <input class="form-control" name="phone_number_2" type="text"><br>
                    </div>
                    <div class="col-6">
                        Email: <input class="form-control" name="email" type="email"><br>
                        Street Address: <input class="form-control" name="street_address" type="text"><br>
                        Suite/Apt Number: <input class="form-control" name="suite_apt_number" type="text"><br>
                        City: <input class="form-control" name="city" type="text"><br>
                        State: <input class="form-control" name="state" type="text"><br>
                        Zip Code: <input class="form-control" name="zip_code" type="text"><br>
                        Description: <input class="form-control" name="description" type="text"><br>
                        Photo Attachment: <input class="form-control" name="photo_attachment" type="url"><br>
                        <div class="text-center">
                            <input class="btn btn-info fs-4 mt-3" type="submit" value="Add Contact">
                        </div>
                    </div>
                </form>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
            crossorigin="anonymous"></script>
        </div>
    </body>
</html>
