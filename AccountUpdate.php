<?php
require_once 'AccountController.php';

$controller = new AccountController();
$id = $_GET['id'] ?? null;

if (!$id) {
    die('Invalid account ID');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'company_name' => $_POST['company_name'] ?? null,
        'position' => $_POST['position'] ?? null,
        'phone1' => $_POST['phone1'] ?? null,
        'phone2' => $_POST['phone2'] ?? null,
        'phone3' => $_POST['phone3'] ?? null,
    ];

    $controller->updateAccount($id, $data);
    header('Location: index.php');
    exit;
}

$account = $controller->getAccountsList(1, 1)[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Account</h1>
        <form method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $account['first_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $account['last_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $account['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="<?= $account['company_name'] ?>">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position" value="<?= $account['position'] ?>">
            </div>
            <div class="mb-3">
                <label for="phone1" class="form-label">Phone 1</label>
                <input type="text" class="form-control" id="phone1" name="phone1" value="<?= $account['phone1'] ?>">
            </div>
            <div class="mb-3">
                <label for="phone2" class="form-label">Phone 2</label>
                <input type="text" class="form-control" id="phone2" name="phone2" value="<?= $account['phone2'] ?>">
            </div>
            <div class="mb-3">
                <label for="phone3" class="form-label">Phone 3</label>
                <input type="text" class="form-control" id="phone3" name="phone3" value="<?= $account['phone3'] ?>">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>