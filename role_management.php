<?php
session_start();

if ($_SESSION['role'] === 'admin') {
    
    echo 'Welcome, Admin. You can manage roles here.';
} else {
    echo 'You are not authorized to access this page.';
}
