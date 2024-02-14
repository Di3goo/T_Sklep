<?php
$host = "localhost";
$user = "operator";
$baza = "sklep";
$password = "1111";
$polacz = new mysqli($host, $user, $password, $baza);

if($polacz->connect_error){
    die("Błąd" . $polacz->connect_error);
}
$nazwa = $_POST["nazwa1"];

$sprawdz = "select * from kategoria where nazwa ='$nazwa';";
$wynik1 = $polacz->query($sprawdz);
if($wynik1 && $wynik1-> num_rows > 0){
    echo"<script>alert('Kategoria istnieje')</script>";
}
else{
$dodaj = "insert into kategoria (id, nazwa) value ('', '$nazwa');";
$wynik = $polacz->query($dodaj);
echo "<script>alert ('Dodano kategorię!'); </script>";
echo "<script type=\"text/javascript\">
    window.setTimeout(\"window.location.replace('admin.php');\",1);
     </script>";
    
}

?>