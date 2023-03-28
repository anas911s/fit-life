<html>
<?php 
//Conn DB includen
include "conn.php";
//Session
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
      body{
      opacity: 97%;
      background-image: url("img/gym.png");
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
    .row {
    background: #ffc374;
    padding: -2px;
    margin: 10px;
    list-style-type: none;
    }

    .box {
    position:relative;
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
<div class='box'>
<h1>Rooster</h1>

<?php
// notificatie bericht verwelkomen gebruiker
echo "<div class='welcome'>Welkom " . $_SESSION['username'] . ", hier vind u uw rooster." ."</div></br>";
// id van gebruiker halen
$username = $_SESSION['username'];
$stmt = $conn->prepare("SELECT gebruiker.id FROM gebruiker WHERE username = '$username'");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$id = $row['id'];
?>

<form method="post" action="insert.php">
  <input type="hidden" name="id" value="<?php echo $id;?>">
  <input type="text" name="omschrijven">
  <input type="date" name="datum">
  <label>Kies een coach:</label>
<select name="coach">
  <option value="Ali">Ali</option>
  <option value="Achraf">Achraf</option>
  <option value="Karim">Karim</option>
  <option value="Salim">Salim</option>
</select>
  <input type="submit" class="btn btn-primary" name="verander" value="Afspraak Aanmaken">
</form><h2 style="front-weight: bold;">Afspraken:</h2>
<h3><?php 
        if(isset($_SESSION['success']));
        // Als er geen sessie is terug naar login
        if (!isset($_SESSION['success'])){
            header("location: index.php");
            die();
        }

        ?></h3>
        <?php 
      // afspraak halen uit database
        $stmt = $conn->prepare("SELECT * FROM afspraken WHERE afspraken_id = $id");
        $stmt->execute();
    
        // stel de resulterende array in
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    
        foreach ($stmt as $row) {
        // data weergeven
        echo "<table class='row'>";
        echo "<tr><th> Afspraak</th>";
        echo "<th>&nbsp;omschrijving</th> ";
        echo "<th class='spatie'>&nbsp;Datum</th>";
        echo "<th class='spatie'>Coach</th></ul></tr>"; 
        echo "<tr><td> &nbsp;".$row['afspraken_id']."</td>";
        echo "<td> &nbsp;".$row['omschrijving']."</td> ";
        echo "<td> &nbsp;".$row['datum']."</td>";
        echo "<td> &nbsp;".$row['coach']."</td></ul>";   
        // update
        echo "<form method='get' action='update.php'>";
        echo "<input type='hidden' name='afspraken_id' value='$row[afspraken_id]'>";
        echo "<td><input type='submit' class='btn btn-success' value='Bijwerken'></td></form>";
        // delete
        echo "<form method='post'>";
        echo "<td><input type='hidden' name='id' id='id' value='$row[afspraken_id]'/></td>";    
        echo "<td><input type='submit' class='btn btn-danger' name='verwijderen' value='Verwijderen'/></td>";
        echo "</tr></table></form>"; 
    }  

    // als op verwijderen is gedrukt voert hij delete query uit in db
    if(isset($_POST['verwijderen'])){
        $id = $_POST['id'];
        $sql= "DELETE FROM afspraken WHERE afspraken . afspraken_id = $id;";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute();
    }
    //uitloggen knop
           if(isset($_GET['logout'])) {
                session_destroy();
                unset($_SESSION['success']); 
                header("location: index.php");
                }

            ?></div>
            <!--
                Script uit site halen voor icons.
            -->
            <script src="https://kit.fontawesome.com/7aba1c7f31.js" crossorigin="anonymous"></script>
    
            </body>
            <footer>
              <div class="footer">
                <?php 
                // footer
                include("footer2.html");?>
              </div>
            </footer>
        </html>
