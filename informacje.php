<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
    <style>
        body{
  background-image: url("tapeta.jpg");

}
#napis{
    color:white;
    margin-left:700px;
    font-size:30px;
    font-family: 'Akaya Telivigala', cursive;
}
a{
    color:white;
    font-size:50px;

}
#obrazek{
    position:relative;
    margin-left:20%;
    margin-right:20%;
  text-align:center;
  margin-top:20px;
}
img{
    border-radius:15px;
}
#link{
margin-left:900px;

}
        </style>
</head>
<body>
<?php
$host = "localhost";
$user = "operator";
$baza = "sklep";
$password = "1111";

$polacz = new mysqli($host,$user,$password,$baza);


if($polacz->connect_error){die("nie mozna polaczyc: " . $polacz->connect_error);}
$produkt=$_GET["product"];
$zapytanie="SELECT * FROM produkty WHERE nazwa = '"  . $produkt . "';";
$wyswietl=$polacz->query($zapytanie);
$row = $wyswietl->fetch_assoc();
echo "<div id='napis'>Nazwa produktu:  " . $row["nazwa"]."</br> Cena: ".$row["cena"]."</br> Marza: ".$row["marza"]."</br></div>";
echo "<div id='obrazek'><img src='".$row["nazwa"].".jpg'></div>";
?>


<a id="link" href="kupno.php">Wróć</a>

</body>
</html>