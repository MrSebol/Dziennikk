<?php
session_start();
require_once('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("location: dashboard.php");
    } else {
        echo "Nieprawidłowe dane logowania.";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style1.css">
    <title>Logowanie</title>
</head>
<body>
    <h2>Logowanie</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Użytkownik:</label><br>
        <input type="text" name="username"><br>
        <label>Hasło:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" value="Zaloguj się">
    </form>
   
    <a href="index.html"class=btn>Strona Główna</a>
</body>
</html>
