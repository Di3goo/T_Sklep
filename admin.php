<!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">
<meta charset="UTF-8">
    <style>
#tabelka{
    font-size: 20px;
    font-family: 'Akaya Kanadaka', cursive;
    color:white;
    position:absolute;
    width:460px;
}
#dwa {
  height:452px;
}
td, th {
  border:1px black solid;
  text-align: left;
  padding: 6px;
  width:100px;
}
table {
    font-family: 'Akaya Kanadaka', cursive;
  border-collapse: collapse;
background-color:#8187ff;

}
body{
  background-image: url("tapeta.jpg");
}
a{
    color:white;
}
#tekst{
    color:black;
    position:relative;
}
#towar{
    color:white;
    float:left;
    font-size:20px;

}
#tabela{
    float:right;
    color:white;
    position:relative;
    border:1px solid black;
    background-color:rgba(0,0,0,0.25);
    margin-left:20px;
    margin-right:20px;
    padding:40px;
}
#dodaj{
    margin-top:20px;
    margin-left:5px;
    margin-bottom:7px;
    width:150px;
    height:30px;
}
#nazwa{
    margin-bottom:2px;

}
#cena,#nazwa,#marza,#id,#sn{
    font-size:30px;
    margin-left:140px;
}
#tekscik{
    color: white;
  font-size:40px;
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 2px;
  display: inline-block;
  font-family: 'Merriweather', serif;
  -webkit-mask-image: linear-gradient(75deg, rgba(249, 249, 252, 0.6) 20%, rgb(247, 247, 248) 30%, rgba(250, 250, 250, 1) 70%);
  -webkit-mask-size: 200%;
  animation: shine 3s linear infinite;
  opacity:1;
margin-left:35px;
}
@keyframes shine {
  from { -webkit-mask-position: 150%; }
  to { -webkit-mask-position: -50%; }
}
input{
background-color:lightskyblue;
border-radius:20px;
margin-top:5px;
height:30px;
width:200px;
margin-left:80px;
}
#link{
position:relative;
font-size:30px;
left:950px;

}
.tabela{
  margin-left:500px;
  margin-top:20px;
  color:white;

}
#hejaa{
  color:white;
}
.pola{
position:relative;
margin-left:500px;
color:white;
border:1px solid black;
 margin-right:1178px;
 text-align:center;
 background-color:rgba(0,0,0,0.25);
 margin-top:20px;
 font-size:20px;
 width:700px;
 right:500px;
 bottom:70px;
}
.przycisk{
  position:relative;
 right:65px;
 margin-bottom:2px;
}
#pole{
position:relative;
right:40px;
}
#kategoria123{
  margin-left:20px;
  margin:0;
  size:20px;
}
#nazwa123{
position:relative;
top:20px;
}
#transakcje{
position:relative;
bottom:90px;
width:700px;
color:white;
}
#jeden{
  width:453px;
  height:450px;
  position:relative;
  right:150px;
  bottom:90px;
}
#kategoria10{
  font-size:20px;
  color:white;
  position:relative;
  margin-left:100px;
  bottom:70px;
  right:250px;
}
#przycisk1{
  position:relative;
  left:25px;
}
#tansakcja10{
  color:white;
  position:relative;
bottom:90px;
font-size:20px;
}
        </style>
</head>
<body>
<?php
    $host = "localhost";
    $user = "operator";
    $baza = "sklep";
    $baza2="sklep";
    $password = "1111";
   
    $polacz = new mysqli($host,$user,$password,$baza);
  $polacz2=new mysqli($host,$user,$password,$baza2);

    if($polacz->connect_error){die("nie mozna polaczyc: " . $polacz->connect_error);}
        if($polacz2->connect_error){die("nie mozna polaczyc: " . $polacz2->connect_error);}
?>

<div id='tabelka'>
Tabela użytkowników:</br>
<table id="dwa">
<?php 
$ludzie="select * from user;";
$wyswietl=$polacz->query($ludzie);

