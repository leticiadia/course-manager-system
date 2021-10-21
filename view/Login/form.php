<?php include __DIR__ . '/../start-html.php' ?>

<form action="/start-login" method="post">
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <button class="btn btn-primary">Log in</button>
</form>

<?php include __DIR__ . '/../end-html.php' ?>