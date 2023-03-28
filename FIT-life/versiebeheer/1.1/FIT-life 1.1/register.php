<?php
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/7aba1c7f31.js" crossorigin="anonymous"></script>
    <title>Registreer Klant</title>
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
      * {
        box-sizing: border-box;
      }
      .row {
        width: 80%;
      }
        .box {
    position: relative;
    top: 2%;
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
</nav><br><br>
<br>
<section>
<div class="box">
    <div class="row">
      <div class="col-sm">
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
          <form style="width: 33rem;" method="post">
            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Registreren</h3>
            <div class="form-outline mb-4">
                <label class="form-label">Gebruikersnaam</label>
                <input type="username" name="username" class="form-control form-control-lg" required/>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">E-mail Adres</label>
                <input type="e-mail" name="email" class="form-control form-control-lg" required/>
            </div>
            <div class="form-outline mb-4">
            <label class="form-label">Wachtwoord</label> 
            <input type="password" name="password1" class="form-control form-control-lg" required/>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Wachtwoord Herhalen</label>
                <input type="password" name="password2" class="form-control form-control-lg" required/>
            </div>
            <div class="pt-1 mb-4">
              <input class="btn btn-warning" name="register" type="submit" value="Registreer">
            </div>
            <p>Al een account?<a href="login.php" class="link-info">Log dan hier in</a></p>  
          </div>  
          </div> 
          </div>
          </form>
            
  <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="../FIT-life/img/over.png"
          alt="bicep" style="width: 30rem; height:20rem; margin-top:90px;">
      </div>

  <div class="alert">
<?php
    if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];

  if($password1 == $password2) {
    $sql = "INSERT INTO gebruiker (username, password, email, motto) VALUES ('$username', '$password1', '$email', 'Ik ben een nieuwe gebruiker!');";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count > 0) {
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "U bent ingelogd";
      header('location: profile.php');
    } else {
      echo "<div class='alert alert-danger' role='alert'>Gebruikersnaam of wachtwoord komt niet overeen.</div>";
  }}else{
    echo "Er is iets misgegaan!";
  }}
  ?>
  </div>
</section>
</body>
<footer class="footer">
      <?php include('footer.html');?>
    </footer>
</html>