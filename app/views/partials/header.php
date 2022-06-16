<?php

use App\Core\Auth; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems);
    });
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.dropdown-trigger');
        var instances = M.Dropdown.init(elems, {
            'coverTrigger': false,
            'constrainWidth': false
        });
    });
</script>

<nav class="teal lighten-2" style="padding: 0 2rem 0 2rem;">
    <div class="nav-wrapper">
        <a href="/" class="brand-logo">DAGAFUEL</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <?php if (Auth::isAuth()) {
                $nav = <<<EOF
                <li><a href="/fill-ups">Fill-ups</a></li>
                <li><a href="/cars">Cars</a></li>
                <li><a href="/reports">Reports</a></li>
                <li>
                    <a class="dropdown-trigger" href="#" data-target="profile-dropdown" data-beloworigin="true">
                        <i class="material-icons">account_circle</i>
                    </a>
                </li>
            EOF;
            } else {
                $nav = <<<EOF
                    <li><a href="/login">Login</a></li>
                    <li><a href="/user/create">Register</a></li>
                EOF;
            }
            echo $nav; ?>
        </ul>
    </div>
</nav>

<ul class="sidenav teal lighten-2" id="mobile-demo">
    <?php if (Auth::isAuth()) {
        $nav = <<<EOF
        <li><a class="white-text text-lighten-2" href="/fill-ups">Fill-ups</a></li>
        <li><a class="white-text text-lighten-2" href="/cars">Cars</a></li>
        <li><a class="white-text text-lighten-2" href="/reports">Reports</a></li>
        <li class="divider"></li>
        EOF;
        echo $nav;
    } ?>

    <?= (Auth::isAuth()) ?
        '<li><a class="white-text text-lighten-2" href="/logout">Logout</a></li>
        <li><a class="white-text text-lighten-2" href="/user">My Profile</a></li>' :
        '<li><a class="white-text text-lighten-2" href="/login">Login</a></li>
        <li><a class="white-text text-lighten-2 m8" href="/user/create">Register</a></li>'
    ?>
</ul>

<ul id="profile-dropdown" class="dropdown-content teal lighten-2">
    <li><a class="white-text text-lighten-2" href="/logout">Logout</a></li>
    <li><a class="white-text text-lighten-2" href="/user">My Profile</a></li>
</ul>

<div class="container">