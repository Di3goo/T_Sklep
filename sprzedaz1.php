<?php
$host = "localhost";
$user = "operator";
$baza = "sklep";
$password = "1111";
$polacz = new mysqli($host, $user, $password, $baza);

if($polacz->connect_error){
    die("Błąd" . $polacz->connect_error);
}
$id_produktu =$_POST["id_produktu"];
$imie = $_POST["imie"];
$platnosc = $_POST["platnosc"];
$nazwisko = $_POST["nazwisko"];
$zapytanie1 = "select id from klient where imie = '$imie' and nazwisko = '$nazwisko';";
$wynik1 = $polacz->query($zapytanie1);
if($wynik1 -> num_rows == 0){
    die(header("HTTP/1.0 404 Not Found"));
} else {
    $id_klienta = $wynik1->fetch_assoc();
    $zapytanie2 = "insert into transakcje (id,id_klienta,id_produktu,data_sprz,forma_platn) values ('', ".$id_klienta["id"].", '$id_produktu', curdate(), '$platnosc');";
    $wynik2 = $polacz->query($zapytanie2);
}

?>