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

    $stmt = $conn->prepare("SELECT id, "
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
    $stmt->bindParam(':id', $_POST['id']);
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
        <title>Edit Contact</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
              rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
              crossorigin="anonymous">
        <link href='../css/style.css' rel='stylesheet'>
    </head>
    <body>
        <!-- sizing the page and change x axis padding -->
        <div class="container px-0 w-50">
            <div class="text-bg-light">
                <!-- Navigation bar (flex container) with header and a button to redirect to contact list page -->
                <nav class="text-bg-primary d-flex justify-content-between py-3 px-5">
                    <h1 class="h1 mb-0 py-0 text-light">Edit Contact</h1>
                    <!-- Styling bootstrap button, detecting on click event -->
                    <?php echo "<button class='btn btn-success fs-4' "
                    . "onclick='window.location.href=\"list.php\"'>Contacts List</button>"; ?>
                </nav>
                <!-- Form containing previously filled out info, ready to be edited,
                will redirect to save page after submission-->
                <!-- Using bootstrap column to make form more neat with 2 columns
                utilizing form-control from bootstrap for styling input element-->
                <form class="row p-4 m-0" name="edit_contacts" action="./save.php" method="POST">
                    <div class="col-6">
                        <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
                        First Name: <input class="form-control" name="first_name" type="text" value="<?php echo $result[0]["first_name"] ?>"><br>
                        Last Name: <input class="form-control" name="last_name" type="text" value="<?php echo $result[0]["last_name"] ?>"><br>
                        Nickname: <input class="form-control" name="nickname" type="text" value="<?php echo $result[0]["nickname"] ?>"><br>
                        Title: <input class="form-control" name="title" type="text" value="<?php echo $result[0]["title"] ?>"><br>
                        Occupation: <input class="form-control" name="occupation" type="text" value="<?php echo $result[0]["occupation"] ?>"><br>
                        Phone Number 1 Type: <input class="form-control" name="phone_number_1_type" type="text" value="<?php echo $result[0]["phone_number_1_type"] ?>"><br>
                        Phone Number 1: <input class="form-control" name="phone_number_1" type="text" value="<?php echo $result[0]["phone_number_1"] ?>"><br>
                        Phone Number 2 Type: <input class="form-control" name="phone_number_2_type" type="text" value="<?php echo $result[0]["phone_number_2_type"] ?>"><br>
                        Phone Number 2: <input class="form-control" name="phone_number_2" type="text" value="<?php echo $result[0]["phone_number_2"] ?>"><br>
                    </div>
                    <div class="col-6">
                        Email: <input class="form-control" name="email" type="text" value="<?php echo $result[0]["email"] ?>"><br>
                        Street Address: <input class="form-control" name="street_address" type="text" value="<?php echo $result[0]["street_address"] ?>"><br>
                        Suite/Apt Number: <input class="form-control" name="suite_apt_number" type="text" value="<?php echo $result[0]["suite_apt_number"] ?>"><br>
                        City: <input class="form-control" name="city" type="text" value="<?php echo $result[0]["city"] ?>"><br>
                        State: <input class="form-control" name="state" type="text" value="<?php echo $result[0]["state"] ?>"><br>
                        Zip Code: <input class="form-control" name="zip_code" type="text" value="<?php echo $result[0]["zip_code"] ?>"><br>
                        Description: <input class="form-control" name="description" type="text" value="<?php echo $result[0]["description"] ?>"><br>
                        Change Photo Attachment:  <input class="form-control" name="photo_attachment" type="url" value="<?php echo $result[0]["photo_attachment"] ?>"><br>
                        <div class="text-center"><input class="btn btn-info fs-4 mt-3" type="submit" value="Save Contact"></div>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
        crossorigin="anonymous"></script>
    </body>
</html>
