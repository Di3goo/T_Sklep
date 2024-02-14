<?php
 $haslo1=$_POST['haslo1'];
    $host = "localhost";
    $user = "operator";
    $baza = "sklep";
    $password = "1111";
    $uzytkownik=$_POST['uzytkownik'];
    $polacz = new mysqli($host,$user,$password,$baza);
  

    if($polacz->connect_error){die("nie mozna polaczyc: " . $polacz->connect_error);}


$logowanie="select * from user where Login= '" . $_POST['uzytkownik'] . "' and haslo = '" . md5($_POST['haslo1']) . "';";           //operator1 operator (haslo i reg) to admin ktory moze usuwac guestow i dodawac towar

$wyswietl=$polacz->query($logowanie);

if($wyswietl && $wyswietl->num_rows == 0 ){
    echo "podano bledne haslo";
}
if ($uzytkownik=="operator"){
    header('Location:http://192.168.0.122/piotrek/Sklep/admin.php');
    }
    else{
    header('Location:http://192.168.0.122/piotrek/Sklep/sprzedaz.php');         //otwiera strone dla kupującego przykladowy kupujacy: abcd abcdefghi
    }

?>