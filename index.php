<!DOCTYPE html>
<html lang="no">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--custom css-->
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <!--bootstrap-->
  <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
  <title>BKITS - Bli medlem!</title>
</head>
<body>
  <div class="form-group" id="formBox">
    <div class="jumbotron" id="jumboBox">
      <h3>InnmeldingsSkjema - Bli medlem!</h3>
      <form method="post" action="script/bliMedlemForm.php" class="bliMedlemForm">
        <div class="form-group">
          <label for="formFornavn">Fornavn</label>
          <input type="text" class="form-control" id="formField" name="formFornavn" placeholder="fornavn" required/>
        </div>
        <div class="form-group">
          <label for="formEtternavn">Etternavn</label>
          <input type="text" class="form-control" id="formField" name="formEtternavn" value="" placeholder="etternavn" required/>
        </div>
        <div class="form-group">
          <label for="formEpost">E-post</label>
          <input type="text" class="form-control" id="formField" name="formEpost" value="" placeholder="e-Post" required/>
        </div>
        <div class="form-group">
          <label for="formTlf">Tlf</label>
          <input type="text" class="form-control" id="formField" name="formTlf" value="" placeholder="tlf"/>
        </div>
        <div class="form-group">
          <label for="formStudie">studieretning</label>
          <select name="formStudie" class="form-control">
            <?php require_once("script/VelgStudie.php"); ?>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-success btn-block" id="formKnapp" name="fortsettKnapp" value="Fortsett">
        </div>
      </form>
      <div id="datoStempling">
        <script>document.write("&copy; " + "BITS Vestfold - " + new Date().getFullYear());</script>
      </div>
    </div>
  </div>
</body>
</html>
