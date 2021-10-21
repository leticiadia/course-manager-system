<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Course Manager System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php if (isset($_SESSION['logged'])) : ?>
        <header>
            <nav class="navbar navbar-dark bg-dark mb-2">
                <a class="navbar-brand" href="/courses-list">Home</a>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </nav>
        </header>
    <?php endif;?>
    <div class="container">
        <div class="jumbotron">
            <h1><?= $title;?></h1>
        </div>

        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-<?= $_SESSION['type_message']; ?>">
                <?= $_SESSION['message']; ?>
            </div>
        <?php 
            unset($_SESSION['type_message']);
            unset($_SESSION['message']);
        endif; ?>
