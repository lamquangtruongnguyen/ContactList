<?php
session_start();
// Set cookie name, value, expiry time and domain ./ available to other pages
// after form submitted
if (isset($_POST['submit'])) {
    setcookie("MYCOOKIE", $_POST['username'], time() + 120, '/');
    header("location: ../sub-pages/list.php");
}
