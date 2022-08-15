<?php require __DIR__ . '/../partials/head.php'; ?>

<?php require __DIR__ . '/../partials/header.php'; ?>

<div class="row" style="margin-top: 1rem;">
    <form class="col s12 m4 offset-m4" action="/user/create" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" class="validate" name="name">
                <label for="name">Name</label>
                <span class="helper-text" data-error="wrong" data-success=""></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="brand" type="text" class="validate" name="brand">
                <label for="brand">Brand</label>
                <span class="helper-text" data-error="wrong" data-success=""></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="model" type="text" class="validate" name="model">
                <label for="model">Model</label>
                <span class="helper-text" data-error="wrong" data-success=""></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="year" type="text" class="validate" name="year">
                <label for="year">Year</label>
                <span class="helper-text" data-error="wrong" data-success=""></span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="licencePlate" type="text" class="validate" name="licencePlate">
                <label for="licencePlate">License Plate</label>
                <span class="helper-text" data-error="wrong" data-success=""></span>
            </div>
        </div>
        <div class="row center">
            <button class="btn" type="submit">Register</button>
        </div>
    </form>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>