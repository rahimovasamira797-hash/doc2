
<?php
require 'db.php';

$clients = $pdo->query("SELECT * FROM clients ORDER BY id DESC")
               ->fetchAll(PDO::FETCH_ASSOC);

function e($value) {
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Клиенты салона красоты</title>

<style>
body {
    margin: 0;
    padding: 30px;
    font-family: Arial, sans-serif;
    background: #fff0f5;
    color: #49313d;
}

h1 {
    text-align: center;
    color: #c04478;
}

.container {
    max-width: 1400px;
    margin: auto;
    background: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 5px 20px #d9a0b533;
}

h2 {
    color: #c04478;
}

.table-box {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: white;
}

th {
    background: #c04478;
    color: white;
    padding: 14px;
}

td {
    padding: 12px;
    border-bottom: 1px solid #f1d6e1;
    text-align: left;
}

tr:hover {
    background: #fff3f8;
}

.price {
    color: #27845b;
    font-weight: bold;
}

@media (max-width: 600px) {
    body {
        padding: 10px;
    }
}
</style>
</head>

<body>
<div class="container">
    <h1>🌸 Салон красоты</h1>
    <h2>Список клиентов</h2>

    <p>Всего клиентов: <b><?= count($clients) ?></b></p>

    <div class="table-box">
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Дата рождения</th>
            <th>Пол</th>
            <th>Услуга</th>
            <th>Мастер</th>
            <th>Дата визита</th>
            <th>Время</th>
            <th>Цена</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($clients as $client): ?>
        <tr>
            <td><?= e($client['id']) ?></td>
            <td><?= e($client['first_name']) ?></td>
            <td><?= e($client['last_name']) ?></td>
            <td><?= e($client['phone']) ?></td>
            <td><?= e($client['email']) ?></td>
            <td><?= e($client['birth_date']) ?></td>
            <td><?= e($client['gender']) ?></td>
            <td><?= e($client['service']) ?></td>
            <td><?= e($client['master_name']) ?></td>
            <td><?= e($client['visit_date']) ?></td>
            <td><?= e(substr($client['visit_time'] ?? '', 0, 5)) ?></td>
            <td class="price"><?= e($client['price']) ?> сом</td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
</body>
</html>
