<html>
<?php 
//connectie db
include "conn.php";
//session actief
session_start();
?>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/7aba1c7f31.js" crossorigin="anonymous"></script>
    <title>Profile</title>
    <style>
      body{
      opacity: 97%;
      background-image: url("img/gym.png");
      }  
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 400px;
  padding: 2%;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}


.button:hover, a:hover {
  opacity: 0.7;
}

.box {
  position: relative;
 background-color: #ffa734;
 border-radius: 5px;
 border-style: solid;
 border-color: black;
 border-width: 1px;
}
.footer {
    position: absolute;
    margin-top: 12%;
    padding: 20px;
    width: 100%;
    left: 0%;
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
          <a class="btn btn-dark ms-3" style="position: absolute; right:60px;" name="logout" href="profile.php?logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Uitloggen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="position: absolute; right:205px; text-transform: uppercase; font-weight: bold;" href="view.php"><?php echo $_SESSION['username']?></a>
        </li>
      </ul>
    </div>
  </div>
</nav><br><br><br>
<div class='box'>
<h2 style="text-align:center">Uw Profiel</h2>
<?php
  // gebruiker column halen uit db
          $username = $_SESSION['username'];
          $sql = "SELECT * FROM gebruiker WHERE username = '$username'";
          $stmt = $conn->prepare($sql);
          $result = $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          // rij -> email eruit halen.
          $email= $row['email'];
    // motto uit db halen 
          $username = $_SESSION['username'];
          $sql = "SELECT motto FROM gebruiker WHERE username = '$username'";
          $stmt = $conn->prepare($sql);
          $result = $stmt->execute();
          $user = $stmt->fetch(PDO::FETCH_ASSOC);
          $motto= $user['motto'];
        
?>
<div class="card">
<img src="img/about-coach.jpg" alt="John" style="border-radius:50%; width:50%; position: relative; left: 25%;">
  <h1><?php echo $_SESSION['username']; ?></h1>
  <p><?php echo " Welkom " . $_SESSION['username'] . " bij uw profiel." ."</br>";?></p>
  <p class="alert alert-secondary"><b>Motto: </b><?php echo $motto;?></p>
  <p class="alert alert-primary"><b>E-mail Adres: </b><?php echo $email;?></p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><a class="button" href="viewsettings.php"><i class="fa fa-cog" aria-hidden="true"></i> Instellingen</a></p>
</div>
    <?php 
    //sessie
        if(isset($_SESSION['success']));
        // Als er geen sessie is terug naar login
        if (!isset($_SESSION['success'])){
            header("location: index.php");
            die();
        }


        ?>
        <?php 
        //uitloggen
           if(isset($_GET['logout'])) {
                session_destroy();
                unset($_SESSION['success']); 
                header("location: index.php");
                }
              
                echo "<br>";
            ?>
            </body>
            <footer>
              <div class="footer">
                <?php include("footer2.html");?>
              </div>
            </footer>
        </html>
