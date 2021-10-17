<?php

use MVC\Courses\Entity\Course;
use MVC\Courses\Infra\EntityManagerCreator;

require __DIR__ . '/../vendor/autoload.php';

$entityManager = (new EntityManagerCreator())->getEntityManager();
$repositorioDeCursos = $entityManager->getRepository(Course::class);
$cursos = $repositorioDeCursos->findAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <h1>Courses List</h1>
    </div>

    <a href="/new-course" class="btn btn-primary mb-2">New Course</a>

    <ul class="list-group">
        <?php foreach ($courses as $course): ?>
            <li class="list-group-item">
                <?= $course->getDescription(); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>