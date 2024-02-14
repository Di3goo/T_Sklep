<!DOCTYPE html>
<html>
<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
  <style>
      body{
  background-image: url("tapeta.jpg");
}
#hej{
    text-align:center;
    color:white;
    font-size:50px;
}
#tekst{
  color:white;
}
</style>
</head>
<body>
<?php
 $uzytkownik=$_POST['uzytkownik'];
 $nazwisko=$_POST['nazwisko'];
 $telefon=$_POST['telefon'];
 $miasto=$_POST['miasto'];
 $ulica=$_POST['ulica'];
    $host = "localhost";
    $user = "operator";
    $baza = "sklep";
    $haslo2=$_POST['haslo2'];
    $password = "1111";
    $haslo1=$_POST['haslo1'];
    $polacz = new mysqli($host,$user,$password,$baza);
  

    if($polacz->connect_error){die("nie mozna polaczyc: " . $polacz->connect_error);}



    if($haslo1==$haslo2){ 
        if(strlen($haslo1)<=8){
        die("<div id='hej'>Twoje haslo ma mniej lub rowno 8 znakow! zmien!!!</div>");
    }}
    else{
   die ("Rozne hasla popraw!");}

$rejestracja="select Imie from user where Imie = '" . $uzytkownik . "';";

$wyswietl=$polacz->query($rejestracja);
    

if($wyswietl && $wyswietl->num_rows > 0)
{die("</br>Jest juz taki uzytkownik");}
else{$zarejestruj = "insert into user(id,Login, haslo) values ('','" . $uzytkownik . "',md5('" . $haslo1 . "'));";
    $dodajklient="insert into klient (id,imie,nazwisko,telefon,miasto,ulica) values ('','".$uzytkownik."','".$nazwisko."','".$telefon."','".$miasto."','".$ulica."');";
    $wyswietl2=$polacz->query($dodajklient);
    $wyswietl = $polacz->query($zarejestruj);
    echo "</br><div id='tekst'>pomyslnie sie zarejestrowano</div>";}


?>

</body>
</html>