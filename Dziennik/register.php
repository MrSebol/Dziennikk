<?php
require_once('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Użytkownik zarejestrowany pomyślnie.";
    } else {
        echo "Błąd podczas rejestracji użytkownika: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style1.css">
    <title>Rejestracja</title>
</head>
<body>
    <h2>Rejestracja</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Użytkownik:</label><br>
        <input type="text" name="username"><br>
        <label>Hasło:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Zarejestruj się">
    </form>
    <a href="login.php"class=btn>Powrót do logowania</a>
    <a href="index.html"class=btn>Strona Główna</a>
</body>
</html>
