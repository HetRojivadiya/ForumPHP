

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>forums</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
  <?php include "header.php"; ?>
  <?php include "dbConnect.php"; ?>
  <input type="hidden" id="status" value="<?php if(isset($_GET['signupSuccess'])){echo $_GET['signupSuccess'];}else{if(isset($_GET['error'])){echo "false";}else{if(isset($_GET['ErrorSignin'])){echo $_GET['ErrorSignin'];}else{if(isset($_GET['signIn'])){echo$_GET['signIn']; }}}}?>">
  <!-- slider start here -->
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="http://source.unsplash.com/2400x900/?computer" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="http://source.unsplash.com/2400x900/?future" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="http://source.unsplash.com/2400x900/?technologies" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="container my-3">
    <h2 class="text-center my-3">iDiscuss - Category</h2>

    <div class="row  ">
      <!-- catagory start here -->
      <?php

      $result = mysqli_query($conn, "select * from categories");

      while ($row = mysqli_fetch_assoc($result)) {

        // echo $row['category_id'];
        $content=$row['category_description'];
        $cat = $row['category_name'];
        $id = $row['category_id'];
        echo '
    <div class="col-3 my-4">
      <div class="card" style="width: 17rem;">
        <img src="http://source.unsplash.com/500x400/?' . $cat . ',coding" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><a href="/het/forums/threads.php?catid='.$id.'">'.$cat.'</a></h5>
          <p class="card-text">'.substr($content,0,100).'...</p>   
          <a href="/het/forums/threads.php?catid='.$id.'" class="btn btn-primary">View Thread</a>
        </div>
      </div>
      </div>
  ';

      }
      ?>
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
            }else if(status == "false"){
              swal({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong'

                });
            }else if(status == "Sfalse"){
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