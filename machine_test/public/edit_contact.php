<?php
require '../vendor/autoload.php';

use App\ConnectionFactory;
use App\Contact;

$pdo = ConnectionFactory::createConnection();
$contactModel = new Contact($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contactModel->update($_POST['id'], $_POST['name'], $_POST['phone'], $_POST['email'], $_POST['address']);
    header('Location: index.php');
} else {
    $contact = $contactModel->getById($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Contact</title>
</head>
<body>
    <h1>Edit Contact</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
        <label>Name</label>
        <input type="text" name="name" value="<?= htmlspecialchars($contact['name']) ?>"><br>
        <label>Phone</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($contact['phone']) ?>"><br>
        <label>Email</label>
        <input type="text" name="email" value="<?= htmlspecialchars($contact['email']) ?>"><br>
        <label>Address</label>
        <textarea name="address"><?= htmlspecialchars($contact['address']) ?></textarea><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
