<!DOCTYPE html>
<html lang="en">
<?php 
include "conn.php";
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Prijzen</title>
    
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
        /*Lidmaatschap card */
        .card {
  position: relative;
  float: left;
  width:80%;
  left: 8%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card a {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card a:hover {
  opacity: 0.7;
}

.card2 { 
  position: relative; 
  background-color: white;
  float: left;
  width: 23%;
  left: 15%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  text-align: center;
  font-family: arial;
}

.card2 a {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card2 a:hover {
  opacity: 0.7;
}
.card3 { 
  position: relative; 
  background-color: white;
  float: left;
  width: 23%;
  left: 21%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  text-align: center;
  font-family: arial;
}

.card3 a {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card3 a:hover {
  opacity: 0.7;
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
          <a class="nav-link" href="profile.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profileabout.php">Over Ons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profileles.php">Groeplessen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profilewhy.php">Waarom FIT-life</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profileprice.php">Prijzen</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profilejob.php">Vacatures</a>
        </li>
        </li>
        <a class="nav-link" href="profilecontact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="rooster.php">Rooster</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-dark ms-3" style="position: absolute; right:60px;" name="logout" href="profile.php?logout">Uitloggen</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" style="position: absolute; right:165px; text-transform: uppercase; font-weight: bold;" href="view.php"><?php echo $_SESSION['username']?></a>
        </li>
      </ul>
    </div>
  </div>
</nav><br><br><br>

<div class="box">
        <h3><?php 
        if(isset($_SESSION['success']));
        // Als er geen sessie is terug naar login
        if (!isset($_SESSION['success'])){
            header("location: index.php");
            die();
        }

        ?></h3>
        <?php 
            echo "<div class='alert alert-primary'> Welkom <b>" . $_SESSION['username'] . "</b>," ."</div></br>";
           if(isset($_GET['logout'])) {
                session_destroy();
                unset($_SESSION['success']); 
                header("location: index.php");
                }

            ?>
<img src="img/blog-1.jpg" alt="fitlife" class="img-loader">
<br><br>
<h3 style="font-weight: bold; background-color: #ffc374; padding: 4px; border-radius: 3px;">Prijs Tarieven</h3>
<ul style="background-color: #ffc374; padding-bottom: 350px; border-radius: 3px;">
<h4>Lidmaatschappen:</h4>
<li>Basic Lidmaatschap <b>€9,99 P/M</b></li>
<li>Gold Lidmaatschap <b>€19,99 P/M</b></li>
<li>Premium Lidmaatschap <b>€29,99 P/M</b></li><br>
<div class="card">
  <h1>Basic Lidmaatschap</h1>
  <p class="price">€9.99</p>
  <p>Pasje Bidon fles Cadeau</p>
  <p><a href="register.php">Registreer</a></p>
</div>
<div class="card2">
  <h1>Gold Lidmaatschap</h1>
  <p class="price">€19.99</p>
  <p>Pasje Bidon fles Cadeau + FIT-life Tasje</p>
  <p><a href="register.php">Registreer</a></p>
</div>
<div class="card3">
  <h1>Premium Lidmaatschap</h1>
  <p class="price">€29.99</p>
  <p>Pasje Bidon fles Cadeau + FIT-life Tasje + Vriendenpas</p>
  <p><a href="register.php">Registreer</a></p>


</ul>
</div>  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<footer class="footer">
      <?php include('footer2.html');
      ?>
    </footer>
</html>