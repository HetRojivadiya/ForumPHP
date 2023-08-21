<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <?php include "header.php"; 
  
  if($_SERVER["REQUEST_METHOD"] =='POST')
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Comment added successfully</strong> You should check in on some of those fields below.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  
  
  
  ?>
  
  <div class="container-fluid px-5 my-5">
    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="card border-0 rounded-5 shadow-lg overflow-hidden">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-sm-6 d-none d-sm-block bg-image">
              <img src="http://source.unsplash.com/580x516/?computer">
              </div>
              <div class="col-sm-6 p-4">
                <div class="text-center">
                  <div class="h1 fw-light">Contact us</div>
                  <p class="mb-4 text-muted"></p>
                </div>


                <form action="/het/forums/contact.php" method="POST">

                  <!-- Name Input -->
                  <div class="form-floating mb-3">
                    <input class="form-control" id="name" type="text" placeholder="Name">
                    <label for="name">Name</label>
                  
                  </div>

                  <!-- Email Input -->
                  <div class="form-floating mb-3">
                    <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" >
                    <label for="emailAddress">Email Address</label>

                  </div>

                  <!-- Message Input -->
                  <div class="form-floating mb-3">
                    <textarea class="form-control" id="message" type="text" placeholder="Message" style="height: 10rem;"></textarea>
                    <label for="message">Message</label>
                  </div>  

                  <!-- Submit success message -->
                  <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center mb-3">
                      <div class="fw-bolder">Form submission successful!</div>     
                    </div>
                  </div>

                  <!-- Submit error message -->
                  <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error sending message!</div>
                  </div>
                  <br>
                  <!-- Submit button -->
                  <div class="d-grid">
                    <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                  </div>
                </form>
                <!-- End of contact form -->

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include "footer.php"; ?>
</body>

</html>

<!-- CDN Link to SB Forms Scripts -->