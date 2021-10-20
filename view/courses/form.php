<?php include __DIR__ . '/../start-html.php'?>
    <form action="/save-course<?= isset($course) ? '?id= ' . $course->getId() : ''; ?>" method="POST">
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="<?= isset($course) ? $course->getDescription() : ''; ?>">
        </div>
        <button class="btn btn-primary">Salvar</button>
    </form>
<?php include __DIR__ . '/../end-html.php'?>    