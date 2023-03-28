<html>
<?php 
include "conn.php";
session_start();
?>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Rooster</title>
    <style>
    .row {
    background: #ffc374;
    padding: -2px;
    margin: 10px;
    list-style-type: none;
    }
    .box {
    margin: 10px;
    padding: 10px;
    background-color: #ffa734;
    border-radius: 5px;
    border-style: solid;
    border-color: black;
    border-width: 1px;
    }

    .row{
      padding: 20px;
    }
    .spatie {
      padding: 10px;
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


<?php 
  //GET method : alle data laten zien van de leerling


  if (!isset($_GET["afspraken_id"])) {
      header("location:rooster.php");
  }
  

    //GET method : alle data laten zien van de leerling
    $id = $_GET["afspraken_id"];

?>
<div class='box'>
<form method="post">
  <input type="text" name="omschrijven">
  <input type="date" name="datum">
  <label>Kies een coach:</label>
<select name="coach">
  <option value="Ali">Ali</option>
  <option value="Achraf">Achraf</option>
  <option value="Karim">Karim</option>
  <option value="Salim">Salim</option>
</select>
  <input type="submit" class="btn btn-success" name="edit" value="Afspraak Bijwerken">
  <a href="rooster.php" class="btn btn-danger">Annuleren</a>
</form></div>
<?php
 if(isset($_POST['edit'])) {
  $omschrijving = $_POST['omschrijven'];
  $datum = $_POST['datum'];
  $coach = $_POST['coach'];

  $sql = "UPDATE afspraken SET omschrijving ='$omschrijving', datum = '$datum', coach = '$coach' WHERE afspraken_id = $id";
  $stmt = $conn->prepare($sql);
  $result = $stmt->execute();

  echo "<div class='alert alert-success'>Succesvol gewijzigd! U wordt teruggestuurd over 1 seconden...</div>";
  header('refresh:2; rooster.php');
 }

?>
</html>