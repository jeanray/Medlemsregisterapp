<?php
/*
  Ting som må gjøres i videre utvikling av applikasjonen:
    - sørg for at personer som melder seg inn i linjeforeningen får tilsendt en kvittering på epost.
      - Jeg har hatt hell med å sende epost fra usn-serveren med PHPMailer-biblioteket man finner på github, opp mot forskjellige SMTP-servere.
      - Sender både plaintext og HTML-epost, og er enkelt å konfigurere og ta i bruk.
    - mer clean design på kvittering etter at bruker har lykkes med å melde seg inn.
    - diverse annet.
*/

require_once 'dbConnect.php';
@$formFornavn = mysqli_real_escape_string($tilkobling, $_POST['formFornavn']);
@$formEtternavn = mysqli_real_escape_string($tilkobling, $_POST['formEtternavn']);
@$formEpost = mysqli_real_escape_string($tilkobling, $_POST['formEpost']);
@$formTlf = mysqli_real_escape_string($tilkobling, $_POST['formTlf']);
@$formStudie = mysqli_real_escape_string($tilkobling, $_POST['formStudie']);
$epostVal = filter_var($formEpost, FILTER_VALIDATE_EMAIL);

if(!$formFornavn || !$formEtternavn || !$epostVal || !$formTlf || !$formStudie) {
  echo 'Har du fylt ult alle feltene riktig?';
} else {
  $registrerSql = "INSERT INTO medlemmer (`form_fornavn`, `form_etternavn`, `form_epost`, `form_tlf`, `studie_idstudie`) VALUES ('$formFornavn', '$formEtternavn', '$formEpost', '$formTlf', '$formStudie')";
  mysqli_query($tilkobling, $registrerSql) or die(mysqli_error($tilkobling));
  $sql = "SELECT * FROM studie WHERE idstudie = '$formStudie'";
  $res = mysqli_query($tilkobling, $sql) or die(mysqli_error($tilkobling));
  $rader = mysqli_num_rows($res);
  for($i = 1; $i <= $rader; $i++) {
    $rad = mysqli_fetch_array($res);
    $studieRetning = $rad['studie_navn'];
  }
  mysqli_close($tilkobling);
}
?>
<html lang='no'>
  <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <!--custom css-->
    <link rel='stylesheet' type='text/css' href='../style/style.css' />
    <!--bootstrap-->
    <link rel='stylesheet' type='text/css' href='../style/bootstrap.min.css' />
    <title>Registrering er fulført</title>
  </head>
  <body>
    <form method='post' action='../index.php'>
      <div class='form-group' id='formBox'>
        <div class='jumbotron' id='jumboBox'>
          <h3>Gratulerer! Du er nå medlem av BITS Vestfold - Linjeforening for IT studenter ved Campus Bakkenteigen</h3>
          <p>Dette er din kvittering for medlemskap</p>
          <div class="form-group">
            <p> fornavn: <?php echo $formFornavn;?></p>
          </div>
          <div class="form-group">
            <p> etternavn: <?php echo $formEtternavn;?></p>
          </div>
          <div class="form-group">
            <p> epost: <?php echo $formEpost;?></p>
          </div>
          <div class="form-group">
            <p> tlf: <?php echo $formTlf;?></p>
          </div>
          <div class="form-group">
            <p> studieretning: <?php echo $studieRetning;?></p>
          </div>
          <div class="form-group">
            <p> innmeldingsdato: <?php echo date('d/m/Y');?></p>
          </div>
          <div class="form-group">
            <input type='submit' class='btn btn-success btn-block' id='formKnapp' name='fortsettKnapp' value='Tilbake til skjema'>
          </div>
          <div id='datoStempling'>
            <script>document.write('&copy; ' + 'BITS Vestfold - ' + new Date().getFullYear());</script>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>
