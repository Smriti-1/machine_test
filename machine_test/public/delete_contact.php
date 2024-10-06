<?php
require '../vendor/autoload.php';

use App\ConnectionFactory;
use App\Contact;

$pdo = ConnectionFactory::createConnection();
$contactModel = new Contact($pdo);

if (isset($_GET['id'])) {
    $contactModel->delete($_GET['id']);
}

header('Location: index.php');
