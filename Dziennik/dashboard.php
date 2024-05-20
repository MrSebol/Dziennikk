<?php
session_start();
require_once('db_config.php');


if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

$username = $_SESSION['username'];


$sql_timetable = "SELECT * FROM timetable WHERE user_id = (SELECT user_id FROM users WHERE username = '$username')";
$result_timetable = $conn->query($sql_timetable);


$sql_grades = "SELECT * FROM grades WHERE user_id = (SELECT user_id FROM users WHERE username = '$username')";
$result_grades = $conn->query($sql_grades);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel użytkownika</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Witaj, <?php echo $username; ?>!</h2>

    <h3>Plan lekcji:</h3>
    <table>
        <tr>
            <th>Dzień</th>
            <th>Godzina</th>
            <th>Przedmiot</th>
        </tr>
        <?php
        if ($result_timetable->num_rows > 0) {
            while($row = $result_timetable->fetch_assoc()) {
                echo "<tr><td>" . $row["day"] . "</td><td>" . $row["time"] . "</td><td>" . $row["subject"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Brak danych</td></tr>";
        }
        ?>
    </table>

    <h3>Oceny:</h3>
    <table>
        <tr>
            <th>Przedmiot</th>
            <th>Ocena</th>
        </tr>
        <?php
        if ($result_grades->num_rows > 0) {
            while($row = $result_grades->fetch_assoc()) {
                echo "<tr><td>" . $row["subject"] . "</td><td>" . $row["grade"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Brak danych</td></tr>";
        }
        ?>
    </table>

    <br>
    <a href="index.html">Strona Główna</a>
    <a href="grades.php" class="btn"> Edytuj oceny</a>
    <a href="dodawanie.php"class=btn>Dodaj ocene/plan</a>
</body>
</html>
