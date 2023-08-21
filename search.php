<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>forums</title>
    <style>
        #footer{
            min-height: 35vh;
        }
        </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php include "header.php"; ?>
    <?php include "dbConnect.php"; ?>
    <input type="hidden" id="status" value="<?php if (isset($_GET['signupSuccess'])) {
        echo $_GET['signupSuccess'];
    } else {
        if (isset($_GET['error'])) {
            echo "false";
        } else {
            if (isset($_GET['ErrorSignin'])) {
                echo $_GET['ErrorSignin'];
            } else {
                if (isset($_GET['signIn'])) {
                    echo $_GET['signIn'];
                }
            }
        }
    } ?>">

    <div class="container my-3" id="footer">
        <h1>Search Results for <em>"<?php echo $_GET['search'] ?>"</em>
        </h1>
        <div class="result">
            <h2><a href=" " class="text-dark">darkCannot install pyaudio</a></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit mollitia dignissimos voluptatem sit
                amet qui autem, soluta eius delectus! Harum, qui accusamus illum minus eveniet magni cumque rem rerum
                nobis?
            </p>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="alert/dist/sweetalert.css">
    <script type="text/javascript">
        var status = document.getElementById("status").value;
        if (status == "true") {
            swal({
                position: 'top-end',
                icon: 'success',
                title: 'Singup is Done',
                showConfirmButton: false,
                timer: 1500
            });
        } else if (status == "false") {
            swal({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong'

            });
        } else if (status == "Sfalse") {
            swal({
                icon: 'error',
                title: 'Oops...',
                text: 'username or password incorrect'

            });
        } else if (status == "Strue") {
            swal({
                position: 'top-end',
                icon: 'success',
                title: 'Singin is Done',
                showConfirmButton: false,
                timer: 1500
            });
        }

    </script>
    <?php include "footer.php"; ?>
</body>

</html>