<?php
/*
Enkel kode som henter studier ut av db for å gi studenter muligheten til å finne sitt studie
i en dropdown-meny
*/
  require_once ('dbConnect.php');
  $sql = 'select * from mydb.studie;';
  $res = mysqli_query($tilkobling, $sql) or die(mysqli_error($tilkobling));
  $rader = mysqli_num_rows($res);
  for($i = 1; $i <= $rader; $i++) {
    $rad = mysqli_fetch_array($res);
    @$studieRetning = $rad['studie_navn'];
    @$studieId = $rad['idstudie'];
    echo "<option class='form-control' value = '$studieId'>$studieRetning</option>";
  }
?>
