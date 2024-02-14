<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
    <style>
   .glowny{
       border:1px solid black;
       text-align:center;
       margin-right:500px;
       margin-left:500px;
       color:white;
       background-color:rgba(0,0,0,0.25);;
       font-family: 'Akaya Telivigala', cursive;
   }
   .tabela{
    position:relative;
    left:50px;
       color:white;
       border:1px solid white;
       width:800px;
       height:300px;
       font-size:30px;
       background-color:rgba(1,0,0,0.25);
       letter-spacing:2px;
       bottom:10px;
       font-family: 'Akaya Telivigala', cursive;
   }
   body{
  background-image: url("tapeta.jpg");
}
#przycisk{
    color:white;
    font-size:20px;
}
#imie1,#imie{
    text-align:center;
    font-size:30px;
}
#nazwisko,#nazwisko1{
    text-align:center;
    font-size:30px;
}
#sposobplatnosci,#platnosc{
    text-align:center;
    font-size:30px;
}
#bobek{
    position:absolute;
    width:480px;
    height:300px;
    border-radius:25px;
    top:300px;
}
#cos{
    position:relative;
    color:white;
    font-size:40px;
    text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 2px;
  display: inline-block;
  position: relative;
  font-family: 'Merriweather', serif;
  -webkit-mask-image: linear-gradient(75deg, rgba(249, 249, 252, 0.6) 20%, rgb(247, 247, 248) 30%, rgba(250, 250, 250, 1) 70%);
  -webkit-mask-size: 200%;
  animation: shine 3s linear infinite;
  opacity:1;
  margin-left:650px;

}
@keyframes shine {
  from { -webkit-mask-position: 150%; }
  to { -webkit-mask-position: -50%; }
}
#bobek{
    margin-left:140px;
}
    </style>
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    </script>
</head>

<body>
    <?php
$host = "localhost";
    $user = "operator";
    $baza = "sklep";
    $password = "1111";
    $polacz = new mysqli($host, $user, $password, $baza);

    if($polacz->connect_error){
        die("Błąd" . $polacz->connect_error);
    }
    $produkty = "select * from produkty;";
    $result = $polacz->query($produkty);
?>
<p id="cos">Kupno produktów RTV AGD</p>
<img id="bobek" src="bobek123.jpg">
    <div class="glowny">
       <p id="imie1"> Imie:</p><input type="text" id="imie">
       <p id="nazwisko1"> Nazwisko:</p><input type="text" id="nazwisko">
       <p id="sposobplatnosci"> Sposob platnosci: </p><select id="platnosc">
                <option value="gotówka">gotówka</option>
                <option value="karta">karta</option>
</select>
    
       
            <a href="formularzhehe.html" id="przycisk" role="button">
                <p>Dodaj uzytkownika</p>
            </a>
       
        <div class="tabela">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <?php
                if($result -> num_rows == 0){
                    echo "<th scope='col'>Brak Danych</th>";
                }
                else {
                    echo "
                     <tr>
                       
                        <th scope='col'>Nazwa</th>
                        <th scope='col'>Cena</th>
                        <th scope='col'>Marza</th>
                        <th scope='col'>ID</th>
                        <th scope='col'>SN</th>
                        <th scope='col'>Zakup</th>
                    </tr>";
                }
                    ?>
                </thead>
                <tbody>
                    <tr>
                        <?php
      if ($result -> num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "</th><td>".$row["nazwa"]."</td><td>".$row["cena"]."</td><td>".$row["marza"]."</td><td>".$row["id_kategoria"]."</td><td>".$row["sn"]."</td><td><button type='button' value=".$row["id"]." id='kup'>Kup</button></td></tr>";
          }
      } else {}  
     ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $("button").click(function() {
            var id = $(this).val();
            var imie = $('#imie').val();
            var nazwisko = $('#nazwisko').val();
            if ($("#platnosc").val() != "") {
                var platnosc = $("#platnosc").val();
                $.ajax({
                    type: "POST",
                    url: "sprzedaz1.php",
                    data: {
                        "id_produktu": id,
                        "platnosc": platnosc,
                        "imie": imie,
                        "nazwisko": nazwisko
                    },
                    success: function() {
                        location.reload();
                    },
                    error: function() {
                        alert("Nie ma takiego użytkownika");
                    }
                });
            } else {
                alert("Podaj formę płatności");
            }

        });
    });
    </script>
</body>

</html>