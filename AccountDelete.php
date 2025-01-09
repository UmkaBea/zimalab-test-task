<?php
require_once 'AccountController.php';

$id = $_GET['id'] ?? null;      //ID выбранного аккаунта

if (!$id) {
    die('Invalid account ID');
}

$controller = new AccountController();
$controller->deleteAccount($id);

header('Location: index.php');
exit;
?>
