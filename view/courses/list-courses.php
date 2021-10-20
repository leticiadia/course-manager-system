<?php include __DIR__ . '/../start-html.php'?>
    <a href="/new-course" class="btn btn-primary mb-2">New Course</a>

    <ul class="list-group">
        <?php foreach ($courses as $course) : ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $course->getDescription(); ?>
                <span>
                    <a href="/change-course?id=<?= $course->getId();?>" class="btn btn-info btn-sm">Changes</a>
                    <a href="/delete-course?id=<?= $course->getId();?>" class="btn btn-danger btn-sm">Delete</a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>
<?php include __DIR__ . '/../end-html.php'?>