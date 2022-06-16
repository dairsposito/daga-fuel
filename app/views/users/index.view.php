<?php require __DIR__ . '/../partials/head.php'; ?>

<?php require __DIR__ . '/../partials/header.php'; ?>

<div class="row" style="margin-top: 1rem;">
    <form class="col s12" action="/user/update" method="POST">
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="name" type="text" class="validate" name="first-name" value="<?= $firstName ?>">
                <label for="name">First Name</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="name" type="text" class="validate" name="last-name" value="<?= $lastName ?>">
                <label for="name">Last Name</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="email" type="email" class="validate" name="email" value="<?= $email ?>">
                <label for="email">Email</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="new-password" type="password" class="validate" name="new-password">
                <label for="new-password">New Password</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="confirm-new-password" type="password" class="validate" name="confirm-new-password">
                <label for="confirm-new-password">Confirm New Password</label>
            </div>
        </div>
        <div class="row">
            <span class="helper-text red-text"><?= isset($error) ? $error : '' ?></span>
        </div>
        <div class="row center">
            <button class="btn" type="submit">Update</button>
        </div>
    </form>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>