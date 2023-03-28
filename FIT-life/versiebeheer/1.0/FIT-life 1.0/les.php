<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <LINK rel="stylesheet" href="css/style.css">
    <title>Groeplessen</title>
    <style>
    body{
      opacity: 97%;
      background-image: url("img/gym.png");
      }
    .footer {
    position: absolute;
    margin: 0%;
    padding: 20px;
    width: 100%;
    left: 0%;
    background-color: #ffa734;
    border-radius: 5px;
    border-style: solid;
    border-color: black;
    border-width: 1px;
    }

    .box {
    position: relative;
    top: 0%;
    right:  3%;
    margin: 70px;
    padding: 20px;
    background-color: #ffa734;
    border-radius: 5px;
    border-style: solid;
    border-color: black;
    border-width: 1px;
    }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-scroll fixed-top shadow-0 border-bottom border-dark">
  <div class="container">
      <i class="fas fa-bars"></i>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">Over Ons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="les.php">Groeplessen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="why.php">Waarom FIT-life</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="price.php">Prijzen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="job.php">Vacatures</a>
        </li>
        </li>
        <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-dark ms-3" style="position: absolute; right:60px;" href="login.php">Log In</a>
      </li>
      </ul>
    </div>
  </div>
</nav>
<div class="box">
<img src="img/blog-1.jpg" alt="fitlife" class="img-loader">
<br><br>
<h3 style="font-weight: bold; background-color: #ffc374; padding: 4px; border-radius: 3px;">Groepslessen</h3>
<ul style="background-color: #ffc374; padding: 4px; border-radius: 3px;">
<h4>Openingstijden:</h4>
<li>Ma.  8:00 - 17:00 - Coach: <b>Karim</b></li>
<li>Di.  8:00 - 17:00 - Coach: <b>Ali</b></li>
<li>Wo.  8:00 - 17:00 - Coach: <b>Salim</b></li>
<li>Do.  8:00 - 17:00 - Coach: <b>Ali/Karim</b></li>
<li>Vr.  8:00 - 17:00 - Coach: <b>Salim/Karim</b></li>
<li>Za.  9:00 - 17:00 - Coach: <b>Achraf</b></li>
<li>Zo.  12:00 - 18:00 - Coach: <b>Achraf</b></li>
</ul>
<p class="clm">Inschrijven: <a href="register.php">Klik Hier</a></p>
</div>  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<footer class="footer">
      <?php include('footer.html');?>
    </footer>
</html>
<?php
include("conn.php");


if (isset($_SESSION['success'])){
    header("location: profileles.php");
}
?>