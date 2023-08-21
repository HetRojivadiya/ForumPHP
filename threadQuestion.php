<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Hello, world!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        #ques {
            min-height: 433px;
        }
    </style>
</head>

<body>
    <?php include "header.php"; ?>
    <?php

    include "dbConnect.php";

    $id = $_GET["threadid"];



    $showAlert=false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $comment = $_POST['comment'];
        $thread_user_id = $_SESSION['user_id'];
        $result3 = mysqli_query($conn, "INSERT INTO `comments` ( `comment_content`, `thread_id`,`comment_by`, `comment_time`) VALUES ('$comment', $id, $thread_user_id, current_timestamp())");
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Comment added successfully</strong> You should check in on some of those fields below.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }
    }








    $result = mysqli_query($conn, "select * from threads where thread_id = $id");

    while ($row = mysqli_fetch_assoc($result)) {

        // echo $row['category_id'];
    
        $title = $row['thread_title'];
        $desc = $row['thread_description'];
        $user_id = $row['thread_user_id'];

        $r = mysqli_query($conn,"select * from users where user_id = $user_id");
        $rw = mysqli_fetch_assoc($r);
        $user_name = $rw['user'];



        echo '
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">' . $title . '</h1>
            <p class="lead">' . $desc . '</p>
            <hr class="my-4">
            <p>You acknowledge that the information provided through the Forum is comprised of content from sources, which are beyond the control of the Society.</p>
            <p><b>
             
               Posted by : '.$user_name.'</b>
            </p>
        </div>
    </div>';
    }

    ?>
    <div class="container">
        <h1>Post a Comment</h1>
        <form action="/het/forums/threadQuestion.php?threadid=<?php echo $id ?>" method="post">
            <div class="form-group">
                <textarea type="text" class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            
            <button type="submit" class="btn btn-success">Comment</button>
        </form>
    </div>

    <?php
    $result1 = mysqli_query($conn, "select * from comments where thread_id=$id");

    ?>
    <div class="container my-4" id="ques">

        <?php
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result1)) {
            $noResult = false;
            $desc = $row['comment_content'];
            $time = $row['comment_time'];

            $comment_by = $row['comment_by'];

            $sql = mysqli_query($conn,"select * from users where user_id =$comment_by");
            $sql1 = mysqli_fetch_assoc($sql);
            $user = $sql1['user'];
            
            echo '
    
        <div class="media my-3">
            <img class="mr-3" src="userdefault.png" style="width:50px" alt="Generic placeholder image">
            <div class="media-body">
                <h4 class="mt-1"><a class="text-dark" href="thread.php">' . $user . '</a><p style="margin-top:-30px;" class="text-end">'.$time.'</p></h4>
                <p style="margin-top:-10px">' . $desc . '</p>
            </div>
        </div>
   
     ';



        }
        if ($noResult == true) {
            echo '<div class="jumbotron jumbotron-fluid">
   <div class="container">
     <p class="display-6">No Result Found</p>
     <p class="lead">Be the first person to ask a question </p>
   </div>
 </div>';
        }

        ?>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <?php include "footer.php"; ?>
</body>

</html>