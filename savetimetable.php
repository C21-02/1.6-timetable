<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $confirmPassword = $_POST["confirmPassword"];
    if ($password !== $confirmPassword) {
        echo "Паролі не співпадають. Будь ласка, повторіть введення.";
    } else {
        $file = fopen("userdatatimetable.txt", "a");
        if ($file) {
            fwrite($file, "Ім'я: " . $name . "\n");
            fwrite($file, "Прізвище: " . $surname . "\n");
            fwrite($file, "Email: " . $email . "\n");
            fwrite($file, "Пароль: " . $password . "\n");
            fwrite($file, "\n");
            fclose($file);
            echo "Дані успішно збережено.";
        } else {
            echo "Помилка під час відкриття файлу для запису.";
        }
    }
} else {
    echo "Помилка: невірний метод запиту.";
}
?>
