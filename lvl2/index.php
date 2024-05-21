<!-- Stwórz formularz HTML z polem tekstowym (input) do wprowadzania nazwy użytkownika oraz przyciskiem do wysyłania formularza. 
Następnie, używając PHP, przetwórz dane z formularza i wyświetl wiadomość powitalną dla użytkownika. -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="index.php" method="post">
        <input type="text" name="user" id="user" placeholder="user">
        <input type="text" name="pass" id="pass" placeholder="pass">
        <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['user']) && isset($_POST['pass'])) {

            $db = mysqli_connect('localhost', 'root', '', 'users');

            $user = $_POST["user"];
            $pass = $_POST["pass"];

            echo "Witaj " . $user . "<br>";
            $sql = "INSERT INTO  users( user, pass) VALUES($user, $pass)";

            $db->close();
        } else {
            echo "Wprowadź dane";
        }
        $db->close();
    }
    ?>
</body>

</html>