<?php
session_start();
require_once('db_config.php');

$message = '';

// Sprawdzenie czy formularz został przesłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych z formularza
    $day = $_POST['day'];
    $time = $_POST['time'];
    $subject = $_POST['subject'];
    $grade = $_POST['grade'];

    // Pobranie ID użytkownika z sesji
    $userId = 2;

    // Dodanie danych do bazy danych
    $sql_timetable = "INSERT INTO timetable (user_id, day, time, subject) VALUES ('2', '$day', '$time', '$subject')";
    if ($result_timetable = $conn->query($sql_timetable)) {
        $message = "Dane planu lekcji zostały pomyślnie dodane.";
    } else {
        $message = "Wystąpił błąd podczas dodawania danych planu lekcji: " . $conn->error;
    }

    $sql_grades = "INSERT INTO grades (user_id, subject, grade) VALUES ('2', '$subject', '$grade')";
    if ($result_grades = $conn->query($sql_grades)) {
        $message .= " Dane oceny zostały pomyślnie dodane.";
    } else {
        $message .= " Wystąpił błąd podczas dodawania danych oceny: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj plan lekcji i oceny</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <div class="container">
        <h2>Dodaj plan lekcji i oceny</h2>
        <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="day">Dzień:</label>
            <input type="text" name="day" id="day" required><br>

            <label for="time">Godzina:</label>
            <input type="text" name="time" id="time" required><br>

            <label for="subject">Przedmiot:</label>
            <input type="text" name="subject" id="subject" required><br>

            <label for="grade">Ocena:</label>
            <input type="text" name="grade" id="grade" required><br>

            <label for="user_id">ID użytkownika:</label>
    <input type="number" name="user_id" id="user_id" required><br>


            <input type="submit" value="Dodaj">
        </form>
    </div>
    <a href="index.html"class=btn>Strona Główna</a>
</body>
</html>
