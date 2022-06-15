<?php require('partials/head.php'); ?>

<?php require('partials/header.php'); ?>

<div class="row" style="margin-top: 1rem;">
    <form class="col s12 m4 offset-m4" action="/login" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="email" value="<?= isset($email) ? $email : '' ?>">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
            <label>
                <input type="checkbox" name="remember" <?= isset($remember) && $remember ? 'checked' : '' ?>/>
                <span>Remember-me</span>
            </label>
        </div>
        <?= isset($email) ?
            '<div class="row">
                <span class="helper-text red-text">Invalid credentials</span>
            </div>' :
            '';
        ?>
        <div class="row center">
            <button class="btn" type="submit">Login</button>
        </div>
    </form>
</div>

<?php require('partials/footer.php'); ?>