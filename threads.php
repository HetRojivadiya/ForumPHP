<?php
$showAlert = false;
?>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        #ques {
            min-height: 433px;
        }
    </style>
</head>

<body>
    <?php include "header.php";
      include "dbConnect.php";
      $id = $_GET["catid"]; ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if(isset($_SESSION['loggedIn'])){
            
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $user_id =$_SESSION['user_id'];


        $result2 = mysqli_query($conn, "INSERT INTO `threads` ( `thread_title`, `thread_description`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$title','$desc', '$id', '$user_id', current_timestamp())");
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Question Added Successfully</strong> You should check in on some of those fields below.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        }

        }
        else{
            include "login.php";
           echo '<script>
           $(document).ready(function(){
           
             $("#loginModal").modal("show");
               
           });
           </script>';
        }
    }
    ?>
    <?php
    $result = mysqli_query($conn, "select * from categories where category_id = $id");

    while ($row = mysqli_fetch_assoc($result)) {

        // echo $row['category_id'];
        $content = $row['category_description'];
        $cat = $row['category_name'];
        $id = $row['category_id'];


        echo '
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">' . $cat . '</h1>
            <p class="lead">' . $content . '</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>';
    }




    $result1 = mysqli_query($conn, "select * from threads where thread_cat_id=$id");

    ?>

    <div class="container">
        <h1>Start a Discussion</h1>
        <form action="/het/forums/threads.php?catid=<?php echo $id ?>" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Thread Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title">
                <small id="emailHelp" class="form-text text-muted">Keep your title as short and as crisp as
                    Possible</small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Elaborate Your Concern</label>
                <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="desc"
                    rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <div class="container my-4" id="ques">
        <h1>Browse Questions</h1>
        <?php
        $noResult = true;
        while ($row = mysqli_fetch_assoc($result1)) {
            $noResult = false;
            // echo $row['category_id'];
            $desc = $row['thread_description'];
            $title = $row['thread_title'];
            $thread_id = $row['thread_id'];

            echo '
    
        <div class="media my-3">
            <img class="mr-3" src="userdefault.png" style="width:50px" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0"><a class="text-dark" href="threadQuestion.php?threadid=' . $thread_id . '">' . $title . '</a></h5>
                ' . $desc . '
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