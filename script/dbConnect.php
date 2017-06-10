<?php
  /*
    Konfigurer hvilken database medlemsApp skal benytte for registrering av
    medlemmer.

    - BKITS 17
  */
  $serverNavn = ""; //Servertilkobling
  $brukerNavn = ""; //brukernavnet til db
  $passord = ""; //passord for aksessering i db
  $dataBase = ""; //hvilken db på serveren skal du peke på?
  $tilkobling = new mysqli($serverNavn, $brukerNavn, $passord, $dataBase);
  if($tilkobling->connect_error) {
    die("tilkobling feilet: " . $tilkobling->connect_error);
    exit();
  }
  return true;
?>