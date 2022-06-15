<?php require __DIR__ . '/../partials/head.php'; ?>

<?php require __DIR__ . '/../partials/header.php'; ?>

<div class="row" style="margin-top: 1rem;">
    <form class="col s12 m4 offset-m4" action="/user/create" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" class="validate" name="first-name">
                <label for="name">First Name</label>
                <span class="helper-text" data-error="wrong" data-success=""></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" class="validate" name="last-name">
                <label for="name">Last Name</label>
                <span class="helper-text" data-error="wrong" data-success=""></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="email">
                <label for="email">Email</label>
                <span class="helper-text" data-error="Email invalid" data-success=""></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Password</label>
                <span class="helper-text" data-error="wrong" data-success=""></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="confirm-password" type="password" class="validate" name="confirm-password">
                <label for="confirm-password">Confirm Password</label>
                <span class="helper-text" data-error="wrong" data-success=""></span>
            </div>
        </div>
        <div class="row center">
            <button class="btn" type="submit">Register</button>
        </div>
    </form>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>