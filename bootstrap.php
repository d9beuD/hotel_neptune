<?php

if (isset($_COOKIE['PHPSESSID'])) {
    @session_start();
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
$isAdmin = $isLoggedIn && $_SESSION['user']['isAdmin'] === 1;
