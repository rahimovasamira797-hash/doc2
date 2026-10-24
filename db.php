
<?php
$pdo = new PDO(
    "mysql:host=localhost;charset=utf8mb4",
    "root",
    ""
);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec("CREATE DATABASE IF NOT EXISTS beauty_salon
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

$pdo->exec("USE beauty_salon");

$pdo->exec("
    CREATE TABLE IF NOT EXISTS clients (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(100),
        last_name VARCHAR(100),
        phone VARCHAR(20),
        email VARCHAR(100),
        birth_date DATE,
        gender VARCHAR(20),
        service VARCHAR(100),
        master_name VARCHAR(100),
        visit_date DATE,
        visit_time TIME,
        price DECIMAL(10,2),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

// Добавляем примеры, если таблица пустая
$count = $pdo->query("SELECT COUNT(*) FROM clients")->fetchColumn();

if ($count == 0) {
    $pdo->exec("
        INSERT INTO clients
        (first_name, last_name, phone, email, birth_date,
         gender, service, master_name, visit_date, visit_time, price)
        VALUES
        ('Алина', 'Иванова', '+996700111222', 'alina@mail.com',
         '2000-05-12', 'Женский', 'Маникюр', 'Анна',
         '2026-10-25', '10:00:00', 1200),
        ('Мария', 'Петрова', '+996700222333', 'maria@mail.com',
         '1998-08-20', 'Женский', 'Стрижка', 'Елена',
         '2026-10-26', '12:00:00', 1500),
        ('Данияр', 'Садыков', '+996700333444', 'daniyar@mail.com',
         '1995-02-14', 'Мужской', 'Стрижка', 'Руслан',
         '2026-10-27', '14:00:00', 800)
    ");
}
?>
