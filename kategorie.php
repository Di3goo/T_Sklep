<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        background: var(--bs-gray-dark);
        background-image: var(--bs-gradient);
        background-repeat: no-repeat;
    }

    .glowny {
        width: 700px;
        height: fit-content;

        margin-left: auto;
        margin-right: auto;
        margin-top: 75px;
        background-color: var(--bs-dark);
        border-radius: 10px;
        border-style: solid;
        border-width: 2px;
        border-color: var(--bs-primary);

    }


    table {
        background: white;
    }



    .tabela {
        position: relative;
        top: 25px;
        margin-left: 25px;
        margin-right: 25px;
        width: 650px;
        display: box;
    }

    .pola {
        position: relative;
        top: 25px;
        left: 17px;
    }

    label {
        width: 567px;
    }

    .input-group {
        position: relative;
        left: 7px;
    }

    span {
        width: 85px;
        text-align: center;
    }

    .przyciski {
        position: relative;
        width: fit-content;
        height: fit-content;
        padding-bottom: 40px;
        left: 190px;
    }

    button {
        height: 48px;
    }

    #dodaj p {
        left: 0px;
    }



    p {
        display: inline;
        font-size: 25px;
        position: relative;
        bottom: 5px;
        right: 10px;
    }

    svg {
        position: relative;
        bottom: 7px;
        right: 10px;
    }

    a {
        height: 48px;
        width: 200px;
    }
    </style>
    <title>Document</title>
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
    $kategorie = "select * from kategoria;";
    $result = $polacz->query($kategorie);
?>
    <div class="glowny">
        <div class="tabela">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th id="id" scope="col">ID</th>
                        <th scope="col">Nazwa</th>

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

            </div>
            <div class=przyciski>
  
            </div>
        </div>
    </div>
<script>
</body>

</html>