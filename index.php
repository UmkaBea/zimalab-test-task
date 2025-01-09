<?php
require_once 'AccountController.php';

$controller = new AccountController();
$page = $_GET['page'] ?? 1;  //получение номера страницы
$accounts = $controller->getAccountsList($page);  //получение списка пользователей
$totalPages = $controller->getTotalPages(); //получение общего кол-ва страниц
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76A8fE1DhXZQojerDif2C7EWz8eDk6fBIR2i6tq43DYbRXFU9awhzA6C9++BXm3" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Client account management</h1>

        <a href="AccountCreate.php" class="btn btn-primary mb-3">Add New Account</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Position</th>
                    <th>Phones</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody> <!--перебор и заполнение каждого аккаунта в массиве -->
                <?php foreach ($accounts as $account): ?>   
                <tr>
                    <td><?= $account['id'] ?></td>
                    <td><?= $account['first_name'] ?></td>
                    <td><?= $account['last_name'] ?></td>
                    <td><?= $account['email'] ?></td>
                    <td><?= $account['company_name'] ?></td>
                    <td><?= $account['position'] ?></td>
                    <td>
                        <?= $account['phone1'] ?><br>
                        <?= $account['phone2'] ?><br>
                        <?= $account['phone3'] ?><br>
                    </td>
                    <td>
                        <a href="AccountUpdate.php?id=<?= $account['id'] ?>" class="btn btn-warning btn-sm">Edit</a> 
                        <a href="AccountDelete.php?id=<?= $account['id'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav>
            <!--Пагинация-->
            <ul class="pagination justify-content-center">                      
                <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">               <!--Проверка находимся ли мы на первой странице-->       
                    <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">    <!--Проверка находимся ли мы на последней странице-->  
                    <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</body>

</html>