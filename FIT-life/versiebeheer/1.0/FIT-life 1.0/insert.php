<?php
include("conn.php");
if(isset($_POST['verander'])) {

    $afspraken_id = $_POST['id'];
    $omschrijven = $_POST['omschrijven'];
    $datum = $_POST['datum'];
    $coach = $_POST['coach'];
  
    $sql1 = "INSERT INTO afspraken (afspraken_id,omschrijving, datum, coach) VALUES ('$afspraken_id','$omschrijven', '$datum', '$coach');";
    $stmt = $conn->prepare($sql1);
    $stmt->execute();

    header("refresh:1; rooster.php");
    }?>