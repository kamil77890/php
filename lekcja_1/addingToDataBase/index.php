<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="number" name="a" id="a" placeholder="a">
        <input type="number" name="b" id="b" placeholder="b">
        <input type="submit" value="Oblicz">
    </form>
    <ul>
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'nazwa_bazy_danych');  

    $sql = "SELECT a, b, wynik FROM  wyniki";

    $result - $db->query($sql);
    while($row = mysqli_fetch_array($result)){
       
       echo("<li> $row[0] / $row[1] = $row[2] </li>");
    }

    
    ?>
    </ul>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(isset($_POST['a']) && isset($_POST['b']))
            {
                if($_POST['b'] == '0')
                {
                    echo("<h1> Nie dzielimy przez 0");
                }
                else{
                    $wynik = $_POST['a'] + $_POST['b'];
                    echo("<h1> Wynik to: $wynik");
                    $a = $_POST["a"];
                    $b = $_POST["b"];

                    $sql = "INSERT INTO  wyniki(a, b, iloraz) VALUES($a, $b, $wynik)";
                    $db->close();
                }
               
            }

            $db->close();
        }
   
    ?>
</body>
</html>