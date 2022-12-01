<html>
    <head>
        <meta charset="UTF-8">
        <title>Save Contact</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
              rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
              crossorigin="anonymous">
        <link href="../css/style.css" rel="stylesheet">
        <style>
            /*overide background image in style.css*/
            body {
                background-image: url(https://images.unsplash.com/photo-1635948173049-18964cdaae7f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fHNjZW5lcnklMjBicmlnaHR8ZW58MHx8MHx8&auto=format&fit=crop&w=800&q=60);
            }
        </style>
    </head>
    <body>
        <div class="container py-4 bg-light text-center p-0 w-25 position-absolute top-50 start-50 translate-middle">
            <!--Direct to make-cookies.php to initialize cookie after submitting -->
            <form class="mb-0" action="../helpers/make-cookies.php" method="POST">
                <label class="fs-4" for="name">Enter your name to enter:</label>
                <input class="form-control w-75 my-3 mx-auto" name="username" type="text">
                <input class="btn btn-success fs-4" type="submit" name="submit" value="Enter">
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
                integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" 
        crossorigin="anonymous"></script>
    </body>
</html>
