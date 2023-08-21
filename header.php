<?php

  session_start();
  




echo '
<nav class="navbar  navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/het/forums/index.php">Forums</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/het/forums/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/het/forums/contact.php">Contact</a>
        </li>
        
      </ul>';

      
      if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
        echo ' <form  class="d-flex" role="search">
        
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
       
        </form>
        <form action="sessionLogout.php" method="post">
        <div class="mx-2">
        <button class="btn btn-outline-success" type="reset"><img class"px-0" style="width:25px" src="userdefault.png"> '.$_SESSION['username'].'</button>
        <button class="btn btn-outline-success" type="submit">Logout</button>
        </div>
        </form>
      ';
      }
      else{
        echo '

      
      <form class="d-flex" role="search" action="/het/forums/search.php" method="GET">
        
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <div class="mx-2">
      <button  class="btn btn-outline-primary "  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
      <button class="btn btn-outline-primary " data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
      </div>';}?>
    </div>
  </div>
</nav>
<?php
include "login.php"; 
include "signup.php"; ?>