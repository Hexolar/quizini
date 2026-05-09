<?php
require_once 'config.php';
require_once 'includes/auth.php';

$page = $_GET['page'] ?? 'welcome';

switch ($page) {
    case 'welcome':
        require 'pages/welcome.php';
        break;
    case 'login':
        require 'pages/login.php';
        break;
    case 'register':
        require 'pages/register.php';
        break;
    case 'home':
        isLoggedIn();
        require 'pages/home.php';
        break;
    case 'quiz':
        isLoggedIn();
        require 'pages/quiz.php';
        break;
    case 'results':
        isLoggedIn();
        require 'pages/results.php';
        break;
    case 'logout':
        session_destroy();
        header("Location: index.php?page=welcome");
        exit;
    default:
        require 'pages/welcome.php';
}
?>