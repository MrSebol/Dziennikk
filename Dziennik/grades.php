<?php

require_once('db_config.php');

function getGrades($conn, $userId) {
    $grades = array();

    $sql = "SELECT subject, grade FROM grades WHERE user_id = $userId";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $grades[] = $row;
        }
    }

    return $grades;
}

if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $grade = $_POST['grade'];
    $userId = 1; 

    $sql = "INSERT INTO grades (subject, grade, user_id) VALUES ('$subject', $grade, $userId)";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: grades.php");
        exit();
    } else {
        echo "Błąd podczas dodawania oceny: " . mysqli_error($conn);
    }
}

$userId = 1; 
$existingGrades = getGrades($conn, $userId);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moje oceny</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Moje oceny</h2>
        
        <form action="grades.php" method="post">
            <h3>Istniejące oceny:</h3>
            <table>
                <tr>
                    <th>Przedmiot</th>
                    <th>Ocena</th>
                </tr>
                <?php foreach ($existingGrades as $grade): ?>
                <tr>
                    <td><?php echo $grade['subject']; ?></td>
                    <td><?php echo $grade['grade']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            
            <h3>Dodaj nową ocenę:</h3>
            <label for="subject">Przedmiot:</label>
            <select name="subject" id="subject">
                <option value="Matematyka">Matematyka</option>
                <option value="Fizyka">Fizyka</option>
                <option value="Chemia">Chemia</option>
                <option value="Informatyka">Informatyka</option>
                <option value="Historia">Historia</option>
                <option value="Biologia">Biologia</option>
                <option value="Jezyk Angielski">Jezyk Angielski</option>
                <option value="Jezyk Polski">Jezyk Polski</option>
            </select>
            <br>
            <label for="grade">Ocena:</label>
            <input type="number" step="0.01" name="grade" id="grade" min="2.00" max="5.00" required>
            <br>
            <input type="submit" name="submit" value="Dodaj ocenę">
        </form>
    </div>
</body>
</html>

