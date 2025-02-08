<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record";
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    Are you sure you want to delete this record?<br>
    Name: <?php echo $user['name']; ?><br>
    Email: <?php echo $user['email']; ?><br>
    <input type="submit" value="Delete">
</form>