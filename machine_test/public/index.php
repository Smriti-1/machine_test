<?php
require '../vendor/autoload.php';

use App\ConnectionFactory;
use App\Contact;

$pdo = ConnectionFactory::createConnection();
$contactModel = new Contact($pdo);
$contacts = $contactModel->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Contact List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?= htmlspecialchars($contact['name']) ?></td>
                <td><?= htmlspecialchars($contact['phone']) ?></td>
                <td><?= htmlspecialchars($contact['email']) ?></td>
                <td><?= htmlspecialchars($contact['address']) ?></td>
                <td>
                    <a href="edit_contact.php?id=<?= $contact['id'] ?>">Edit</a>
                    <a href="delete_contact.php?id=<?= $contact['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="add_contact.php">Add Contact</a>
</body>
</html>
