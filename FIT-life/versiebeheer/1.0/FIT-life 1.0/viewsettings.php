<html>
<?php 
//connectie db
include "conn.php";
// sessie
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
<h2 style="text-align:center">Instellingen</h2>

<div class="card">

  <p><a class="button" href="view.php"><i class="fa fa-undo" aria-hidden="true"></i> Terug</a></p>
    <?php
            // als er een sessie actief is voert hij de rest uit anders header location login
            if(isset($_SESSION['success'])) {
              //email updaten
            if(isset($_POST['resetmail'])) {
              $userid= $_POST['id'];
              $newmail = $_POST['email1'];
              $newmail2 = $_POST['email2'];
              if($newmail == $newmail2){
                $sql = "SELECT email FROM gebruiker WHERE gebruiker.id = '$userid'";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute();
                $mail = $stmt->fetch(PDO::FETCH_ASSOC);
                $email = $mail['email'];
                $emailcheck = $_POST["email1"];
            if (!filter_var($emailcheck, FILTER_VALIDATE_EMAIL)) {
              echo  "<div class='alert alert-danger' role='alert'>Ongeldige email formaat!</div>";
                }else{
                if($newmail == $email){
                  echo "<div class='alert alert-danger' role='alert'>Zorg ervoor dat de Nieuwe E-mail niet op de oude lijkt!</div>"; }else{
                  if(empty($_POST['email1'] || $_POST['email2'])){
                    echo "<div class='alert alert-danger' role='alert'>Vul iets in</div>";
                  }else{
                    $sql = "UPDATE gebruiker SET email = '$newmail' WHERE gebruiker.id = $userid;";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    echo "<div class='alert alert-success' role='info'>E-mail succesvol gewijzigd!</div>"; 
                    header("Refresh:3; view.php");
                  }
            }}}}
            //id uit db halen van sessie gebruiker die actief is
          $username = $_SESSION['username'];
          $sql = "SELECT id FROM gebruiker WHERE username = '$username'";
          $stmt = $conn->prepare($sql);
          $result = $stmt->execute();
          $user = $stmt->fetch(PDO::FETCH_ASSOC);
          // form om specifieke van specifieke ID email the wijzigen
         $id = $user['id'];
         echo "<form method='post'>";
         echo "<input type='hidden' name='id' value='$id'>";
         echo "<p style='font-weight: bold;'>Uw E-mail Adres aanpassen:</p>";
         echo "<input type='email' name='email1' placeholder='Nieuw E-mail'><br><br>";
         echo "<input type='email' name='email2' placeholder='Nieuw E-mail Herhalen'><br>";
         echo "<br><input type='submit' name='resetmail' class='btn btn-info' value='E-mail aanpassen'>";
         echo "</form>";

         // wachtwoord updaten

         if(isset($_POST['reset'])) {
          $userid= $_POST['id'];
          $newpass = $_POST['password1'];
          $newpass2 = $_POST['password2'];
          if($newpass == $newpass2){
            $sql = "SELECT password FROM gebruiker WHERE gebruiker.id = '$userid'";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute();
            $pass = $stmt->fetch(PDO::FETCH_ASSOC);
            $pass = $pass['password'];
            if($newpass == $pass){
              echo "<div class='alert alert-danger' role='alert'>Zorg ervoor dat de Nieuwe Wachtwoord niet op de oude lijkt!</div>"; }else{
              if(empty($_POST['password1'] || $_POST['password2'])){
                echo "<div class='alert alert-danger' role='alert'>Vul iets in</div>";
              }else{
                $sql = "UPDATE gebruiker SET password = '$newpass' WHERE gebruiker.id = $userid;";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                echo "<div class='alert alert-success' role='info'>Wachtwoord succesvol gewijzigd!</div>"; 
                header("Refresh:3; view.php");
              }
              }}else {
                echo "<div class='alert alert-danger' role='alert'>Wachtwoord komt niet overeen!</div>"; }}

                // id uit db halen van actieve sessie gebruiker
         $username = $_SESSION['username'];
         $sql = "SELECT id FROM gebruiker WHERE username = '$username'";
         $stmt = $conn->prepare($sql);
         $result = $stmt->execute();
         $user = $stmt->fetch(PDO::FETCH_ASSOC);

         // form om specifieke van specifieke ID te verwijderen
        $id = $user['id'];
        echo "<form method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<p style='font-weight: bold;'>Uw Wachtwoord aanpassen:</p>";
        echo "<input type='password' name='password1' placeholder='Nieuw Wachtwoord'><br><br>";
        echo "<input type='password' name='password2' placeholder='Nieuw Wachtwoord Herhalen'><br>";
        echo "<br><input type='submit' name='reset' class='btn btn-info' value='Wachtwoord aanpassen'>";
        echo "</form>";

        //motto Update en Delete

         $username = $_SESSION['username'];
         $sql = "SELECT motto FROM gebruiker WHERE username = '$username'";
         $stmt = $conn->prepare($sql);
         $result = $stmt->execute();
         $user = $stmt->fetch(PDO::FETCH_ASSOC);
         $motto= $user['motto'];

         echo "<form method='post'>";
         echo "<input type='hidden' name='id' value='$id'>";
         echo "<p style='font-weight: bold;'>Uw motto aanpassen:</p>";
         echo "<input type='text' name='motto1' placeholder='$motto'><br><br>";
         echo "<br><input type='submit' name='change' class='btn btn-info' value='Motto Aanpassen'><br><br>";
         echo "<input type='submit' name='delete' class='btn btn-danger' value='Motto Verwijderen'>";
         echo "</form>";
        }
        // Als er geen sessie is terug naar login
        if (!isset($_SESSION['success'])){
            header("location: login.php");
            die();
        }


        ?>
        <?php 
       

// motto validatie en wijzigen van motto
        if(isset($_POST['change'])) {
          $userid= $_POST['id'];
          $newmotto = $_POST['motto1'];

          $sql = "SELECT motto FROM gebruiker WHERE gebruiker.id = '$userid'";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute();
            $motto = $stmt->fetch(PDO::FETCH_ASSOC);
            $motto1 = $motto['motto'];
              if(empty($_POST['motto1'])){
                echo "<div class='alert alert-danger' role='alert'>Vul iets in</div>";
              }else{
                if($newmotto == $motto1) {
                  echo  "<div class='alert alert-danger' role='alert'>Probeer een andere motto</div>";
                 }else {
              $sql = "UPDATE gebruiker SET motto = '$newmotto' WHERE gebruiker.id = $userid;";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              echo "<div class='alert alert-success' role='info'>Motto succesvol gewijzigd!</div>"; 
              header("Refresh:2; view.php");
            }

        }}

 //motto deleten
        if(isset($_POST['delete'])) {

          $sql = "UPDATE gebruiker SET motto = NULL WHERE motto = '$motto'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            echo "<div class='alert alert-success' role='info'>Motto succesvol verwijderd</div>";
            header("Refresh:2; view.php");
        }

           if(isset($_GET['logout'])) {
                session_destroy();
                unset($_SESSION['success']); 
                header("location: index.php");
                }
              
                echo "<br>";

            ?>
                   </div> <br>
      
            </body>
            <footer>
              <div class="footer">
                <?php
                //footer
                include("footer2.html");?>
              </div>
            </footer>
        </html>