if ($wyswietl->num_rows > 0) {

    while($row = $wyswietl->fetch_assoc()) {
      echo "<td id='pierwszy'>Nazwa uzytkownika:  </td><td>" . $row["Login"]."</td><td><a href='usun.php?login=".$row["Login"]."'> Usun</a></br></td></tr>";
    }
  } else {
    echo "brak rekordów";
  }
?>
</table>
</div>
<div id="tabela">
 <form action="dodaj.php" method="GET">
<p id="tekscik">Dodaj towar:</p>
<div id="nazwa"> Nazwa:</br></div><input type="text" name="nazwa" /></br>
<div id="cena">Cena:</br></div><input type="text" name="cena" /></br>
<div id="marza">Marza:</br></div><input type="text" name="marza" /></br>
<div id="id">ID:</br></div><input type="text" name="id_kategoria" /></br>
<div id="sn">sn:</br></div><input type="text" name="sn" />
<div id="dodaj"><input type=submit  value="Dodaj towar"/></div>
</div>
</form>
</br>
<a id="link" href="logowanie.html" >Wróć do logowania </a>

<?php
$host = "localhost";
    $user = "operator";
    $baza = "sklep";
    $password = "1111";
    $polacz = new mysqli($host, $user, $password, $baza);

    if($polacz->connect_error){
        die("Błąd" . $polacz->connect_error);
    }
    $kategorie = "select * from kategoria;";
    $result = $polacz->query($kategorie);
?>
   <div class="hejaa">
        <div class="tabela">
         <p id="kategoria10"> Kategorie:</p>
            <table id="jeden">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nazwa</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                    
                        <?php
          
      if ($result -> num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<th scope='row'>".$row["id"]."</th><td>".$row["nazwa"]."</td></tr>";

          }
      } else {
          echo '<script>alert("Brak użytkowników");</script>';
      }
      $polacz->close();
   
     ?>
                    </tr>
                </tbody>
            </table>
        </div>
  
        <div class="pola">
        <form action="dodanie.php" method="POST">
<p id="kategoria123">Dodaj Kategorie:</p>
<p id="Nazwa123">Nazwa:</p> <input id ="pole" type="text" name='nazwa1'/>
            <div class=przycisk>
            <input type="submit" id="przycisk1" value="Dodaj">
            </div>
  
            </div>
            </form>
            </div>
            <?php
$host = "localhost";
    $user = "operator";
    $baza = "sklep";
    $password = "1111";
    $polacz = new mysqli($host, $user, $password, $baza);

    if($polacz->connect_error){
        die("Błąd" . $polacz->connect_error);
    }
    $transakcje = "select p.nazwa,cena,marza,cena+(cena*marza) as cena_sp, k.imie, k.nazwisko, data_sprz from transakcje t inner join produkty p on t.id_produktu=p.id inner join klient k on t.id_klienta=k.id;";
    $result = $polacz->query($transakcje);
?>
<p id="tansakcja10">Transakcje</p>
<div id="transakcje">
            <table>
                <thead>
                    <?php
                if($result -> num_rows == 0){
                    echo "<th scope='col'>Brak Danych</th>";
                }
                else {
                    echo "
                     <tr>
                        <th scope='col'>Nazwa produktu</th>
                        <th scope='col'>Cena</th>
                        <th scope='col'>Marza</th>
                        <th scope='col'>Cena sprzedaży</th>
                        <th scope='col'>Imie klienta</th>
                        <th scope='col'>Nazwisko klienta</th>
                        <th scope='col'>Data</th>
                    </tr>";
                }
                    ?>
                </thead>
                <tbody>
                    <tr>
                        <?php
      if ($result -> num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<td>".$row["nazwa"]."</td><td>".$row["cena"]."</td><td>".$row["marza"]."</td><td>".$row["cena_sp"]."</td><td>".$row["imie"]."</td><td>".$row["nazwisko"]."</td><td>".$row["data_sprz"]."</td></tr>";
          }
      } else {}
     ?>
                    </tr>
                </tbody>
            </table>
    </div>
</body>
</html>