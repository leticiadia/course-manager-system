<?php include __DIR__ . '/../start-html.php'?>
    <a href="/new-course" class="btn btn-primary mb-2">New Course</a>

    <ul class="list-group">
        <?php foreach ($courses as $course) : ?>
            <li class="list-group-item">
                <?= $course->getDescription(); ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php include __DIR__ . '/../end-html.php'?>