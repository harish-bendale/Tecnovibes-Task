<?php
include 'db.php';

$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    echo "ID: " . $user['id'] . " - Name: " . $user['name'] . " - Email: " . $user['email'] . "<br>";
}
?>