<?php require __DIR__ . '/../partials/head.php'; ?>

<?php require __DIR__ . '/../partials/header.php'; ?>

<?php use App\Core\Session; ?>

Olá <?= Session::getInstance()->name ?>

<br><br> <?= $id ?>

<?php require __DIR__ . '/../partials/footer.php'; ?>