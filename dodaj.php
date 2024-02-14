<!DOCTYPE html>
<html>
<head>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
  <style>
    body{
  background-image: url("tapeta.jpg");
}
#napis{
  color:white;
  font-size:50px;
  text-align:center;
}
a{
  color:white;
  font-size:50px;
  margin-left:650px;
}
    </style>
    </head>
    <body>
<?php
    $host = "localhost";
    $user = "operator";
    $baza = "sakila";
    $baza2="sklep";
    $password = "1111";
   
  $polacz2=new mysqli($host,$user,$password,$baza2);

    
        if($polacz2->connect_error){die("nie mozna polaczyc: " . $polacz2->connect_error);} 
$towary="insert into produkty (nazwa,cena,marza,id_kategoria,sn) values ('".$_GET["nazwa"]."','".$_GET["cena"]."','".$_GET["marza"]."','".$_GET["id_kategoria"]."','".$_GET["sn"]."');";


if ($polacz2->query($towary) === TRUE) {
    echo "<div id='napis'>Dodales towar do sklepu gratuluje!!!!!!</div>";
  } else {
    echo "Error: " . $towary . "<br>" . $polacz2->error;
  }
  
  $polacz2->close();

?>
 <a href="admin.php" >Wróć do poprzedniej strony </a>
</body>
</html>