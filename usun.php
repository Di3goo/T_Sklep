<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
$host = "localhost";
$user = "operator";
$baza = "sklep";
$password = "1111";

$polacz = new mysqli($host,$user,$password,$baza);


if($polacz->connect_error){die("nie mozna polaczyc: " . $polacz->connect_error);}
$uzytkownik=$_GET["login"];
$zapytanie="delete from user where Login='".$uzytkownik."';";
if($polacz->query($zapytanie)===TRUE){
    echo "zakończono usuwanie";
}
else{
    echo " nie wyszło";
}
?>


<a href="admin.php">Wróć</a>

</body>
</html>