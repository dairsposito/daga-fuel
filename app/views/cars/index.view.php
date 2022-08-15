<?php require __DIR__ . '/../partials/head.php'; ?>

<?php require __DIR__ . '/../partials/header.php'; ?>

<div class="row">
    <div class="col s12">
        <table class="striped">
            <thead class="teal-text text-lighten-2">
                <tr>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>License Plate</th>
                    <th style="text-align: right;">
                        <a id="scale-demo" href="car/create" class="btn-floating btn-large scale-transition">
                            <i class="material-icons">add</i>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cars as $id => $car): ?>
                    <tr>
                        <td>Celtinha Branco</td>
                        <td>Chevrolet</td>
                        <td>Celta</td>
                        <td>2012</td>
                        <td>AZI0I10</td>
                        <td style="text-align: center">
                            <a id="scale-demo" href="car/1/edit" class="btn-floating btn-small scale-transition">
                                <i class="material-icons">edit</i>
                            </a>
                            <a id="scale-demo" href="car/1/delete" class="btn-floating btn-small scale-transition red darken-3">
                                <i class="material-icons">remove</i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require __DIR__ . '/../partials/footer.php'; ?>