<?php
require '../vendor/autoload.php';
require '../src/formConfig.php';

use App\ConnectionFactory;
use App\Contact;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = ConnectionFactory::createConnection();
    $contactModel = new Contact($pdo);
    $contactModel->create($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['address']);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Contact</title>
</head>
<body>
    <h1>Add Contact</h1>
    <?php require '../src/formConfig.php'; ?>
</body>
</html>
